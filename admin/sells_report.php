<?php
// Set the timezone to Bangladesh
date_default_timezone_set("Asia/Dhaka");
require_once '../inc/conn.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Sell Report</title>

    <style>
        body{
            margin: 10px;
            padding: 5px;
        }
        .input-form {
            margin-top: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>

</head>

<body>

    <div class="container text-center">
        <a class="text-decoration-none" href="index.php">
            <h2 class="fw-bold">Friends Travels Ltd</h2>
        </a>
    </div>

    <div class="container input-form">

        <form class="row g-3 d-flex" role="search" method="POST">
            <div class="col-auto">
                <input name="date1" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required />
            </div>
            <div class="col-auto">
                <input name="date2" type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required />
            </div>
            <div class="col-auto">
                <button name="submit" type="submit" class="btn btn-outline-success mb-3">Search</button>
            </div>
        </form>

    </div>
    <hr>



    <div class="">
        <table class="table border" id="table">

            <?php

            if (isset($_POST['submit'])) {

                $date1 = $_POST['date1'];
                $date2 = $_POST['date2'];

                $sql = "SELECT * FROM sell_ticket_history WHERE date BETWEEN '$date1' AND '$date2'";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    echo '
                    <thead>
                        <tr>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Seat</th>
                            <th scope="col">PNR</th>
                            <th scope="col">Name</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Fare</th>
                            <th scope="col">Station</th>
                        </tr>
                    </thead>
                    ';


                    while ($row = mysqli_fetch_assoc($result)) {

                        echo '
                        <tbody>

                            <tr>
                                <td>
                                    ' . $row['date'] . '
                                </td>
                                <td>
                                    ' . $row['time'] . '
                                </td>
                                <td>
                                    ' . $row['seat'] . '
                                </td>
                                <td>
                                    ' . $row['ticket_id'] . '
                                </td>
                                <td>
                                    ' . $row['name'] . '
                                </td>
                                <td>
                                    ' . $row['mobile'] . '
                                </td>
                                <td>
                                    ' . $row['fare'] . '
                                </td>
                                <td>
                                    ' . $row['station'] . '
                                </td>

                            </tr>

                        </tbody>
                    ';
                    }
                    ;

                } else {
                    echo 'Do not found in database';
                }
            }


            ?>


        </table>

        <div class="">
            <button onclick=getSumValue() class="btn btn-info">Total Sells Amount</button>
        </div>

        <strong>
            <p class="fs-3" id="passenger"></p>
            <p class="fs-3" id="value"></p>
        </strong>

    </div>

    <script>

        function getSumValue() {
            var table = document.getElementById("table"), sumVal = 0;

            for (var i = 1; i < table.rows.length; i++) {
                sumVal = sumVal + parseInt(table.rows[i].cells[6].innerHTML);
            }
            document.getElementById("value").innerText = 'Total Sells Ticket Value = ' + sumVal + ' TK';
        }


    </script>

</body>

</html>