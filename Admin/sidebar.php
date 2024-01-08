<?php
  require_once '../config.php';
  if(isset($_SESSION['admin_Id']) && isset($_SESSION['login_time'])) {
    $id = $_SESSION['admin_Id'];
    $users = mysqli_query($conn, "SELECT * FROM users WHERE user_Id='$id'");
    $row = mysqli_fetch_array($users);
    $user_type = $row['user_type'];

    $login_time = $_SESSION['login_time'];
    $logout_time = date('Y-m-d h:i A');
    // RECORD TIME LOGGED IN TO BE USED IN AUTO LOGOUT - CODE CAN BE FOUND ON ../INCLUDES/FOOTER.PHP
    $_SESSION['last_active'] = time();
    require_once '../includes/header.php';
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <a href="dashboard.php" class="brand-link">
    <img src="../assets/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">CCP Clinic Appt</span>
   <!--  <br>
    <span class="text-sm ml-5 font-weight-light mt-2">&nbsp;&nbsp;Sample Address</span> -->
  </a>
  
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div> -->
    <!-- SidebarSearch Form -->
    <!-- <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div> -->
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <li class="nav-item">
          <a href="dashboard.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'dashboard.php') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link
            <?php
            echo (
            basename($_SERVER['PHP_SELF']) == 'admin.php' ||
            basename($_SERVER['PHP_SELF']) == 'admin_mgmt.php' ||
            basename($_SERVER['PHP_SELF']) == 'admin_view.php' ||
            basename($_SERVER['PHP_SELF']) == 'users.php' ||
            basename($_SERVER['PHP_SELF']) == 'users_archived.php'
            ) ? 'active' : '';
            ?>
            ">
            <i class="fa-solid fa-users-gear"></i>
            <p>&nbsp;&nbsp;System Users<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview"
            <?php
            echo (
            basename($_SERVER['PHP_SELF']) == 'admin.php' ||
            basename($_SERVER['PHP_SELF']) == 'admin_mgmt.php' ||
            basename($_SERVER['PHP_SELF']) == 'admin_view.php' ||
            basename($_SERVER['PHP_SELF']) == 'users.php' || 
            basename($_SERVER['PHP_SELF']) == 'users_archived.php'
            ) ? 'style="display: block;"' : '';
            ?>
            >
            <li class="nav-item">
              <a href="admin.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'admin.php' || basename($_SERVER['PHP_SELF']) == 'admin_mgmt.php' || basename($_SERVER['PHP_SELF']) == 'admin_view.php') ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>&nbsp;&nbsp; Administrators</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link 
                <?php
                  echo (
                  basename($_SERVER['PHP_SELF']) == 'users.php'  ||
                  basename($_SERVER['PHP_SELF']) == 'users_archived.php'
                ) ? 'active' : '';
                ?>
              ">
                <i class="fas fa-user-graduate"></i>
                <p>&nbsp;&nbsp; Student records <i class="right fas fa-angle-left"></i></p>
              </a>
              <ul class="nav nav-treeview"
                <?php
                echo (
                  basename($_SERVER['PHP_SELF']) == 'users.php' ||
                  basename($_SERVER['PHP_SELF']) == 'users_archived.php'
                ) ? 'style="display: block;"' : '';
                ?>
                >
                <li class="nav-item">
                  <a href="users.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'users.php') ? 'active' : ''; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>&nbsp;&nbsp; All students</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="users_archived.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'users_archived.php' || basename($_SERVER['PHP_SELF']) == 'users_mgmt.php' || basename($_SERVER['PHP_SELF']) == 'users_view.php') ? 'active' : ''; ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>&nbsp;&nbsp; Archived students</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>

      
        <li class="nav-item">
          <a href="#" class="nav-link
            <?php
            echo (
            basename($_SERVER['PHP_SELF']) == 'appointment.php' ||
            basename($_SERVER['PHP_SELF']) == 'appointment_unattended.php'
            ) ? 'active' : '';
            ?>
            ">
            <i class="fas fa-calendar-alt"></i>
            <p>&nbsp;&nbsp;Appointment<i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview"
            <?php
            echo (
            basename($_SERVER['PHP_SELF']) == 'appointment.php' ||
            basename($_SERVER['PHP_SELF']) == 'appointment_unattended.php'
            ) ? 'style="display: block;"' : '';
            ?>
            >
            <li class="nav-item">
              <a href="appointment.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'appointment.php') ? 'active' : ''; ?>">
                <i class="fas fa-calendar-alt"></i>
                <p>&nbsp;&nbsp; Available Appointments</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="appointment_unattended.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'appointment_unattended.php') ? 'active' : ''; ?>">
                <i class="fas fa-calendar-alt"></i>
                <p>&nbsp;&nbsp; Unattended Appointments</p>
              </a>
            </li>
          </ul>
        </li>
        
        

        <li class="nav-item">
          <a href="log_history.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'log_history.php') ? 'active' : ''; ?>">
            <i class="fas fa-list-alt"></i>
            <p>&nbsp;&nbsp; Log history</p>
          </a>
        </li>
        
      </ul>
    </nav>
  </div>
</aside>
<?php
  } else {
    header('Location: ../login.php');
  }
?>