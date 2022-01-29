<?php

require_once "config.php";
require_once "functions.php";
$row = [];

if (empty($_COOKIE['auth']) or empty($_COOKIE['username']) or empty($_COOKIE['password'])) {
	header("location: index.php");
} elseif ($_COOKIE['auth'] == false) {
	header("location: register.php");
} else {
	// try getting row containing user
	$result = selectUser($conn, $_COOKIE['username']);
	$row = $result->fetch_all(MYSQLI_ASSOC);
	/*if (empty($row)) {
		header("location: index.php");
	} else {
		$encrypted = $row[0]['userpassword'];
		echo $encrypted;
		if ($encrypted != $_COOKIE['password'])
			header("location: index.php");
	}*/
}
 
?>