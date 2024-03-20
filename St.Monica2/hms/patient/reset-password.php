<?php
session_start();
//error_reporting(0);
include("include/config.php");
// Code for updating Password
if(isset($_POST['change']))
{
$name=$_SESSION['name'];
$email=$_SESSION['email'];
$newpassword=md5($_POST['password']);
$query=mysqli_query($con,"update users set password='$newpassword' where fullName='$name' and email='$email'");
if ($query) {
echo "<script>alert('Password successfully updated.');</script>";
echo "<script>window.location.href ='user-login.php'</script>";
}

}


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Password Reset</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link rel="stylesheet" href="login.css">


				<script type="text/javascript">
function valid()
{
 if(document.passwordreset.password.value!= document.passwordreset.password_again.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.passwordreset.password_again.focus();
return false;
}
return true;
}
</script>
	</head>
	<body class="login">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="../index.php"><h2> Go Back</h2></a>
				</div>

				<div class="login-box text-center">
					<form class="form-login" name="passwordreset" method="post" onSubmit="return valid();">
						<fieldset>
							<h2>
								Patient Reset Password
							</h2>
							<p>
								Please set your new password.<br />
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>

							<div class="user-box">
							<span class="input-icon">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
							<i class="fa fa-lock"></i> </span>
							</div>
								

							<div class="user-box">
							<span class="input-icon">
							<input type="password" class="form-control"  id="password_again" name="password_again" placeholder="Password Again" required>
							<i class="fa fa-lock"></i> </span>
							</div>
							

							<div class="form-actions">
							<a>
									<span></span>
									<span></span>
									<span></span>
									<span></span>
									<button type="submit" class="btn btn-primary loginbtn" name="change">
									Reset <i class="fa fa-arrow-circle-right"></i>
								</button>
							</a>					
							</div>
							<div class="new-account">
								Already have an account? <br>
								<a href="user-login.php">
									Log-in
								</a>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
						&copy; <span class="text-bold "> St.Monica Hospital</span>
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