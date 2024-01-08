<?php 

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	// require '../vendor/PHPMailer/src/Exception.php';
	// require '../vendor/PHPMailer/src/PHPMailer.php';
	// require '../vendor/PHPMailer/src/SMTP.php';
	if (!class_exists('PHPMailer\PHPMailer\Exception')) { require __DIR__ . '/../vendor/PHPMailer/src/Exception.php'; }
	if (!class_exists('PHPMailer\PHPMailer\PHPMailer')) { require __DIR__ . '/../vendor/PHPMailer/src/PHPMailer.php'; }
	if (!class_exists('PHPMailer\PHPMailer\SMTP')) { require __DIR__ . '/../vendor/PHPMailer/src/SMTP.php'; }

	
	
	// SAVE SYSTEM USERS - ADMIN/ADMIN_MGMT.PHP || ADMIN/USERS_MGMT.PHP
	function saveUser($conn, $page, $user_type = "User", $path = "images-users/") {
		$firstname        = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename       = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname         = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix           = mysqli_real_escape_string($conn, $_POST['suffix']);
		$dob              = mysqli_real_escape_string($conn, $_POST['dob']);
		$age              = mysqli_real_escape_string($conn, $_POST['age']);
		$birthplace       = mysqli_real_escape_string($conn, $_POST['birthplace']);
		$gender           = mysqli_real_escape_string($conn, $_POST['gender']);
		$civilstatus      = mysqli_real_escape_string($conn, $_POST['civilstatus']);
		$occupation       = mysqli_real_escape_string($conn, $_POST['occupation']);
		$religion		  = mysqli_real_escape_string($conn, $_POST['religion']);
		$email		      = mysqli_real_escape_string($conn, $_POST['email']);
		$contact		  = mysqli_real_escape_string($conn, $_POST['contact']);
		$house_no         = mysqli_real_escape_string($conn, $_POST['house_no']);
		$street_name      = mysqli_real_escape_string($conn, $_POST['street_name']);
		$purok            = mysqli_real_escape_string($conn, $_POST['purok']);
		$zone             = mysqli_real_escape_string($conn, $_POST['zone']);
		$barangay         = mysqli_real_escape_string($conn, $_POST['barangay']);
		$municipality     = mysqli_real_escape_string($conn, $_POST['municipality']);
		$province         = mysqli_real_escape_string($conn, $_POST['province']);
		$region           = mysqli_real_escape_string($conn, $_POST['region']);
		$password         = md5($_POST['password']);
		$file             = basename($_FILES["fileToUpload"]["name"]);
		$date_registered  = date('Y-m-d');

	    $check_email = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
	    if (mysqli_num_rows($check_email) > 0) {
	        displayErrorMessage("Email already exists!", $page);
	    } else {
	        $target_dir = $path;
	        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	        $uploadOk = 1;
	        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
	        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	        if ($check == false) {
	            displayErrorMessage("File is not an image.", $page);
	            $uploadOk = 0;
	        } elseif ($_FILES["fileToUpload"]["size"] > 500000) {
	            displayErrorMessage("File must be up to 500KB in size.", $page);
	            $uploadOk = 0;
	        } elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
	            displayErrorMessage("Only JPG, JPEG, PNG & GIF files are allowed.", $page);
	            $uploadOk = 0;
	        } elseif ($uploadOk == 0) {
	            displayErrorMessage("Your file was not uploaded.", $page);
	        } else {
	            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	            	$save = mysqli_query($conn, "INSERT INTO users (firstname, middlename, lastname, suffix, dob, age, email, contact, birthplace, gender, civilstatus, occupation, religion, house_no, street_name, purok, zone, barangay, municipality, province, region, image, password, user_type, date_registered) VALUES ('$firstname', '$middlename', '$lastname', '$suffix', '$dob', '$age', '$email', '$contact', '$birthplace', '$gender', '$civilstatus', '$occupation', '$religion', '$house_no', '$street_name', '$purok', '$zone', '$barangay', '$municipality', '$province', '$region', '$file', '$password', '$user_type', '$date_registered')");
	            	displaySaveMessage($save, $page);
	            } else {
	            	displayErrorMessage("There was an error uploading your profile picture.", $page); 
	            }
	        }
	    }
	}


	// SAVE STUDENTS - ADMIN|USERS.PHP
	function saveStudent($conn, $page) {
		$studNum    = mysqli_real_escape_string($conn, $_POST['studNum']);
		$firstname  = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname   = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix     = mysqli_real_escape_string($conn, $_POST['suffix']);

		$check_email = mysqli_query($conn, "SELECT * FROM student WHERE studNum='$studNum'");
		if(mysqli_num_rows($check_email) > 0 ) {
	       displayErrorMessage("Student number already exists!", $page);
		} else {
			$save = mysqli_query($conn, "INSERT INTO student (studNum, firstname, middlename, lastname, suffix, date_added) VALUES ('$studNum', '$firstname', '$middlename', '$lastname', '$suffix', NOW())");
    		displaySaveMessage($save, $page);
		}
	}


	// SAVE APPOINTMENT  INDEX.PHP
	function setAppointment($conn, $page) {
		$studNum      = mysqli_real_escape_string($conn, $_POST['studNum']);
		$firstname    = mysqli_real_escape_string($conn, $_POST['firstname']);
		$middlename   = mysqli_real_escape_string($conn, $_POST['middlename']);
		$lastname     = mysqli_real_escape_string($conn, $_POST['lastname']);
		$suffix       = mysqli_real_escape_string($conn, $_POST['suffix']);
		$email        = mysqli_real_escape_string($conn, $_POST['email']);
		$phone        = mysqli_real_escape_string($conn, $_POST['phone']);
		$selectedDate = mysqli_real_escape_string($conn, $_POST['selectedDate']);
		$selectedTime = mysqli_real_escape_string($conn, $_POST['selectedTime']);
		$doctor       = mysqli_real_escape_string($conn, $_POST['doctor']);
		$message      = mysqli_real_escape_string($conn, $_POST['message']);
		$date_today   = date('Y-m-d');

		$name = $firstname.' '.$middlename.' '.$lastname.' '.$suffix;
		$check_studNum = mysqli_query($conn, "SELECT * FROM student WHERE studNum='$studNum'");
		if(mysqli_num_rows($check_studNum) > 0 ) {
			$check_name = mysqli_query($conn, "SELECT * FROM student WHERE studNum='$studNum' AND firstname='$firstname' AND middlename='$middlename' AND lastname='$lastname' AND suffix='$suffix'");
			if(mysqli_num_rows($check_name) > 0 ) {
				$check_appt = mysqli_query($conn, "SELECT * FROM appointment WHERE studNum='$studNum' AND selectedDate='$selectedDate'");
				if(mysqli_num_rows($check_appt) > 0 ) {
			       displayErrorMessage("You have already set an appointment for the same date.", $page);
				} else {
					$check_appt2 = mysqli_query($conn, "SELECT * FROM appointment WHERE studNum='$studNum' AND DATE(date_added)='$date_today'");
					if(mysqli_num_rows($check_appt2) > 0 ) {
				       displayErrorMessage("You have already set an appointment today. Please come back on the other day.", $page);
					} else {
						$save = mysqli_query($conn, "INSERT INTO appointment (studNum, name, email, phone, selectedDate, selectedTime, doctor, message, date_added) VALUES ('$studNum', '$name', '$email', '$phone', '$selectedDate', '$selectedTime', '$doctor', '$message', NOW())");
			    		if ($save) {

			    			$subject = 'Appointment';
					        $message = '<p>Wishing you a good day from CCP Clinic, Mx. '.$name.',this is to inform you that you have successfully submitted an appointment schedule with Doctor '.ucwords($doctor).' on '.$selectedDate.' at exactly '.$selectedTime.'. Thank you and see you!</p>
					        <p><b>NOTE:</b> This is a system generated email. Please do not reply.</p> ';

				    	    $mail = new PHPMailer(true);
						    try {
						        // Server settings
						        $mail->isSMTP();
						        $mail->Host = 'smtp.gmail.com';
						        $mail->SMTPAuth = true;
						        $mail->Username = 'bryanfrial1@gmail.com';
						        $mail->Password = 'uzyydxpoylcwgdat';
						        $mail->SMTPOptions = array(
						            'ssl' => array(
						                'verify_peer' => false,
						                'verify_peer_name' => false,
						                'allow_self_signed' => true
						            )
						        );
						        $mail->SMTPSecure = 'ssl';
						        $mail->Port = 465;

						        // Send Email
						        $mail->setFrom('bryanfrial1@gmail.com');

						        // Recipients
						        $mail->addAddress($email);
						        $mail->addReplyTo('bryanfrial1@gmail.com');

						        // Content
						        $mail->isHTML(true);
						        $mail->Subject = $subject;
						        $mail->Body = $message;

						        $mail->send();

						        $_SESSION['message'] = "Appointment schedule submitted successfully";
								$_SESSION['text'] = "Saved successfully!";
								$_SESSION['status'] = "success";
								header("Location: $page");
								exit();

						    } catch (Exception $e) {
						        $_SESSION['success'] = "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
						        header("Location: $page");
						    }
						} else {
							$_SESSION['message'] = "Error.";
							$_SESSION['text'] = "Please try again.";
							$_SESSION['status'] = "error";
							header("Location: $page");
							exit();
						}
					}
				}
			} else {
		       displayErrorMessage("Name is not enrolled in the system.", $page);
			}
		} else {
			displayErrorMessage("Student Number does not exist.", $page);
		}
	}


	









	// CONTACT EMAIL MESSAGING
	function sendEmail($subject, $message, $recipientEmail, $page) {
	    $mail = new PHPMailer(true);
	    try {
	        // Server settings
	        $mail->isSMTP();
	        $mail->Host = 'smtp.gmail.com';
	        $mail->SMTPAuth = true;
	        $mail->Username = 'bryanfrial1@gmail.com';
	        $mail->Password = 'uzyydxpoylcwgdat';
	        $mail->SMTPOptions = array(
	            'ssl' => array(
	                'verify_peer' => false,
	                'verify_peer_name' => false,
	                'allow_self_signed' => true
	            )
	        );
	        $mail->SMTPSecure = 'ssl';
	        $mail->Port = 465;

	        // Send Email
	        $mail->setFrom('bryanfrial1@gmail.com');

	        // Recipients
	        $mail->addAddress($recipientEmail);
	        $mail->addReplyTo('bryanfrial1@gmail.com');

	        // Content
	        $mail->isHTML(true);
	        $mail->Subject = $subject;
	        $mail->Body = $message;

	        $mail->send();

	        $_SESSION['success'] = "Email sent successfully!";
			$_SESSION['text'] = "Saved successfully!";
			$_SESSION['status'] = "success";
			header("Location: $page");

	    } catch (Exception $e) {
	        $_SESSION['success'] = "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
	        header("Location: $page");
	    }
	}


	// CONTACT EMAIL MESSAGING
	function contactUs($conn, $name, $subject, $message, $email, $page) {
	    $mail = new PHPMailer(true);
	    try {
	        // Server settings
	        $mail->isSMTP();
	        $mail->Host = 'smtp.gmail.com';
	        $mail->SMTPAuth = true;
	        $mail->Username = 'bryanfrial1@gmail.com';
	        $mail->Password = 'uzyydxpoylcwgdat';
	        $mail->SMTPOptions = array(
	            'ssl' => array(
	                'verify_peer' => false,
	                'verify_peer_name' => false,
	                'allow_self_signed' => true
	            )
	        );
	        $mail->SMTPSecure = 'ssl';
	        $mail->Port = 465;

	        // Send Email
	        $mail->setFrom('bryanfrial1@gmail.com');

	        // Recipients
	        $mail->addAddress('bryanmiguelfrial@ccp.edu.ph');
	        $mail->addReplyTo('bryanfrial1@gmail.com');

	        // Content
	        $mail->isHTML(true);
	        $mail->Subject = $subject;
	        $mail->Body = $message;

	        $mail->send();

	        $_SESSION['success'] = "Email sent successfully!";
			header("Location: $page");

	    } catch (Exception $e) {
	        $_SESSION['success'] = "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
	        header("Location: $page");
	    }
	}


?>



