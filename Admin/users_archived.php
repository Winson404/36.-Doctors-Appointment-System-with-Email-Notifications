<title>CCP Clinic Appointment | Student records</title>
<?php
require_once 'sidebar.php';
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Archived Student</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Archived Student records</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="text-center d-none">Archived Student records</h5>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover text-sm">
                <thead>
                  <tr>
                    <th>STUDENT NUMBER</th>
                    <th>STUDENT NAME</th>
                    <th>DATE ADDED</th>
                    <th>TOOLS</th>
                  </tr>
                </thead>
                <tbody id="users_data">
                  <?php
                  $sql = mysqli_query($conn, "SELECT * FROM student WHERE is_deleted=1");
                  while ($row = mysqli_fetch_array($sql)) {
                  ?>
                  <tr>
                    <td><?php echo $row['studNum']; ?></td>
                    <td><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix']; ?></td>
                    <td class="text-primary"><?php echo $row['date_added']; ?></td>
                    <td>
                      <?php if($user_type == 'Admin'): ?>
                        <button type="button" class="btn bg-primary btn-sm" data-toggle="modal" data-target="#restore<?php echo $row['Id']; ?>"><i class="fas fa-undo"></i> Restore</button>
                      <?php else: ?>
                        <button type="button" class="btn bg-primary btn-sm" data-toggle="modal" data-target="#restore<?php echo $row['Id']; ?>" disabled><i class="fas fa-undo"></i> Restore</button>
                      <?php endif; ?>
                    </td>
                  </tr>
                  <?php include 'users_delete.php'; } ?>
                </tbody>
              </table>
            </div>
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
  <br>
  <br>
  <br>
  <br>
  <br>
  <?php require_once '../includes/footer.php'; ?>