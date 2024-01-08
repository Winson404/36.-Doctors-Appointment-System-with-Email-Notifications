<?php 
	include '../config.php';
	include '../includes/function_delete.php';

	// DELETE ADMIN - ADMIN_DELETE.PHP
	if (isset($_POST['delete_admin'])) {
	    $user_Id = $_POST['user_Id'];
	    deleteRecord($conn, "users", "user_Id", $user_Id, "admin.php");
	}


	// DELETE USER - USERS_DELETE.PHP
	if (isset($_POST['delete_student'])) {
	    $Id = $_POST['Id'];
	    // deleteRecord($conn, "student", "Id", $Id, "users.php");
	    $del = mysqli_query($conn, "UPDATE student SET is_deleted=1 WHERE Id='$Id'");
	    if ($del) {
			$_SESSION['message'] = "Record has been deleted";
			$_SESSION['text'] = "Deleted successfully!";
			$_SESSION['status'] = "success";
			header("Location: users.php");
			exit();
		} else {
			$_SESSION['message'] = "Error.";
			$_SESSION['text'] = "Please try again.";
			$_SESSION['status'] = "error";
			header("Location: users.php");
			exit();
		}
	}


	// RESTORE STDUENT - STDUENT_RESTORE.PHP
	if (isset($_POST['restore_student'])) {
	    $Id = $_POST['Id'];
	    // deleteRecord($conn, "student", "Id", $Id, "users.php");
	    $del = mysqli_query($conn, "UPDATE student SET is_deleted=0 WHERE Id='$Id'");
	    if ($del) {
			$_SESSION['message'] = "Record has been restored";
			$_SESSION['text'] = "Restored successfully!";
			$_SESSION['status'] = "success";
			header("Location: users_archived.php");
			exit();
		} else {
			$_SESSION['message'] = "Error.";
			$_SESSION['text'] = "Please try again.";
			$_SESSION['status'] = "error";
			header("Location: users_archived.php");
			exit();
		}
	}



	

?>




