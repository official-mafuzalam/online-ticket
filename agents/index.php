<?php
// Set the timezone to Bangladesh
date_default_timezone_set( "Asia/Dhaka" );
require_once '../inc/conn.php';

session_start();

$user_name = $_SESSION['user_name'];

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Friends Travels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <p class="navbar-brand p-1">Friends Travels</p>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="container overflow-hidden">
                    <form class="row gx-2" action="" method="post">
                        <div class="col">
                            <div class="p-1">
                                <select class="form-select mr-4" aria-label="Default select example">
                                    <option selected>From</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Gopalganj">Gopalganj</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Narail">Narail</option>
                                    <option value="Pirojpur">Pirojpur</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-1">
                                <select class="form-select mr-4" aria-label="Default select example">
                                    <option selected>To</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Gopalganj">Gopalganj</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Narail">Narail</option>
                                    <option value="Pirojpur">Pirojpur</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-1">
                                <input name="date" type="date" class="form-control"
                                    value="<?php echo date( 'Y-m-d' ); ?>" required />
                            </div>
                        </div>
                        <div class="col">
                            <div class="p-1">
                                <button type="submit" class="btn btn-outline-success">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="d-flex flex-row-reverse">
                    <div class="dropdown">
                        <button class="btn btn-success dropdown-toggle" type="button" id="triggerId"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Welcome <?php echo $user_name ?>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="triggerId">
                            <a class="dropdown-item" href="search_tickets.php">
                                <i class="bi bi-ticket-detailed"></i>
                                Search Ticket
                            </a>
                            <a class="dropdown-item" href="sells_report.php">
                                <i class="bi bi-card-list"></i>
                                User Sell Report
                            </a>
                            <!-- <a class="dropdown-item" href="search_tickets.php">Search Ticket</a> -->
                            <a class="dropdown-item" href="../logout.php">
                                <i class="bi bi-box-arrow-right"></i>
                                Log Out
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <div class="">
        <?php
        // Automatic Search Todays Trip
        
        // check if the form has been submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $date = $_POST['date'];
        }
        else {
            // Set the $date variable to the current date
            $date = date( 'Y-m-d' );
        }

        // $sql = "SELECT * FROM `trip_status` WHERE date = '$date' ORDER BY time ASC";
        $sql = "SELECT * FROM `trip_status` WHERE date = '$date' ORDER BY STR_TO_DATE(time, '%h:%i %p')";

        $result = mysqli_query( $con, $sql );

        if (mysqli_num_rows( $result ) > 0) {
            echo '
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">Coach</th>
                        <th scope="col">Time</th>
                        <th scope="col">Route</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
            <tbody>';

            while ($row = mysqli_fetch_assoc( $result )) {


                echo '
                    <tr>
                        <td class="text-success fw-bold">' . $row['coach_no'] . '</td>
                        <td class="text-success fw-bold">' . $row['time'] . '</td>
                        <td class="text-success fw-bold">' . $row['route'] . '</td>
                        <td>';

                if ($row['status'] == 1) {
                    echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-id="' . $row['id'] . '">Book</button>';
                }
                else {
                    echo '<button type="button" class="btn btn-danger" disabled>Book</button>';
                }

                echo '</td></tr>';

            }

            echo '</tbody></table>';
        }
        else {
            echo '<p class="text-center fs-3">No Trip Found</p>';
        }
        ?>

    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content" id="modal-content">



            </div>
        </div>
    </div>




    <script>

        // JS For Open Seat Plane
        $(document).ready(function () {
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var modal = $(this);
                $.ajax({
                    type: "GET",
                    url: "fetch-data.php",
                    data: { id: id },
                    success: function (response) {
                        // Display the fetched data in the modal
                        modal.find('#modal-content').html(response);
                    }
                });
            });
        });


    </script>




    <!-- <script>
        const checkboxes = document.querySelectorAll('.btn-check');
        const selectedItemsDiv = document.querySelector('#selected-items');

        checkboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', (event) => {
                const label = event.target.nextElementSibling;
                if (event.target.checked && label !== null && label.innerHTML !== null) {
                    selectedItemsDiv.innerHTML += `<span class="badge badge-lg bg-primary">${label.innerHTML}</span>`;
                } else {
                    const badges = selectedItemsDiv.querySelectorAll('.badge');
                    badges.forEach((badge) => {
                        if (badge.innerHTML === label.innerHTML) {
                            selectedItemsDiv.removeChild(badge);
                        }
                    });
                }
            });
        });
    </script> -->











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
</body>

</html>