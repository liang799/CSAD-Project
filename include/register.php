<?php

require_once "config.php";
require_once "functions.php";
 
$username = $password = "";
$username_err = $password_err = "";
$today = date('Y-m-d');
 
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
		$stmt = $conn->prepare("INSERT INTO accounts(userName, userPassword, userCreateDate) VALUES (?, ?, ?)");

		/* Prepared statement, stage 2: bind and execute */
		$stmt->bind_param("sss", $username, $encrypted, $today); 
		$stmt->execute(); 
		$stmt->close();

		$auth = true;
		setcookie ("username", $username, strtotime('+30 days'), "/CSAD-Project");
		setcookie ("password", $encrypted, strtotime('+30 days'), "/CSAD-Project");
		setcookie ("auth", $auth, strtotime('+30 days'), "/CSAD-Project");
		setcookie ("modal_show", "", strtotime('+1 days'), "/CSAD-Project");
		setcookie ("err_pass", "", strtotime('+1 days'), "/CSAD-Project");
		setcookie ("err_user", "", strtotime('+1 days'), "/CSAD-Project");
		$conn->close();
		header("location: ../edit-profile.php");
		die();
	} else {
		setcookie ("username", $username, strtotime('+1 days'), "/CSAD-Project");
		setcookie ("err_pass", $password_err, strtotime('+1 days'), "/CSAD-Project");
		setcookie ("err_user", $username_err, strtotime('+1 days'), "/CSAD-Project");
		setcookie ("modal_show", "register", strtotime('+1 days'), "/CSAD-Project");
		$conn->close();
		header("location: ../index.php");
		die();
	}
}
?>