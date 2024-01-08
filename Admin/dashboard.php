<title>CCP Clinic Appointment | Dashboard</title>
<?php
require_once 'sidebar.php';
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              $users = mysqli_query($conn, "SELECT user_Id FROM users");
              $row_users = mysqli_num_rows($users);
              ?>
              <h3><?php echo $row_users; ?></h3>
              <p>Administrators</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-cog"></i>
            </div>
            <a href="admin.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              $student = mysqli_query($conn, "SELECT Id from student");
              $row_student = mysqli_num_rows($student);
              ?>
              <h3><?php echo $row_student; ?></h3>
              <p>Registered students</p>
            </div>
            <div class="icon">
              <i class="fas fa-graduation-cap"></i>
            </div>
            <a href="users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <h3>Appointment Reports</h3>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              $today = date("Y-m-d"); // Get today's date in the format "YYYY-MM-DD"
              
              // Modify the SQL query to count appointments for today
              $daily_appt_query = mysqli_query($conn, "SELECT COUNT(Id) AS daily_count, availability FROM appointment WHERE DATE(date_added) = '$today' AND availability=1");
              $row_daily_appt = mysqli_fetch_assoc($daily_appt_query);
              $count_today = $row_daily_appt['daily_count'];
              ?>
              <h3><?php echo $count_today; ?></h3>
              <p>Today's Appointment</p>
            </div>
            <div class="icon">
              <i class="fas fa-calendar-alt"></i>
            </div>
            <a href="appointment.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              $currentYear = date("Y"); // Get the current year
              $currentMonth = date("m"); // Get the current month
              
              // Modify the SQL query to count appointments for the current month and year
              $monthly_appt_query = mysqli_query($conn, "SELECT COUNT(Id) AS monthly_count, availability FROM appointment WHERE YEAR(date_added) = '$currentYear' AND MONTH(date_added) = '$currentMonth' AND availability=1");
              $row_monthly_appt = mysqli_fetch_assoc($monthly_appt_query);
              $count_monthly = $row_monthly_appt['monthly_count'];
              ?>
              <h3><?php echo $count_monthly; ?></h3>
              <p>Monthly Appointment</p>
            </div>
            <div class="icon">
              <i class="fas fa-calendar-alt"></i>
            </div>
            <a href="appointment.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <?php
              $total_appt = mysqli_query($conn, "SELECT Id, availability from appointment WHERE availability=1");
              $row_total_appt = mysqli_num_rows($total_appt);
              ?>
              <h3><?php echo $row_total_appt; ?></h3>
              <p>Total Appointments</p>
            </div>
            <div class="icon">
              <i class="fas fa-calendar-alt"></i>
            </div>
            <a href="appointment.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <h3>Unattended Appointment Reports</h3>
        </div>
        <div class="col-lg-3 col-6">
          <div class="small-box bg-info">
            <div class="inner">
              <?php
              $today = date("Y-m-d"); // Get today's date in the format "YYYY-MM-DD"
              
              // Modify the SQL query to count appointments for today
              $daily_appt_query = mysqli_query($conn, "SELECT COUNT(Id) AS daily_count, availability FROM appointment WHERE DATE(date_added) = '$today' AND availability=0");
              $row_daily_appt = mysqli_fetch_assoc($daily_appt_query);
              $count_today = $row_daily_appt['daily_count'];
              ?>
              <h3><?php echo $count_today; ?></h3>
              <p>Today's Appointment</p>
            </div>
            <div class="icon">
              <i class="fas fa-calendar-alt"></i>
            </div>
            <a href="appointment_unattended.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-success">
            <div class="inner">
              <?php
              $currentYear = date("Y"); // Get the current year
              $currentMonth = date("m"); // Get the current month
              
              // Modify the SQL query to count appointments for the current month and year
              $monthly_appt_query = mysqli_query($conn, "SELECT COUNT(Id) AS monthly_count, availability FROM appointment WHERE YEAR(date_added) = '$currentYear' AND MONTH(date_added) = '$currentMonth' AND availability=0");
              $row_monthly_appt = mysqli_fetch_assoc($monthly_appt_query);
              $count_monthly = $row_monthly_appt['monthly_count'];
              ?>
              <h3><?php echo $count_monthly; ?></h3>
              <p>Monthly Appointment</p>
            </div>
            <div class="icon">
              <i class="fas fa-calendar-alt"></i>
            </div>
            <a href="appointment_unattended.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-6">
          <div class="small-box bg-danger">
            <div class="inner">
              <?php
              $total_appt = mysqli_query($conn, "SELECT Id, availability from appointment WHERE availability=0");
              $row_total_appt = mysqli_num_rows($total_appt);
              ?>
              <h3><?php echo $row_total_appt; ?></h3>
              <p>Total Appointments</p>
            </div>
            <div class="icon">
              <i class="fas fa-calendar-alt"></i>
            </div>
            <a href="appointment_unattended.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

    </div>
  </section>

  <br>
  <br>
  <br>
  <br>
  <br>
  <?php require_once '../includes/footer.php'; ?>