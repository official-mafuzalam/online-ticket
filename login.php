<?php

require_once 'inc/conn.php';

session_start();

if (isset($_SESSION['user_type'])) {
    header("Location: index.php");
}

$message = '';

if (isset($_POST['login']) && !empty($_POST['mobile']) && !empty($_POST['password'])) {
    // Check if the username and password are correct
    $username = $_POST['mobile'];
    $password = $_POST['password'];

    $stmt = $con->prepare('SELECT * FROM users WHERE mobile = ?');
    $stmt->bind_param('s', $username);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if ($password == $user['password']) {

            $_SESSION['mobile'] = $user['mobile'];
            $_SESSION['user_name'] = $user['user_name'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['counter_name'] = $user['counter_name'];
            $_SESSION['user_type'] = $user['user_type']; // add account user_type to session

            if ($user['user_type'] == 1) {

                header("Location: admin/");

            } elseif ($user['user_type'] == 3) {

                header("Location: agents/");

            }

        } else {
            $message = 'Invalid username or password';
        }
    } else {
        $message = 'Multiple username or password';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>

<body>

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <form class="row g-3 col-md-6" action="" method="post">
            <?php if ($message != '') { ?>
                <p>
                    <?php echo $message; ?>
                </p>
            <?php } ?>
            <div class="input-group mb-3">
                <input type="text" name="mobile" class="form-control" placeholder="Email" aria-label="Username"
                    aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password"
                    aria-describedby="basic-addon1">
            </div>
            <div class="col-12 d-flex justify-content-center">
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
            <div class="col-12 text-center mt-3">
                Developed by : <a class="text-decoration-none" href="https://friendsit.xyz/">Friends IT Ltd</a>
            </div>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>