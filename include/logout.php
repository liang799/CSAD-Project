<?php
$auth = false;
setcookie ("username", $username, strtotime('+30 days'), "/CSAD-Project");
setcookie ("password", $encrypted, strtotime('+30 days'), "/CSAD-Project");
setcookie ("auth", $auth, strtotime('+30 days'), "/CSAD-Project");
header("location: ../index.php");
die();
?>