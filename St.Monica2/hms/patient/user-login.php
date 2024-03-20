<?php
session_start();
error_reporting(0);
include("include/config.php");
if (isset($_POST['submit'])) {
	$puname = $_POST['username'];
	$ppwd = md5($_POST['password']);
	$ret = mysqli_query($con, "SELECT * FROM users WHERE email='$puname' and password='$ppwd'");
	$num = mysqli_fetch_array($ret);
	if ($num > 0) {
		$_SESSION['login'] = $_POST['username'];
		$_SESSION['id'] = $num['id'];
		$pid = $num['id'];
		$host = $_SERVER['HTTP_HOST'];
		$uip = $_SERVER['REMOTE_ADDR'];
		$status = 1;
		// For stroing log if user login successfull
		$log = mysqli_query($con, "insert into userlog(uid,username,userip,status) values('$pid','$puname','$uip','$status')");
		header("location:dashboard3.php");
	} else {
		// For stroing log if user login unsuccessfull
		$_SESSION['login'] = $_POST['username'];
		$uip = $_SERVER['REMOTE_ADDR'];
		$status = 0;
		mysqli_query($con, "insert into userlog(username,userip,status) values('$puname','$uip','$status')");
		$_SESSION['errmsg'] = "Invalid username or password";

		header("location:user-login.php");
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>User-Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="login.css">

</head>
</body>

<body class="login">
	<div class="">
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="logo margin-top-30">
				<a href="../../../St.Monica/index.php">
					<h2>Go Back </h2>
				</a>
			</div>

			<div class="login-box text-center">
				<form class="form-login" method="post">
					<fieldset>
						<h2>
							Sign in to your account
						</h2>
						<p>
							Please enter your name and password to log in.<br />
							<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg'] = ""; ?></span>
						</p>
						<div class="user-box">
							<span class="input-icon user-box ">
								<input type="text" class="form-control" name="username" placeholder="Username">
								<i class="fa fa-user"></i> </span>
						</div>
						<div class="user-box form-actions">
							<span class="input-icon">
								<input type="password" class="form-control password" name="password" placeholder="Password">
								<i class="fa fa-lock"></i>
							</span><a href="forgot-password.php">
								Forgot Password ?
							</a>
						</div>
						<div class="form-actions">
							<a>
								<span></span>
								<span></span>
								<span></span>
								<span></span>
								<button type="submit" class="btn btn-primary btn-lg loginbtn" name="submit">
									Login
								</button>
							</a>
						</div>
						<div class="new-account">
							Don't have an account yet?
							<a href="registration.php">
								Create an account
							</a>
						</div>
					</fieldset>
				</form>
				<br><br>

				<div class="copyright">

					</span><span class="text-bold "> St.Monica Hospital</span>.
				</div>

			</div>

		</div>
	</div>

	<script>
		jQuery(document).ready(function() {
			Main.init();
			Login.init();
		});
	</script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
<!-- end: BODY -->

</html>