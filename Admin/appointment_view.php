<div class="modal fade" id="view<?php echo $row['Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-calendar-alt"></i> Appointment information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-4">
            <div class="form-group">
              <label for="studNum">Student number</label>
              <input type="number" class="form-control" id="studNum"  value="<?= $row['studNum']; ?>" readonly>
            </div>
          </div>
        </div>
        <div class="row d-flex justify-content-center">
          <div class="col-4">
            <div class="form-group">
              <span for="name"><b>Student Name</b></span>
              <input type="text" class="form-control" id="name" value="<?= $row['name']; ?>" readonly>
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <span for="email"><b>Email</b></span>
              <input type="text" class="form-control" id="email" value="<?= $row['email']; ?>" readonly>
            </div>
          </div>
          <div class="col-4">
            <div class="form-group">
              <span for="phone"><b>Phone</b></span>
              <input type="text" class="form-control" id="phone" value="<?= $row['phone']; ?>" readonly>
            </div>  
          </div>
          <div class="col-3">
            <div class="form-group">
              <span for="date"><b>Date</b></span>
              <input type="text" class="form-control" id="date" value="<?= $row['selectedDate']; ?>" readonly>
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              <span for="time"><b>Time</b></span>
              <input type="text" class="form-control" id="time" value="<?= $row['selectedTime']; ?>" readonly>
            </div>  
          </div>
          <div class="col-6">
            <div class="form-group">
              <span for="doctor"><b>Doctor</b></span>
              <input type="text" class="form-control" id="doctor" value="<?= $row['doctor']; ?>" readonly>
            </div>
          </div>
          <div class="col-12">
            <div class="form-group">
              <span for="message"><b>Message</b></span>
              <textarea class="form-control" id="" cols="30" rows="2" disabled><?= $row['message']; ?></textarea>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Close</button>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="update<?php echo $row['Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-md"></i> Update Doctor's availability</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['Id']; ?>" name="Id">
          <span><b>Availability</b></span>
          <select class="form-control" name="availability" id="" required>
            <option value="0" <?php if($row['availability'] == 0) { echo 'selected'; } ?>>Unavailable</option>
            <option value="1" <?php if($row['availability'] == 1) { echo 'selected'; } ?>>Available</option>
          </select>
        </div>
        <div class="modal-footer alert-light">
          <button type="button" class="btn bg-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Close</button>
          <button type="submit" class="btn bg-primary" name="update_availability"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>