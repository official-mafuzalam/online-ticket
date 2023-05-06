<?php

require_once '../inc/conn.php';

session_start();

$user_name = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];
$counter_name = $_SESSION['counter_name'];


$coach_no = $_POST['coach_no'];
$s_no = $_POST['s_no'];
$coach_id = $_POST['id'];
$route = $_POST['route'];
$date = $_POST['date'];
$time = $_POST['time'];

$seat = $_POST['seat_no'];
$fare = $_POST['fare'];
$total_fare = $_POST['total_fare'];
$station = $_POST['station'];
$mobile = $_POST['mobile'];
$name = $_POST['name'];
$gender = $_POST['gender'];

// $seat = "B3B4C4"; // example input string
$seats = preg_split( '/(?<=\d)(?=[A-Z])/', $seat ); // split the string using a regular expression
$updates = array();
foreach ($seats as $seat) {
    $updates[] = "$seat = 1";
}
$update_string = implode( ", ", $updates );
$sql = "UPDATE trip_status SET $update_string WHERE id = $coach_id";
$result = mysqli_query( $con, $sql );



$ticket_id = uniqid();

$seats = explode( ",", $_POST['seat_no'] ); // split the input by comma to get an array of seat numbers
$seat_list = implode( ", ", $seats ); // create a comma-separated list of seats (e.g. "B3, B4, C4")

$sql_sell_ticket = "INSERT INTO sell_ticket_history (`ticket_id`, `coach_no`, `coach_id`, `route`, `date`, `time`, `seat`, `fare`, `total_fare`, `station`, `mobile`, `name`, `gender`, `seller_name`, `seller_id`, `seller_counter` ) 
                    VALUES ('$ticket_id','$coach_no','$coach_id','$route','$date','$time','$seat_list','$fare', '$total_fare', '$station','$mobile','$name','$gender', '$user_name', '$user_id', '$counter_name')";

$result_sell_ticket = mysqli_query( $con, $sql_sell_ticket );


if ($result_sell_ticket) {
    echo '<script>
        window.open("ticket_print.php?id=' . $ticket_id . '", "_blank");
        window.location.href = "index.php";
    </script>';


}




?>