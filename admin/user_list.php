<?php
// Set the timezone to Bangladesh
date_default_timezone_set( "Asia/Dhaka" );
require_once '../inc/conn.php';

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

        <p>All Counter & User List</p>

    </div>
    <div class="container">
        <?php


        // Prepare the SQL query to search for tickets
        $sql = "SELECT * FROM users ORDER BY id ASC";
        $result = $con->query( $sql );

        if ($result->num_rows > 0) {
            // Display the search results in a table
            echo "<table class='table table-hover text-center'>";
            echo "<tr><th>SL No</th><th>Counter Name</th><th>User Name</th><th>Mobile</th><th>Password</th><th>Action</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["counter_name"] . "</td>";
                echo "<td>" . $row["user_name"] . "</td>";
                echo "<td>" . $row["mobile"] . "</td>";
                echo "<td>" . $row["password"] . "</td>";
                echo '<td><a type="button" class="btn btn-primary" target="_blank" href="ticket_print.php?id=' . $row["id"] . '">Edit</a></td>';
                echo "</tr>";
            }
            echo "</table>";
        }
        else {
            // Display a message if no search results found
            echo "No search results found.";
        }

        // Close the database connection
        $con->close();


        ?>
    </div>

</body>

</html>