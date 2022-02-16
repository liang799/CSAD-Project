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

function newResult($title, $time, $author, $topic) {
	echo '
	  <div class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
		<div class="row align-items-center">
		  <div class="col-md-8 mb-3 mb-sm-0">
			<h5>
			  <a href="#" class="text-primary">' . $title . '</a>
			</h5>
			<p class="text-sm"><span class="op-6">Posted on</span>
			' . $time . '<span class="op-6"> by</span> 
			' . $author . '</p>
			<div class="text-sm op-5">' . $topic . '</div>
		  </div>
		  <div class="col-md-4 op-7">
			<div class="row text-center op-7">
			  <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">122 Replys</span> </div>
			</div>
		  </div>
		</div>
	  </div>';
                  
}

function newPost($title, $time, $author, $topic) {
	echo '
                  <div class="card row-hover pos-relative py-3 px-3 mb-3 border-warning border-top-0 border-right-0 border-bottom-0 rounded-0">
                    <div class="row align-items-center">
                      <div class="col-md-8 mb-3 mb-sm-0">
                        <h5>
                          <a href="#" class="text-primary">Drupal 8 quick starter guide</a>
                        </h5>
                        <p class="text-sm"><span class="op-6">Posted</span> <a class="text-black" href="#">20 minutes</a> <span class="op-6">ago by</span> <a class="text-black" href="#">KenyeW</a></p>
                        <div class="text-sm op-5"> <a class="text-black mr-2" href="#">#C++</a> <a class="text-black mr-2" href="#">#AppStrap Theme</a> <a class="text-black mr-2" href="#">#Wordpress</a> </div>
                      </div>
                      <div class="col-md-4 op-7">
                        <div class="row text-center op-7">
                          <div class="col px-1"> <i class="ion-ios-chatboxes-outline icon-1x"></i> <span class="d-block text-sm">122 Replys</span> </div>
                        </div>
                      </div>
                    </div>
                  </div>';
}
?>
