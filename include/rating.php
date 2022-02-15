<?php

require_once "config.php";
require_once "functions.php";
 
$rating = -1;
 
if($_SERVER["REQUEST_METHOD"] == "GET"){
	/* --------- Rating --------- */
	if (empty($_GET["stars"])) {
		$rating = 0;
	} else {
		$rating = $_GET['stars'];
	}

	if (isset($_GET["rating-type"]))
		$type = $_GET["rating-type"];

	// Check for no error messages
	if ($rating > 0 && isset($type)) {
		$stmt = $conn->prepare("INSERT INTO userrating(rating, type) VALUES (?, ?)");
		$stmt->bind_param("is", $rating, $type);
		$stmt->execute();
		$result = $stmt->get_result();
		$stmt->close();
	}
	header("location: ../index.php");
	die();
}
?>