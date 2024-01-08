  <?php include 'sweetalert_messages.php'; ?>
  <footer id="footer">
    <!-- <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Medicio</h3>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div> -->

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>CCP Clinic Appointment</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="#">Bryan Frial</a>
      </div>
    </div>
  </footer>

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <script src="assets/js/main.js"></script>
  <script src="plugins/jquery/jquery.min.js"></script>
  <script>
     // HIDE/SHOW PASSWORD
    function myFunction() {
      var x = document.getElementById("password");
      if (x.type === "password") {
        x.type = "text";
      } else {
        x.type = "password";
      }
    }


    // SHOW/HIDE PASSWORDS
    function showPassword() {
      var x = document.getElementById("mynewpassword");
      var y = document.getElementById("cpassword");
      if (x.type === "password" || y.type === "password") {
        x.type = "text";
        y.type = "text";
      } else {
        x.type = "password";
        y.type = "password";
      }
   }


    // IMAGE PREVIEW
    function getImagePreview(event) {
      var image=URL.createObjectURL(event.target.files[0]);
      var imagediv= document.getElementById('preview');
      var newimg=document.createElement('img');
      imagediv.innerHTML='';
      newimg.src=image;
      newimg.width="90";
      newimg.height="90";
      newimg.style['border-radius']="50%";
      newimg.style['display']="block";
      newimg.style['margin-left']="auto";
      newimg.style['margin-right']="auto";
      newimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
      imagediv.appendChild(newimg);
    }


    // LETTER ONLY
    function lettersOnly(input) {
      var regex = /[^a-z ]/gi;
      input.value = input.value.replace(regex, "");
    }



    // EMAIL VALIDATION
    function validation() {
      var email = document.getElementById("email").value;
      var pattern =/.+@(gmail)\.com$/;
      // var pattern =/.+@(gmail|yahoo)\.com$/;
      var form = document.getElementById("form");

      if(email.match(pattern)) {
          document.getElementById('text').style.color = 'green';
          document.getElementById('text').innerHTML = '';
          document.getElementById('submit_button').disabled = false;
          document.getElementById('submit_button').style.opacity = (1);
      } 
      else {
          document.getElementById('text').style.color = 'red';
          document.getElementById('text').innerHTML = 'Domain must be @gmail.com';
          document.getElementById('submit_button').disabled = true;
          document.getElementById('submit_button').style.opacity = (0.4);
          
      }
    }


    // EMAIL VALIDATION FOR SETTING APPOINTMENTS BY THE STUDENTS
    function validationAppointment() {
      var email = document.getElementById("email").value;
      var pattern = /.+@ccp\.edu\.ph$/;
      var form = document.getElementById("form");

      if (email.match(pattern)) {
        document.getElementById('text').style.color = 'green';
        document.getElementById('text').innerHTML = '';
        document.getElementById('submit_button').disabled = false;
        document.getElementById('submit_button').style.opacity = (1);
      } else {
        document.getElementById('text').style.color = 'red';
        document.getElementById('text').innerHTML = 'Domain must be @ccp.edu.ph';
        document.getElementById('submit_button').disabled = true;
        document.getElementById('submit_button').style.opacity = (0.4);
      }
    }




    // AUTO CALCULATE AGE
    function calculateAge() {
      var birthdate = new Date(document.getElementById("birthdate").value);
      var now = new Date();

      var ageInMilliseconds = now.getTime() - birthdate.getTime();
      var ageInSeconds = ageInMilliseconds / 1000;
      var ageInMinutes = ageInSeconds / 60;
      var ageInHours = ageInMinutes / 60;
      var ageInDays = ageInHours / 24;
      var ageInWeeks = ageInDays / 7;
      var ageInMonths = ageInDays / 30.44;
      var ageInYears = ageInDays / 365;

      var age = Math.floor(ageInYears);

      if (ageInDays >= 365) {
        var ageDescription = age + " year" + (age > 1 ? "s" : "") + " old";
      } else if (ageInDays >= 30) {
        var ageDescription = Math.floor(ageInMonths) + " month" + (Math.floor(ageInMonths) > 1 ? "s" : "") + " old";
      } else if (ageInDays >= 7) {
        var ageDescription = Math.floor(ageInWeeks) + " week" + (Math.floor(ageInWeeks) > 1 ? "s" : "") + " old";
      } else {
        var ageDescription = Math.floor(ageInDays) + " day" + (Math.floor(ageInDays) > 1 ? "s" : "") + " old";
      }

      document.getElementById("txtage").value = ageDescription;
    }




    /*MAKE PASSWORD MORE SECURED / VALIDATE PASSWORD*/
    const passwordField = document.getElementById('password');
    const passwordMessage = document.getElementById('password-message');
    passwordField.addEventListener('input', () => {
      const password = passwordField.value;
      let errors = [];

      // Check password length
      if (password.length < 8) {
        errors.push('Password must be at least 8 characters long.');
      }

      // Check if password contains a special character
      if (!/[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(password)) {
        errors.push('Password must contain at least one special character.');
      }

      // Display error messages if any
      if (errors.length > 0) {
        passwordMessage.innerText = errors.join(' ');
        passwordMessage.classList.add('error');
      } else {
        passwordMessage.innerText = '';
        passwordMessage.classList.remove('error');
      }
    });



    // PASSWORD MATCHING
    function validate_password() {
      var pass = document.getElementById('password').value;
      var confirm_pass = document.getElementById('cpassword').value;
      if (pass != confirm_pass) {
        document.getElementById('wrong_pass_alert').style.color = '#e60000';
        document.getElementById('wrong_pass_alert').innerHTML = 'X Password did not matched!';
        document.getElementById('submit_button').disabled = true;
        document.getElementById('submit_button').style.opacity = (0.4);
      } else {
        document.getElementById('wrong_pass_alert').style.color = 'green';
        document.getElementById('wrong_pass_alert').innerHTML = '✓ Password matched!';
        document.getElementById('submit_button').disabled = false;
        document.getElementById('submit_button').style.opacity = (1);
      }
    }

  </script>

</body>

</html>