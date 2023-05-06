<?php
// Establish a database connection
require_once '../inc/conn.php';

// Retrieve the mobile number from the GET request parameter
$mobile = $_GET['mobile'];

// Execute the SQL query to retrieve the name from the database
$sql = "SELECT name FROM sell_ticket_history WHERE mobile = '$mobile'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Output the retrieved name as a response to the AJAX request
    $row = $result->fetch_assoc();
    echo $row['name'];
} else {
    // Output an error message if the mobile number is not found in the database
    echo "MR. ";
}

$con->close();
?>