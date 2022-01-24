<?php

require_once "include/config.php";
require_once "include/functions.php";
 
$username = $email = "";
$username_err = $password_err = $email_err = "";
$result = $row = [];
 
if($_SERVER["REQUEST_METHOD"] == "POST"){

	/* ------ Username textfield ------ */
	if (empty(trim($_POST["username"]))) {
	    $username_err = "Username cannot be empty";
	} else {
		$username = $_POST["username"];

		if (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
			$username_err = "Username can only contain letters, numbers, and underscores.";
		} else {
			// try getting row containing user
			$result = selectUser($conn, $_POST["username"]);
			$row = $result->fetch_all(MYSQLI_ASSOC);

			// check if user is in row
			checkPOST($row, "userName", $username, $_POST["username"], $username_err, "User not found");
		}
	}

	/* --------- Email textfield --------- */
	if (empty(trim($_POST["email"]))) {
		$email_err = "Email cannot be empty";
	} else {
		$email = $_POST["email"];

		if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_POST["email"])) {
			$email_err = "Not a valid email";
		} else {
			if (!empty($result) && $result->num_rows > 0)
				checkPOST($row, "userEmail", $email, $_POST["email"], $email_err, "Email not found");
			else
				$email_err = "Please enter your username";
		}
	}

	/* --------- Password textfield --------- */
	if (empty($_POST["password"])) {
		$password_err = "Password cannot be empty";
    } elseif(strlen($_POST["password"]) < 6){
        $password_err = "Password too short";
    } elseif(strlen($_POST["password"]) > 30){
        $password_err = "Stop spamming";
	} else {
		$password = $_POST["password"];
		$encrypted = $row[0]['userPassword'];
		if (!password_verify($password, $encrypted)) 
			$password_err = "Wrong password";
	}

	// Check for no error messages
	if ( empty($username_err) && empty($email_err) && empty($password_err) ) {
		var_dump($row);
	}
}
?>
 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>