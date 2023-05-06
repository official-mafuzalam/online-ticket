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
        <form class="row" action="" method="post">
            <div class="col">
                <div class="p-1">
                    <input class="form-control" name="search_data" id="search-data" type="text"
                        placeholder="Search Ticket with Phone number or PNR" />
                </div>
            </div>
            <div class="col">
                <div class="p-1">
                    <input type="submit" name="search_ticket" class="btn btn-success" value="Search">
                </div>
            </div>
        </form>

    </div>
    <div class="container">
        <?php

        if (isset( $_POST['search_data'] )) {
            // Retrieve the search value from the input field
            $searchValue = $_POST['search_data'];

            // Prepare the SQL query to search for tickets
            $sql = "SELECT * FROM sell_ticket_history WHERE mobile = '$searchValue' OR ticket_id = '$searchValue'";
            $result = $con->query( $sql );

            if ($result->num_rows > 0) {
                // Display the search results in a table
                echo "<table class='table table-hover text-center'>";
                echo "<tr><th>Ticket ID</th><th>Mobile Number</th><th>Name</th><th>Seat</th><th>Date</th><th>Time</th><th>Action</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ticket_id"] . "</td>";
                    echo "<td>" . $row["mobile"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["seat"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["time"] . "</td>";
                    echo '<td><a type="button" class="btn btn-primary" target="_blank" href="ticket_print.php?id='.$row["ticket_id"].'">Print</a></td>';
                    echo "</tr>";
                }
                echo "</table>";
            }
            else {
                // Display a message if no search results found
                echo "No search results found.";
            }
        }

        // Close the database connection
        $con->close();


        ?>
    </div>

</body>

</html>