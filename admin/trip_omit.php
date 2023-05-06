<?php
// Establish a database connection
require_once '../inc/conn.php';

// Get the id number from the GET request
$id = $_GET['id'];


if (isset($_POST['submit_omit'])) {

    $coach_no = $_POST['coach_no'];
    $coach_id = $_POST['id'];

    // Insert data into the database
    $sql = "UPDATE trip_status SET status = 0 WHERE id = $coach_id";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>alert('Trip Omit Successfully');
        window.location.href = 'index.php';
        </script>";
    } else {
        echo "Query error!";
    }


}


// query the database to retrieve the coach_no, time, and route data for the selected row
$query = "SELECT s_no, id, coach_no, date, time, route FROM trip_status WHERE id='$id'";
$result = mysqli_query( $con, $query );

if (mysqli_num_rows( $result ) > 0) {
    $row = mysqli_fetch_assoc( $result );

    // display the coach_no, time, and route data in the modal
    echo '<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">' . $row['route'] . '</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>';

    echo '
    <div class="modal-body">
        <form class="container text-center" action="trip_omit.php" method="POST"">
            <div class="row g-2 seat">
                <div class="col-md">
                    <input type="number" class="form-control"  name="coach_no" value="' . $row['coach_no'] . '" readonly>
                </div>
                <div class="col-md">
                    <input type="number" class="form-control"  name="id" value="' . $row['id'] . '" readonly>
                </div>
            </div>
            <div class="row g-2 seat">
                <div class="col-md">
                    <input type="text" class="form-control"  name="date" value="' . $row['date'] . '" readonly>
                </div>
                <div class="col-md">
                    <input type="text" class="form-control"  name="time" value="' . $row['time'] . '" readonly>
                </div>
            </div>
            <input type="submit" name="submit_omit" class="btn btn-danger" value="Omit">

        </form>
    </div>';

}





?>