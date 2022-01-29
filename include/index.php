<?php

require_once "config.php";
require_once "functions.php";
 
$first = $last = $email = $msg = "";
$first_err = $last_err = $email_err = $msg_err = "";
$result = $row = [];
 
if($_SERVER["REQUEST_METHOD"] == "POST"){

	/* ------ first name textfield ------ */
	if (empty(trim($_POST["first"]))) {
	    $first_err = "First name is required";
	} else {
		$first = $_POST["first"];
	}

	/* ------ last name textfield ------ */
	if (empty(trim($_POST["last"]))) {
	    $last_err = "Last name is required";
	} else {
		$last = $_POST["last"];
	}

	/* --------- Email textfield --------- */
	if (empty(trim($_POST["email"]))) {
		$email_err = "An email is required";
	} else {
		if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_POST["email"])) {
			$email_err = "Not a valid email";
		} else {
			$email = $_POST["email"];
		}
	}

	/* ------ msg textfield ------ */
	if (empty(trim($_POST["message"]))) {
	    $msg_err = "A message is required";
	} else {
		$msg = $_POST["message"];
	}

	// Check for no error messages
	if ( empty($username_err) && empty($email_err) && empty($password_err) && empty($msg_err)) {
		var_dump($row);
	}
}
?>