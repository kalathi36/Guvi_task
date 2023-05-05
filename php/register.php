<?php
require_once "config.php";
require_once "session.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $fullname = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST["confirm_password"]);
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    if($query = $db->prepare("SELECT * FROM users WHERE email = ?")) {
        $error = '';
        // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
        $query->bind_param('s', $email);
        $query->execute();
        // Store the result so we can check if the account exists in the database.
        $query->store_result();
        if ($query->num_rows > 0) {
            $error .= '<p class="error">The email address is already registered!</p>';
        } else {
            // Validate password
            if (strlen($password ) < 6) {
                $error .= '<p class="error">Password must have atleast 6 characters.</p>';
            }
            // Validate confirm password
            if (empty($confirm_password)) {
                $error .= '<p class="error">Please enter confirm password.</p>';
            } else {
                if (empty($error) && ($password != $confirm_password)) {
                    $error .= '<p class="error">Password did not match.</p>';
                }
            }
            if (empty($error) ) {
                $insertQuery = $db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?);");
                $insertQuery->bind_param("sss", $fullname, $email, $password_hash);
                $result = $insertQuery->execute();
                if ($result) {
                    $error .= '<p class="success">Your registration was successful!</p>';
                } else {
                    $error .= '<p class="error">Something went wrong!</p>';
                }
            }
        }
        $query->close();
        if (isset($insertQuery)) {
            $insertQuery->close();
        }
        // Close DB connection
        mysqli_close($db);
    }
}
?>

<html>
    <head>
        <title>Regsitration</title>
        <link rel="stylesheet" href="css/register.css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="container" id="login">
						<section id="inner-wrapper" class="login">
							<article>
								<form action="" method="post">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-user"> </i></span>
											<input type="text" name="name" placeholder="Name" class="form-control" required>					
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-envelope"> </i></span>
											<input type="text" name="email" placeholder="Email Address" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-key"> </i></span>
											<input type="password" name="password" placeholder="Password" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-key"> </i></span>
											<input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<input type="submit" name="submit" class="btn btn-primary" value="Submit">
									</div>
								</form>
							</article>
						</section></div>       
    </body>
</html>

