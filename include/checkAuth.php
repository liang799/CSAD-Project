<?php

$row = [];

if (empty($_COOKIE['auth']) or empty($_COOKIE['username']) or empty($_COOKIE['password'])) {
	header("location: index.php");
} else {
	// try getting row containing user
	$result = selectUser($conn, $_COOKIE['username']);
	$row = $result->fetch_all(MYSQLI_ASSOC);
	if (empty($row)) {
		header("location: index.php");
	} else {
		$encrypted = $row[0]['userPassword'];
		if ($encrypted != $_COOKIE['password'])
			header("location: index.php");
	}
}

?>