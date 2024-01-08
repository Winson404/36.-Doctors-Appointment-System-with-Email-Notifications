<title>CCP Clinic Appointment | Available Appointment records</title>
<?php 
    require_once 'sidebar.php'; 
?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Available Appointment</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Available Appointment records</li>
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
              <div class="card-header p-2">
                <div class="card-tools mr-1">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover text-sm">
                  <thead>
                    <tr>
                      <th>STUDENT NUMBER</th>
                      <th>NAME</th>
                      <th>SELECTED DATE</th>
                      <th>SELECTED TIME</th>
                      <th>DOCTOR'S NAME</th>
                      <th>TOOLS</th>
                    </tr>
                  </thead>
                  <tbody id="users_data">
                    <?php
                    $sql = mysqli_query($conn, "SELECT * FROM appointment WHERE availability = 1");
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>
                    <?php if($row['availability'] == 0):?>
                    <tr class="text-muted">
                    <?php else: ?>
                    <tr class="text-bold">
                    <?php endif; ?>
                      <td><?= $row['studNum'] ?></td>
                      <td><?= $row['name'] ?></td>
                      <td><?php echo $row['selectedDate']; ?></td>
                      <td><?php echo $row['selectedTime']; ?></td>
                      <td><?= $row['doctor'] ?></td>
                      <td>
                        <button type="button" class="btn bg-primary btn-sm" data-toggle="modal" data-target="#view<?php echo $row['Id']; ?>"><i class="fas fa-folder"></i> View</button>
                        <?php if($user_type == 'Admin'): ?>
                          <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update<?php echo $row['Id']; ?>"><i class="fas fa-pencil-alt"></i> Edit availability</button>
                        <?php else: ?>
                          <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#update<?php echo $row['Id']; ?>" disabled><i class="fas fa-pencil-alt"></i> Edit availability</button>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php include 'appointment_view.php'; }  ?>
                  </tbody>
                </table>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php require_once '../includes/footer.php'; ?>