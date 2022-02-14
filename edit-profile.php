<!doctype html>
<html>
	<head>
		<meta charset='utf-8'>
		<meta name='viewport' content='width=device-width, initial-scale=1'>
		<title>Snippet - BBBootstrap</title>
		<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
		<link href='css/edit-profile.css' rel='stylesheet'>
		<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
	</head>
	<body oncontextmenu='return false' class='snippet-body'>
		<div class="container rounded bg-white mt-5 mb-5">
			<div class="row">
					<div class="col-md-3 border-right">
						<div class="d-flex flex-column align-items-center text-center p-3 py-5">

							<div class="imagehover">
								<img class="rounded-circle imagehover mx-auto d-block" src="assets/img/user/default.png" style="width:128px;height:128px">
								<a href="http://localhost/CSAD_GROUP_PROJECT/editprofilepicture.php">
									<!--If it user is looking at his own profile, show "Update Profile Picture"-->
									<div class="imagehover-middle">
										<div class="imagehover-text" style="height:50%">Update Profile Picture</div>
									</div>
								</a>
							</div>
							<span style="padding-top: 2px" class="font-weight-bold">Edogaru</span>
							<span class="text-black-50">Joined on 2022</span>
						</div>	
					</div>
					<div class="col-md-5"> 
						<div class="p-3 py-5">
							<div class="d-flex justify-content-between align-items-center mb-3">
								<h4>Profile Settings</h4>
							</div>
							<form>
								<div class="row mt-2">
									<div class="col-md-6">
										<label>Username</label>
										<input type="text" name="username" class="form-control" value="test user" disabled>
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
							</form>
						</div>
					</div>
			</div>
		</div>
		<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
	</body>
</html>