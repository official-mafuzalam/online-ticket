<?php
// Establish a database connection
require_once '../inc/conn.php';

// Get the id number from the GET request
$id = $_GET['id'];

// query the database to retrieve the coach_no, time, and route data for the selected row
$query = "SELECT s_no, id, coach_no, date, time, route, station, a1, a2, a3, a4, b1, b2, b3, b4, c1, c2, c3, c4 ,d1,d2,d3,d4,e1,e2,e3,e4,f1,f2,f3,f4,g1,g2,g3,g4,h1,h2,h3,h4,i1,i2,i3,i4,j1,j2,j3,j4,j5 FROM trip_status WHERE id='$id'";
$result = mysqli_query( $con, $query );

if (mysqli_num_rows( $result ) > 0) {
    $row = mysqli_fetch_assoc( $result );
    $station = $row["station"];

    // create an array of values from the comma-separated string
    $values_array = explode( ",", $station );

    // build the options HTML
    $options = "";
    foreach ($values_array as $value) {
        $values = explode( "-", $value ); // split the station name and fare value
        $station_name = trim( $values[0] ); // get the station name
        $fare_value = trim( $values[1] ); // get the fare value
        $options .= "<option fare='" . $fare_value . "' value='" . $station_name ."'>" . $station_name . " - " . $fare_value . "</option>";
    }

    // To add a new fare-value, simply modify the $station variable and separate the station name and fare value with a dash ("-") followed by a space
    // For example: $station = "Nazirpur - 600, Pirojpur -700, New Station - 800";

    // Then, run the same code above to update the options HTML with the new fare-value.


    // display the coach_no, time, and route data in the modal
    echo '<div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">' . $row['route'] . '</h5>
            <a href="trip_sheet.php?id=' . $row['id'] . '" target="_blank" class="btn btn-secondary mx-auto" rel="noopener noreferrer">Trip Sheet</a>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

        </div>';
    echo '
    <div class="modal-body">
        <div class="container text-center">
            <div class="container text-center">
                <div class="row">
                    <div class="col text-danger fw-bold">
                    ' . $row['coach_no'] . '
                    </div>
                    <div class="col text-danger fw-bold">
                    ' . $row['date'] . '
                    </div>
                    <div class="col text-danger fw-bold">
                    ' . $row['time'] . '
                    </div>
                </div>
            </div>
        </div>
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <div class="form-check form-check-inline">
                        <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'A1" autocomplete="on" ' . ( $row['a1'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'A1">A1</label>
                    
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'A2" autocomplete="on" ' . ( $row['a2'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'A2">A2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'A3" autocomplete="on" ' . ( $row['a3'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'A3">A3</label>
                    
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'A4" autocomplete="on" ' . ( $row['a4'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'A4">A4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'B1" autocomplete="on" ' . ( $row['b1'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'B1">B1</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'B2" autocomplete="on" ' . ( $row['b2'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'B2">B2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'B3" autocomplete="on" ' . ( $row['b3'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'B3">B3</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'B4" autocomplete="on" ' . ( $row['b4'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'B4">B4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'C1" autocomplete="on" ' . ( $row['c1'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'C1">C1</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'C2" autocomplete="on" ' . ( $row['c2'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'C2">C2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'C3" autocomplete="on" ' . ( $row['c3'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'C3">C3</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'C4" autocomplete="on" ' . ( $row['c4'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'C4">C4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'D1" autocomplete="on" ' . ( $row['d1'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'D1">D1</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'D2" autocomplete="on" ' . ( $row['d2'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'D2">D2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'D3" autocomplete="on" ' . ( $row['d3'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'D3">D3</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'D4" autocomplete="on" ' . ( $row['d4'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'D4">D4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'E1" autocomplete="on" ' . ( $row['e1'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'E1">E1</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'E2" autocomplete="on" ' . ( $row['e2'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'E2">E2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'E3" autocomplete="on" ' . ( $row['e3'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'E3">E3</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'E4" autocomplete="on" ' . ( $row['e4'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'E4">E4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'F1" autocomplete="on" ' . ( $row['f1'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'F1">F1</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'F2" autocomplete="on" ' . ( $row['f2'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'F2">F2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'F3" autocomplete="on" ' . ( $row['f3'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'F3">F3</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'F4" autocomplete="on" ' . ( $row['f4'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'F4">F4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'G1" autocomplete="on" ' . ( $row['g1'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'G1">G1</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'G2" autocomplete="on" ' . ( $row['g2'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'G2">G2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'G3" autocomplete="on" ' . ( $row['g3'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'G3">G3</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'G4" autocomplete="on" ' . ( $row['g4'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'G4">G4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'H1" autocomplete="on" ' . ( $row['h1'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'H1">H1</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'H2" autocomplete="on" ' . ( $row['h2'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'H2">H2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'H3" autocomplete="on" ' . ( $row['h3'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'H3">H3</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'H4" autocomplete="on" ' . ( $row['h4'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'H4">H4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col gap">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'I1" autocomplete="on" ' . ( $row['i1'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'I1">I1</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'I2" autocomplete="on" ' . ( $row['i2'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'I2">I2</label>
                        </div>
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'I3" autocomplete="on" ' . ( $row['i3'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'I3">I3</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'I4" autocomplete="on" ' . ( $row['i4'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'I4">I4</label>
                        </div>
                    </div>
                    <div class="row seat">
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'J1" autocomplete="on" ' . ( $row['j1'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'J1">J1</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'J2" autocomplete="on" ' . ( $row['j2'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'J2">J2</label>
                        </div>
                        <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'J5" autocomplete="on" ' . ( $row['j5'] == 1 ? 'checked disabled' : '' ) . '>
                        <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'J5">J5</label>
                        <div class="col">
                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'J3" autocomplete="on" ' . ( $row['j3'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'J3">J3</label>

                            <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'J4" autocomplete="on" ' . ( $row['j4'] == 1 ? 'checked disabled' : '' ) . '>
                            <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'J4">J4</label>
                        </div>
                    </div>
                        
                    </div>
                </div>
                <div class="col seat">
                    <form action="sell_ticket.php" method="post">
                        <div class="row g-2 seat">
                            <div class="col-md">
                                <select class="form-select" id="station" name="station" required>
                                    <option value="" selected disabled>Select Station</option>
                                    ' . $options . '
                                </select>
                            </div>
                        </div>
                        <div class="row g-2 seat">
                            <div id="selected-items"></div>
                            <br>
                            <input id="seat-no-input" class="form-control" type="text" name="seat_no" readonly>
                            
                            <input type="hidden" name="s_no" value="' . $row['s_no'] . '">
                            <input type="hidden" name="id" value="' . $row['id'] . '">
                            <input type="hidden" name="coach_no" value="' . $row['coach_no'] . '">
                            <input type="hidden" name="date" value="' . $row['date'] . '">
                            <input type="hidden" name="time" value="' . $row['time'] . '">
                            <input type="hidden" name="route" value="' . $row['route'] . '">

                        </div>
                        <div class="row g-2 seat">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input id="fare-input" class="form-control" type="number" name="fare" onchange="updateTotalFare()" readonly >
                                    <label for="mobile">Seat Fare</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input id="num-seat-input" class="form-control" type="number" name="num_seat" readonly >
                                    <label for="mobile">Total Seat</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input id="total-fare" class="form-control" type="number" name="total_fare" readonly >
                                    <label for="mobile">Total Fare</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 seat">
                            <div class="col-md">
                                <div class="form-floating">
                                <input type="tel" class="form-control" id="mobile" name="mobile"
                                    placeholder="01751944774" maxlength="11" autocomplete="cc-number" required
                                    onkeyup="getName(this.value)">                            
                                    <label for="mobile">Mobile Number</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="MR. X" value="MR. " maxlength="20" required>
                                    <label for="name">Name</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 seat">
                            <div class="col-md">
                                <select class="form-select" id="gender" name="gender" required>
                                    <option selected disabled>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        
                        <input type="submit" class="btn btn-info" value="Confirm">
                    </form>
                </div>
            </div>
        </div>
    </div>';
}
else {
    // if no rows are returned, display an error message
    echo "No data found.";
}

// Close the database connection
mysqli_close( $con );
?>


<script>
    // function to update the selected items in the "selected-items" div
    function updateSelectedItems() {
        // get all the checkboxes with class "btn-check" that are checked
        var selectedCheckboxes = document.querySelectorAll('.btn-check:checked');
        // get the "selected-items" div
        var selectedItemsDiv = document.getElementById('selected-items');
        // get the seat-no input
        var seatNoInput = document.getElementById('seat-no-input');
        // remove all child elements from the "selected-items" div
        selectedItemsDiv.innerHTML = '';
        // iterate over the selected checkboxes
        for (var i = 0; i < selectedCheckboxes.length; i++) {
            // skip over disabled checkboxes
            if (selectedCheckboxes[i].disabled) {
                continue;
            }
            // create a span element for each selected checkbox
            var selectedCheckboxSpan = document.createElement('span');
            selectedCheckboxSpan.className = 'badge bg-primary me-2';
            selectedCheckboxSpan.innerHTML = selectedCheckboxes[i].nextElementSibling.innerHTML;
            // add the span element to the "selected-items" div
            selectedItemsDiv.appendChild(selectedCheckboxSpan);
        }
        // set the value of the seat-no input to the selected items
        seatNoInput.value = selectedItemsDiv.innerText;
    }

    // listen for changes in the state of any checkbox with class "btn-check"
    document.querySelectorAll('.btn-check').forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            updateSelectedItems();
        });
    });


    // JS For Find Name by Mobile Number
    function getName(mobile) {
        // Send an AJAX request to the server
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // Update the name input field with the retrieved name
                document.getElementById("name").value = this.responseText;
            }
        };
        xhttp.open("GET", "get_name.php?mobile=" + mobile, true);
        xhttp.send();
    }




</script>

<!-- JS For Automatic Fare by Station -->
<script>
    // add event listener to station select element
    var stationSelect = document.getElementById("station");
    stationSelect.addEventListener("change", function () {
        // get selected option
        var selectedOption = this.options[this.selectedIndex];
        // get fare value from selected option
        var fareValue = selectedOption.getAttribute("fare");
        // set fare input value to fare value
        var fareInput = document.getElementById("fare-input");
        fareInput.value = fareValue;
    });
</script>


<!-- JS For Selected Seat Number -->
<script>
    function updateNumSeats() {
        // get all checkboxes with class "btn-check"
        var checkboxes = document.querySelectorAll('.btn-check:not(:disabled)');
        var numChecked = 0;
        // loop through checkboxes to count number of checked checkboxes
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                numChecked++;
            }
        }
        // set num seats input value
        var numSeatInput = document.getElementById("num-seat-input");
        numSeatInput.value = numChecked;

        var fareInput = document.getElementById("fare-input").value;

        var totalFare = numChecked * fareInput;

        var totalFareInput = document.getElementById("total-fare");
        totalFareInput.value = totalFare;


    }

    // add event listeners to checkboxes
    var checkboxes = document.querySelectorAll('.btn-check:not(:disabled)');
    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener('change', updateNumSeats);
    }

</script>