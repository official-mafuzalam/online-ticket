<?php
// Establish a database connection
require_once '../inc/conn.php';

// Get the id number from the GET request
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = '$id'";

    $result = $con->query($sql);

    $row = mysqli_fetch_assoc($result);
}

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['submit_user'])) {
        // get the values from the form
        $user_id = $_POST['user_id'];
        $user_name = $_POST['user_name'];
        $mobile = $_POST['mobile'];
        $counter_name = $_POST['counter_name'];
        $password = $_POST['password'];
        $user_type = $_POST['user_type'];

        // Insert data into the database
        $sql = "UPDATE users SET user_type='$user_type', counter_name='$counter_name', user_name='$user_name', mobile='$mobile', password='$password' WHERE id = '$user_id'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            echo "<script>alert('Update User Details Successfully');
        window.location.href = 'user_list.php';
        </script>";
        } else {
            echo "Query error!";
        }


        $con->close();
    }
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Ticket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container text-center">
        <a class="text-decoration-none" href="index.php">
            <h3>Friends Travels Ltd</h3>
        </a>
        <p>Fill the for for add a new Counter and User.</p>

    </div>
    <div class="container text-center">
        <form action="" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="user_id" id="floatingInput" placeholder="MR. Titu Mir"
                    value="<?php echo $row['id']; ?>" readonly>
                <label for="floatingInput">User ID</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="user_name" id="floatingInput" placeholder="MR. Titu Mir"
                    value="<?php echo $row['user_name']; ?>">
                <label for="floatingInput">Full Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="tel" class="form-control" name="mobile" id="floatingPassword" placeholder="01751944774"
                    value="<?php echo $row['mobile']; ?>">
                <label for="floatingPassword">Mobile Number</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="counter_name" id="floatingInput"
                    placeholder="Gabtoli, Dhaka" value="<?php echo $row['counter_name']; ?>">
                <label for="floatingInput">Counter Location</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="password" id="floatingPassword" placeholder="Password"
                    value="<?php echo $row['password']; ?>">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
                <select class="form-select" name="user_type" id="floatingSelect"
                    aria-label="Floating label select example">
                    <option selected disabled>Open this select menu</option>
                    <option value="1" <?php if ($row['user_type'] == '1')
                        echo 'selected'; ?>>Admin</option>
                    <option value="3" <?php if ($row['user_type'] == '3')
                        echo 'selected'; ?>>Agents</option>
                </select>
                <label for="floatingSelect">Select User Type</label>
            </div>
            <br>
            <input type="submit" name="submit_user" class="btn btn-success" value="Save">
        </form>
    </div>

</body>

</html>