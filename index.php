<?php
session_start();

if (!isset( $_SESSION['user_type'] )) {
    header( "Location: login.php" );
}

// $pdo = new PDO('mysql:host=localhost;dbname=mydb', 'root', '');
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $stmt = $pdo->prepare('SELECT account_type FROM users WHERE username = :username');
// $stmt->bindParam(':username', $_SESSION['username']);
// $stmt->execute();

// $user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user['user_type'] == 1) {

    header( "Location: admin/" );

}
elseif ($user['user_type'] == 3) {

    header( "Location: agents/" );

}
else {
    header( "Location: logout.php" );
}
?>