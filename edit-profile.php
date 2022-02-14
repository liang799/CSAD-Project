<?php
require_once "include/config.php";
require_once "include/functions.php";
require_once "include/checkAuth.php";

$user = $_COOKIE['username'];
$result = selectUser($conn, $user);
$row = $result->fetch_all(MYSQLI_ASSOC);
$date = $row[0]['userCreateDate'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $image = $_FILES['image']['tmp_name']['0'];
    $img = file_get_contents($image);

	$stmt = $conn->prepare("UPDATE accounts SET userPicture = ? WHERE userName = ?"); 

	$stmt->bind_param("ss", $img, $user);
	$stmt->execute();
	$stmt->close();
}
?>

<!doctype html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<title>Edit Profile</title>
		<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
		<link href='css/edit-profile.css' rel='stylesheet'>
		<script type='text/javascript' src='js/edit-profile.js'></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
	</head>
	<body oncontextmenu='return false' class='snippet-body'>
		<form method="POST" action="" class="container rounded bg-white mt-5 mb-5" enctype="multipart/form-data">
			<div class="row">
					<div class="col-md-3 border-right">
						<div class="d-flex flex-column align-items-center text-center p-3 py-5">
							<div class="profile-pic">
							  <label class="-label" for="file">
							    <i class="bi bi-camera">&nbsp;</i>
								<span>Change Image</span>
							  </label>
							  <input id="file" type="file" name="image[]" onchange="loadFile(event)"/>
							  <img src="assets/img/user/default.png" id="output" width="200" />
							</div>
							<span style="padding-top: 15px" class="font-weight-bold"><?php echo $user ?></span>
							<span class="text-black-50">Joined on <?php echo $date ?></span>
						</div>	
					</div>
					<div class="col-md-5"> 
						<div class="p-3 py-5">
							<div class="d-flex justify-content-between align-items-center mb-3">
								<h4>Profile Settings</h4>
							</div>
								<div class="row mt-2">
									<div class="col-md-6">
										<label>Username</label>
										<input type="text" name="username" class="form-control" value="<?php echo $user ?>" disabled>
									</div>
								</div>
								<div class="row mt-3">
									<div class="col-md-6">
										<label>Bio</label>
										<textarea name="message" type="text" style="height: 6rem" 
												  class="form-control <?php echo (!empty($msg_err)) ? 'is-invalid' : ''; ?>"><?php echo "test"; ?>
										</textarea>
									</div>
								</div>
								<div class="row mt-4">
									<div class="col-md-6">
										<input type="submit" class="btn btn-primary" value="Submit">
									</div>
								</div>
						</div>
					</div>
			</div>
		</form>
		<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
	</body>
</html>