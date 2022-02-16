<?php

require_once "config.php";
require_once "functions.php";
require_once "checkAuth.php";

$user = $_COOKIE['username'];
$result = selectUser($conn, $user);
$row = $result->fetch_all(MYSQLI_ASSOC);
$picture = "uploads/" . $row[0]['userPicture'];
 
?>