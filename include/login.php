<?php

require_once "config.php";
require_once "functions.php";
 
$username = $email = $password = "";
$username_err = $password_err = $email_err = "";
$result = $row = [];
 
if($_SERVER["REQUEST_METHOD"] == "POST"){

	/* ------ Username textfield ------ */
	if (empty(trim($_POST["username"]))) {
	    $username_err = "Username cannot be empty";
	} else {
		$username = $_POST["username"];

		if (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
			$username_err = "Username can only contain letters, numbers, and underscores.";
		} else {
			// try getting row containing user
			$result = selectUser($conn, $_POST["username"]);
			$row = $result->fetch_all(MYSQLI_ASSOC);

			// check if user is in row
			checkPOST($row, "userName", $username, $_POST["username"], $username_err, "User not found");
		}
	}

	/* --------- Password textfield --------- */
	if (empty($_POST["password"])) {
		$password_err = "Password cannot be empty";
	} elseif(strlen($_POST["password"]) < 6){
		$password_err = "Password too short";
	} elseif(strlen($_POST["password"]) > 30){
		$password_err = "Stop spamming";
	} else {
		$password = $_POST["password"];
		if (empty($username_err)) {
			$encrypted = $row[0]['userPassword'];
			if (!password_verify($password, $encrypted)) 
				$password_err = "Wrong password";
		} else {
			$password_err = "Nice try hacker";
		}
	}

	// Check for no error messages
	if ( empty($username_err) && empty($email_err) && empty($password_err) ) {
		$auth = true;

		setcookie ("username", $username, strtotime('+30 days'), "/CSAD-Project");
		setcookie ("password", $encrypted, strtotime('+30 days'), "/CSAD-Project");
		setcookie ("auth", $auth, strtotime('+30 days'), "/CSAD-Project");
		setcookie ("modal_show", "", strtotime('+1 days'), "/CSAD-Project");
		setcookie ("err_pass", "", strtotime('+1 days'), "/CSAD-Project");
		setcookie ("err_user", "", strtotime('+1 days'), "/CSAD-Project");
		header("location: ../home.php");
		die();
	} else {
		setcookie ("err_pass", $password_err, strtotime('+1 days'), "/CSAD-Project");
		setcookie ("err_user", $username_err, strtotime('+1 days'), "/CSAD-Project");
		setcookie ("username", $username, strtotime('+1 days'), "/CSAD-Project");
		setcookie ("modal_show", "login", strtotime('+1 days'), "/CSAD-Project");
		header("location: ../index.php");
		die();
	}
}
?>