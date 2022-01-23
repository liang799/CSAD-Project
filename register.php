<?php
// Include config file
require_once "include/config.php";
 
// Define variables and initialize with empty values
$username = $password = $email = "";
$username_err = $password_err = $email_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

	// Username textfield
	if (empty(trim($_POST["username"]))) {
	    $username_err = "username cannot be empty";
	} elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
		$username = $_POST["username"];
		$username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
		//prepared statement is better than "WHERE userName=$var" (unprepared statement)
		$stmt = $conn->prepare("SELECT * FROM websitedatabase.accounts WHERE userName=?"); 
		$stmt->bind_param("s", $_POST["username"]);
		$stmt->execute();
		$result = $stmt->get_result();
		$username = $_POST["username"];

		if (!empty($result) && $result->num_rows > 0) {
			$username_err = "Username has been taken";
		} 
		$stmt->close();
	}

	// Email textfield
	if (empty(trim($_POST["email"]))) {
		$email_err = "email cannot be empty";
	} elseif (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_POST["email"])) {
		$email_err = "Not a valid email";
		$email = $_POST["email"];
	} else {
		$email = $_POST["email"];
	}

	// Password textfield
	if (empty($_POST["password"])) {
		$password_err = "Password cannot be empty";
    } elseif(strlen($_POST["password"]) < 6){
        $password_err = "Password must have at least 6 characters.";
		$password = $_POST["password"];
	} else {
		$password = $_POST["password"];
		$encrypted = password_hash($password, PASSWORD_DEFAULT);
		// don't need to manually add in salt and use hash function
	}

	// Check for no error messages
	if (empty($username_err) && empty($email_err) && empty($password_err)) {
		/* Prepared statement, stage 1: prepare */
		$stmt = $conn->prepare("INSERT INTO accounts(userName, userEmail, userPassword) VALUES (?, ?, ?)");

		/* Prepared statement, stage 2: bind and execute */
		$stmt->bind_param("sss", $username, $email, $encrypted); 
		$stmt->execute(); 
		echo "inserted $username $email $encrypted";
		$stmt->close();

	}
}
?>
 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
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
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
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