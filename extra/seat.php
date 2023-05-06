<div class="col">
    <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'I3" autocomplete="on" ' . ( $row[' i3']==1
        ? 'checked disabled' : '' ) . '>
    <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'I3">I3</label>

    <input type="checkbox" class="btn-check" id="' . $row['coach_no'] . 'I4" autocomplete="on" ' . ( $row['i4']==1
        ? 'checked disabled' : '' ) . '>
    <label class="btn btn-outline-primary" for="' . $row['coach_no'] . 'I4">I4</label>

    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#soldSeatsModal">Sold Seats</button>

    <!-- Modal -->
    <div class="modal fade" id="soldSeatsModal" tabindex="-1" aria-labelledby="soldSeatsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="soldSeatsModalLabel">Sold Seats Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Sold Seats: I1, I2</p>
                    <p>Sold Seats: A3, B2, F4</p>
                    <!-- You can display the sold seat details here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>