<?php

require_once "config.php";
require_once "functions.php";

if (empty($_COOKIE['auth']) or empty($_COOKIE['user']) or empty($_COOKIE['password'])) {
	header("location: index.php");
} elseif ($_COOKIE['auth'] == false) {
	header("location: register.php");
} else {
	// try getting row containing user
	$result = selectuser($conn, $_COOKIE['user']);
	$row = $result->fetch_all(mysqli_assoc);
	if (empty($row)) {
		header("location: index.php");
	} else {
		$encrypted = $row[0]['userpassword'];
		if ($encrypted != $_COOKIE['password'])
			header("location: index.php");
	}
}
 
?>