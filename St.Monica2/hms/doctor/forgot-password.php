<?php
session_start();
error_reporting(0);
include("include/config.php");
//Checking Details for reset password
if(isset($_POST['submit'])){
$contactno=$_POST['contactno'];
$email=$_POST['email'];
$query=mysqli_query($con,"select id from  doctors where contactno='$contactno' and docEmail='$email'");
$row=mysqli_num_rows($query);
if($row>0){

$_SESSION['cnumber']=$contactno;
$_SESSION['email']=$email;
header('location:reset-password.php');
} else {
echo "<script>alert('Invalid details. Please try with valid details');</script>";
echo "<script>window.location.href ='forgot-password.php'</script>";


}

}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Password Recovery</title>
		
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
		<link rel="stylesheet" href="login.css">
	</head>
	<body class="login">
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<a href="index.php"><h2> Go Back</h2></a>
				</div>

				<div class="login-box text-center">
					<form class="form-login" method="post">
						<fieldset>
							<legend>
								Doctor Password Recovery
							</legend>
							<p>
								Please enter your  Contact number and Email to recover your password.<br />
					
							</p>

							<div class="user-box form-actions">
								<span class="input-icon">
									<input type="text" class="form-control" name="contactno" placeholder="Registred Contact Number">
									<i class="fa fa-lock"></i>
									 </span>
							</div>

							<div class="user-box">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" placeholder="Registred Email">
									<i class="fa fa-user"></i> </span>
							</div>

							<div class="form-actions">
							<a>
									<span></span>
									<span></span>
									<span></span>
									<span></span>
									<button type="submit" class="btn btn-primary pull-right" name="submit">
									Reset <i class="fa fa-arrow-circle-right"></i>
									</button>			
							</a>	
							</div>
							<div class="new-account">
								Already have an account? <br>
								<a href="index.php">
									Log-in
								</a>
							</div>
						</fieldset>
					</form>

					<div class="copyright">
					<span class="text-bold "> St.Monica Hospital</span>
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