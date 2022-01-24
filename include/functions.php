<?php
function selectUser($conn, $var) {
	// prepared statement is better than "WHERE userName=$var" (unprepared statement)

	/* Prepared statement, stage 1: prepare */
	$stmt = $conn->prepare("SELECT * FROM websitedatabase.accounts WHERE userName=?"); 

	/* Prepared statement, stage 2: bind and execute */
	$stmt->bind_param("s", $var);
	$stmt->execute();
	$result = $stmt->get_result();
	$stmt->close();

	return $result;
}

function checkPOST($rows, $col, &$var, $postVar, &$errorMsg, $error) {
	if (empty($rows))
		$errorMsg = $error;
	elseif ($rows[0][$col] == $postVar)
		$var = $postVar;
	else
		$errorMsg = "Idk went wrong";
}