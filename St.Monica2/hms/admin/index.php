<?php
session_start();
error_reporting(0);
include("include/config.php");
if (isset($_POST['submit'])) {
	$uname = $_POST['username'];
	$upassword = $_POST['password'];

	$ret = mysqli_query($con, "SELECT * FROM admin WHERE username='$uname' and password='$upassword'");
	$num = mysqli_fetch_array($ret);
	if ($num > 0) {
		$_SESSION['login'] = $_POST['username'];
		$_SESSION['id'] = $num['id'];
		header("location:dashboard.php");
	} else {
		$_SESSION['errmsg'] = "Invalid username or password";
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Admin-Login</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="login.css">
</head>

<body class="login">
	<div class="row">
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="logo margin-top-30">
				<a href="../../../St.Monica/index.php">
					<h2>Go Back </h2>
				</a>
			</div>

			<div class="login-box text-center">
				<form class="form-login" method="post">
					<fieldset>
						<legend>
							Sign in to your account
						</legend>
						<p>
							Please enter your name and password to log in.<br />
							<span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg'] = ""); ?></span>
						</p>
						<div class="user-box">
							<span class="input-icon">
								<input type="text" class="form-control" name="username" placeholder="Username">
								<i class="fa fa-user"></i> </span>
						</div>
						<div class="user-box form-actions">
							<span class="input-icon">
								<input type="password" class="form-control password" name="password" placeholder="Password"><i class="fa fa-lock"></i>
							</span>
						</div>
						<div class="form-actions">
							<a>
								<span></span>
								<span></span>
								<span></span>
								<span></span>
								<button type="submit" class="btn btn-primary loginbtn" name="submit">
									Login <i class="fa fa-arrow-circle-right"></i>
								</button>
							</a>


						</div>
						<a href="../../../St.Monica/index.php">Backto Home Page</a>

					</fieldset>
				</form>

				<div class="copyright">
					<span class="text-bold text-uppercase">St.Monica Hospital</span>
				</div>

			</div>

		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


	<script>
		jQuery(document).ready(function() {
			Main.init();
			Login.init();
		});
	</script>

</body>
<!-- end: BODY -->

</html>