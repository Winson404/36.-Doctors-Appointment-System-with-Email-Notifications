<title>CCP Clinic Appointment | Login</title>
<?php require 'header.php'; ?>

<!-- ======= Hero ======= -->
<section id="hero" class="bg-light">
  <div class="row d-flex justify-content-center m-4">
    <div class="col-lg-4 col-md-6 col-sm-12 col-12 m-5">
      <div class="login-box d-block m-auto">
        <div class="card card-outline card-primary ">
          <div class="card-header text-center">
            <!-- <a href="../../index2.html" class="h1"><b>Admin</b>LTE</a> -->
            <a href="login.php" class="h4">
              <img src="assets/img/Logo.png" alt="logo" class="img-fluid" width="130">
            </a>
          </div>
          <div class="card-body">
            <p class="text-center">Sign in to start your session</p>
            <form action="processes.php" method="post">
              <div class="input-group">
                <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email" onkeydown="validation()" onkeyup="validation()">
              </div>
              <!-- FOR INVALID EMAIL -->
              <div class="input-group mb-3">
                <small id="text" style="font-style: italic;"></small>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Enter your password" id="password" name="password" minlength="8" required>
              </div>
              <div class="row">
                <div class="col-8">
                  <div class="icheck-primary">
                    <input type="checkbox" id="remember" onclick="myFunction()">
                    <label for="remember">
                      Show password
                    </label>
                  </div>
                </div>
                <div class="col-4">
                  <button type="submit" class="btn btn-primary btn-block" name="login" id="submit_button" style="background-color: #DC143C; border: none;">Sign In</button>
                </div>
              </div>
            </form>
            <!-- <div class="social-auth-links text-center mt-2 mb-3">
              <a href="#" class="btn btn-block btn-primary">
                <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
              </a>
              <a href="#" class="btn btn-block btn-danger">
                <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
              </a>
            </div> -->
            <p class="mb-1">
              <a href="forgot-password.php" style="color: #DC143C;">Forgot password?</a>
            </p>
            <!-- <p class="mb-0">
              No account? <a href="register.php" class="text-center">Register here!</a>
            </p> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ======= End Hero ======= -->



<?php require 'footer.php'; ?>

