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
		$errorMsg = $error;
}

function alert($color, $msg) {
	switch ($color) {
		case 'red':
			$hex = '#f44336;';
			break;
		case 'green':
			$hex = '#2eb885;';
			break;
		default:
			$hex = '#46a7f5';
			break;
	}
	echo '<style>
	 /* The alert message box */
	.alert {
	  padding: 20px;
	  background-color: ' . $hex . ';
	  color: white;
	  margin-bottom: 15px;
	}

	/* The close button */
	.closebtn {
	  margin-left: 15px;
	  color: white;
	  font-weight: bold;
	  float: right;
	  font-size: 22px;
	  line-height: 20px;
	  cursor: pointer;
	  transition: 0.3s;
	}

	/* When moving the mouse over the close button */
	.closebtn:hover {
	  color: black;
	} 
	</style>

	<div class="alert">
		<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> ' . 
		$msg . 
	'</div>  ';
}
?>