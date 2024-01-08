<title>CCP Clinic Appointment | Student records</title>
<?php
require_once 'sidebar.php';
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Student</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Student records</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
          <?php 
            if(isset($_GET['Id'])) {
              $Id = $_GET['Id'];
              $fetch = mysqli_query($conn, "SELECT * FROM student WHERE Id='$Id'");
              $row = mysqli_fetch_array($fetch);
          ?>
          <form action="process_update.php" method="POST">
            <input type="hidden" class="form-control" id="Id" name="Id" value="<?= $Id; ?>" required>
            <div class="card">
              <div class="card-header">
                <h5>Fill in the required fields below.</h5>
              </div>
              <div class="card-body">
                <div class="form-group mb-4">
                  <label for="studNum">Enter Student number</label>
                  <input type="number" class="form-control" id="studNum" name="studNum" placeholder="Enter student number" value="<?= $row['studNum']; ?>" required>
                </div>
                <div class="form-group">
                  <span for="firstname"><b>Enter first name</b></span>
                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name"  value="<?= $row['firstname']; ?>"required>
                </div>
                <div class="form-group">
                  <span for="middlename"><b>Enter middle name</b></span>
                  <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Enter middle name" value="<?= $row['middlename']; ?>">
                </div>
                <div class="form-group">
                  <span for="lastname"><b>Enter last name</b></span>
                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name"  value="<?= $row['lastname']; ?>"required>
                </div>
                <div class="form-group">
                  <span for="suffix"><b>Enter suffix</b></span>
                  <input type="text" class="form-control" id="suffix" name="suffix" placeholder="Enter suffix" value="<?= $row['suffix']; ?>">
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-sm btn-flat float-right" name="updateStudent"><i class="fa-solid fa-floppy-disk"></i> Update</button>
                <a href="users.php" class="btn btn-secondary btn-sm btn-flat float-right mr-2"><i class="fa-solid fa-backward"></i> Back</a>
              </div>
            </div>
          </form>
        <?php } else { ?>
          <form action="process_save.php" method="POST">
            <div class="card">
              <div class="card-header">
                <h5>Fill in the required fields below.</h5>
              </div>
              <div class="card-body">
                <div class="form-group">
                  <span for="studNum"><b>Enter Student number</b></span>
                  <input type="number" class="form-control" id="studNum" name="studNum" placeholder="Enter student number" required>
                </div>
                <div class="form-group">
                  <span for="firstname"><b>Enter first name</b></span>
                  <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name" required>
                </div>
                <div class="form-group">
                  <span for="middlename"><b>Enter middle name</b></span>
                  <input type="text" class="form-control" id="middlename" name="middlename" placeholder="Enter middle name">
                </div>
                <div class="form-group">
                  <span for="lastname"><b>Enter last name</b></span>
                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name" required>
                </div>
                <div class="form-group">
                  <span for="suffix"><b>Enter suffix</b></span>
                  <input type="text" class="form-control" id="suffix" name="suffix" placeholder="Enter suffix">
                </div>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-primary btn-block btn-sm btn-flat" name="addStudent"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
              </div>
            </div>
          </form>
          <?php } ?>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-12">
          <div class="card">
            <div class="card-header">
              <h5 class="text-center">Student records</h5>
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
                  $sql = mysqli_query($conn, "SELECT * FROM student WHERE is_deleted=0");
                  while ($row = mysqli_fetch_array($sql)) {
                  ?>
                  <tr>
                    <td><?php echo $row['studNum']; ?></td>
                    <td><?php echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' '.$row['suffix']; ?></td>
                    <td class="text-primary"><?php echo $row['date_added']; ?></td>
                    <td>
                      <?php if($user_type == 'Admin'): ?>
                        <a class="btn btn-info btn-sm" href="users.php?Id=<?php echo $row['Id']; ?>"><i class="fas fa-pencil-alt"></i> Edit</a>
                        <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['Id']; ?>"><i class="fas fa-trash"></i> Delete</button>
                      <?php else: ?>
                        <a class="btn btn-info btn-sm" href="users.php?Id=<?php echo $row['Id']; ?>" style="pointer-events: none; opacity: .5;"><i class="fas fa-pencil-alt"></i> Edit</a>
                        <button type="button" class="btn bg-danger btn-sm" data-toggle="modal" data-target="#delete<?php echo $row['Id']; ?>" disabled><i class="fas fa-trash"></i> Delete</button>
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