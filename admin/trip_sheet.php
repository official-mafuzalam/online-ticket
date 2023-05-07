<?php
// Set the timezone to Bangladesh
date_default_timezone_set("Asia/Dhaka");
// Establish a database connection
require_once '../inc/conn.php';

session_start();

$user_name = $_SESSION['user_name'];
$counter_name = $_SESSION['counter_name'];

// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // get the ID of the selected row from the URL
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $coach_id = mysqli_real_escape_string($con, $_GET['id']);


        // query the database for the selected row
        $query = "SELECT * FROM trip_status WHERE id = '$coach_id'";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // display ticket details
        } else {
            // handle error when ticket not found
        }
    } else {
        // handle error when id is not provided in URL
    }

}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Trip Sheet</title>
</head>

<body>

    <div class="container">
        <div class="bg-danger" style="width: 100%;">
            <div class="d-flex justify-content-between text-white px-3 py-2">
                <p class="font-weight-bold" style="font-size: 20px;">Friends Travels Ltd</p>
                <p class="font-weight-bold" style="font-size: 20px;"></p>
                <div>
                    <p class="font-weight-bold" style="font-size: 14px;">
                        <?php echo $counter_name . " | " . $user_name ?>
                    </p>
                    <p class="font-weight-bold" style="font-size: 14px; margin-top: 5px;">
                        <?php echo date("Y-m-d H:i:s"); ?>
                    </p>
                </div>
            </div>
        </div>
        <div>
            <div class="d-flex border justify-content-between text-black px-3">
                <div>
                    <p>Coach Id: <span class="fw-bold">
                            <?php echo $row['id']; ?>
                        </span></p>
                    <p>Route: <span class="fw-bold">
                            <?php echo $row['route']; ?>
                        </span></p>
                    <p>Date: <span class="fw-bold">
                            <?php echo $row['date']; ?>
                        </span></p>
                </div>
                <div>
                    <p>Supervisor: <span class="fw-bold">MR. X</span></p>
                    <p>Driver: <span class="fw-bold">Mr. Y</span></p>
                    <p>Reg.No: <span class="fw-bold">
                            <?php echo $row['time']; ?>
                        </span></p>
                </div>
                <div>
                    <p>Coach: <span class="fw-bold">
                            <?php echo $row['coach_no']; ?>
                        </span></p>
                    <p>Challan Serial: <span class="fw-bold">
                            <?php echo rand(1000, 9999); ?>
                        </span></p>
                    <p>Bus Type: <span class="fw-bold">NON_AC</span></p>
                </div>
            </div>

            <br>
            <table id="table" class="table table-striped-columns border text-center">
                <thead>
                    <tr>
                        <th scope="col">Seat</th>
                        <th scope="col">Counter</th>
                        <th scope="col">PNR</th>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Station</th>
                        <th scope="col">Discount</th>
                        <th scope="col">Fare</th>
                    </tr>
                </thead>
                <tbody id="my-table-body">
                    <?php
                    // Get the coach status for the given ID
                    $coachStatusQuery = "SELECT * FROM trip_status WHERE id = ? AND (A1 = 1 OR A2 = 1 OR A3 = 1 OR A4 = 1 OR B1 = 1 OR B2 = 1 OR B3 = 1 OR B4 = 1 OR C1 = 1 OR C2 = 1 OR C3 = 1 OR C4 = 1 OR D1 = 1 OR D2 = 1 OR D3 = 1 OR D4 = 1 OR E1 = 1 OR E2 = 1 OR E3 = 1 OR E4 = 1 OR F1 = 1 OR F2 = 1 OR F3 = 1 OR F4 = 1 OR G1 = 1 OR G2 = 1 OR G3 = 1 OR G4 = 1 OR H1 = 1 OR H2 = 1 OR H3 = 1 OR H4 = 1 OR I1 = 1 OR I2 = 1 OR I3 = 1 OR I4 = 1 OR J1 = 1 OR J2 = 1 OR J3 = 1 OR J4 = 1 OR J5 = 1)";

                    $coachStatusStmt = $con->prepare($coachStatusQuery);
                    $coachStatusStmt->bind_param("i", $coach_id);
                    $coachStatusStmt->execute();
                    $coachStatusResult = $coachStatusStmt->get_result();

                    // Loop through each row and get the column names where the value is 1
                    $columns = [];
                    while ($row = $coachStatusResult->fetch_assoc()) {
                        foreach ($row as $columnName => $columnValue) {
                            if ($columnValue == 1) {
                                array_push($columns, $columnName);
                            }
                        }
                    }

                    // Loop through each column and get the ticket information for the given seat
                    foreach ($columns as $column) {
                        $seats = explode(",", $column); // split the seat string into an array
                        foreach ($seats as $seat) {
                            $ticketQuery = "SELECT ticket_id, name, mobile, gender, station, seat, fare,discount, discount_fare_per_seat, seller_name, seller_counter FROM sell_ticket_history WHERE coach_id = ? AND seat LIKE ?";
                            $ticketStmt = $con->prepare($ticketQuery);
                            $seatParam = '%' . $seat . '%'; // create variable to hold third argument
                            $ticketStmt->bind_param("is", $coach_id, $seatParam); // pass variable by reference
                            $ticketStmt->execute();
                            $ticketResult = $ticketStmt->get_result();

                            // Loop through each row and echo the ticket information
                            while ($ticketRow = $ticketResult->fetch_assoc()) {
                                $seats = explode(" ", $ticketRow['seat']); // split the seat string into an array
                                foreach ($seats as $s) {
                                    echo "<tr>";
                                    echo "<td class='font-weight-normal'>" . $s . "</td>";
                                    echo "<td class='font-weight-normal'>" . $ticketRow['seller_counter'] . " | " . $ticketRow['seller_name'] . "</td>";
                                    echo "<td class='font-weight-normal'>" . $ticketRow['ticket_id'] . "</td>";
                                    echo "<td class='font-weight-normal'>" . $ticketRow['name'] . "</td>";
                                    echo "<td class='font-weight-normal'>" . $ticketRow['mobile'] . "</td>";
                                    echo "<td class='font-weight-normal'>" . $ticketRow['gender'] . "</td>";
                                    echo "<td class='font-weight-normal'>" . $ticketRow['station'] . "</td>";
                                    echo "<td class='font-weight-normal'>" . $ticketRow['discount'] . "</td>";
                                    echo "<td class='font-weight-normal'>" . $ticketRow['discount_fare_per_seat'] . "</td>";
                                    echo "</tr>";
                                }
                            }

                        }
                    }


                    ?>
                </tbody>

            </table>
            <br>
            <div class="d-flex border justify-content-between text-black px-3">
                <div>
                    <p>Total Sold Seat:
                        <span id="sold-seat" class="fw-bold"></span>
                    </p>
                </div>
                <div>
                    <p>Total Sell Amount:
                        <span id="value" class="fw-bold"></span>
                    </p>
                </div>
            </div>


            <br><br><br><br>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-3">
                        <div class="border-top border-1 border-dark w-50"></div>
                        <p class="mt-3 text-dark">Signature</p>
                        <p class="mt-3 text-dark">(Counter Master)</p>
                    </div>
                    <div class="col-md-3">
                        <div class="border-top border-1 border-dark w-50"></div>
                        <p class="mt-3 text-dark">Signature</p>
                        <p class="mt-3 text-dark">(Guide)</p>
                    </div>
                    <div class="col-md-3">
                        <div class="border-top border-1 border-dark w-50"></div>
                        <p class="mt-3 text-dark">Signature</p>
                        <p class="mt-3 text-dark">(Checker 1)</p>
                    </div>
                    <div class="col-md-3">
                        <div class="border-top border-1 border-dark w-50"></div>
                        <p class="mt-3 text-dark">Signature</p>
                        <p class="mt-3 text-dark">(Checker 2)</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-danger">
            <div class="d-flex justify-content-between align-items-center text-white px-3">
                <a href="https://friendsit.xyz/" class="font-weight-bold text-white text-decoration-none"
                    target="_blank">
                    www.friendsit.xyz
                </a>
            </div>
        </div>
    </div>





    <script>

        // Total Sold Seat Value
        var table = document.getElementById("table"), sumVal = 0;

        for (var i = 1; i < table.rows.length; i++) {
            sumVal = sumVal + parseInt(table.rows[i].cells[8].innerHTML);
        }
        document.getElementById("value").innerText = sumVal + ' TK';

        // Total Sold Seat Count

        const tableBody = document.getElementById('my-table-body');
        const rowCount = tableBody.rows.length;
        document.getElementById("sold-seat").innerText = rowCount;


    </script>


</body>

</html>