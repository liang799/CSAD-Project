<?php

require_once "config.php";
require_once "functions.php";
 
$username = $password = $email = "";
$username_err = $password_err = $email_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){

	/* ------ Username textfield ------ */
	if (empty(trim($_POST["username"]))) {
	    $username_err = "Username cannot be empty";
	} elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
		$username = $_POST["username"];
		$username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
		$result = selectUser($conn, $_POST["username"]);
		$username = $_POST["username"];
		if (!empty($result) && $result->num_rows > 0) {
			$username_err = "Username has been taken";
		} 
	}

	/* --------- Email textfield --------- */
	if (empty(trim($_POST["email"]))) {
		$email_err = "Email cannot be empty";
	} elseif (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_POST["email"])) {
		$email_err = "Not a valid email";
		$email = $_POST["email"];
	} else {
		$email = $_POST["email"];
	}

	/* --------- Password textfield --------- */
	if (empty($_POST["password"])) {
		$password_err = "Password cannot be empty";
    } elseif(strlen($_POST["password"]) < 6){
        $password_err = "Password must have at least 6 characters.";
		$password = $_POST["password"];
	} else {
		$password = $_POST["password"];
		$encrypted = password_hash($password, PASSWORD_DEFAULT);
		// don't need to manually add in salt and use hash function
	}

	// Check for no error messages
	if (empty($username_err) && empty($email_err) && empty($password_err)) {
		/* Prepared statement, stage 1: prepare */
		$stmt = $conn->prepare("INSERT INTO accounts(userName, userEmail, userPassword) VALUES (?, ?, ?)");

		/* Prepared statement, stage 2: bind and execute */
		$stmt->bind_param("sss", $username, $email, $encrypted); 
		$stmt->execute(); 
		$stmt->close();
	}
}
?>