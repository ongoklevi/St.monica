<?php
session_start();
error_reporting(0);
include('include/config.php');
if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$sql = mysqli_query($con, "Update users set email='$email' where id='" . $_SESSION['id'] . "'");
	if ($sql) {
		$msg = "Your email updated Successfully";
		header("location:updateprofile.php");
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>User | Edit Profile</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="login.css">


</head>

<body>
	<div class="">
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="logo margin-top-30">
				<a href="updateprofile.php">
					<h2>Go Back </h2>
				</a>
			</div>

			<!-- end: PAGE TITLE -->
			<!-- start: BASIC EXAMPLE -->
			<div class="login-box text-center">
				<div class="row">
					<div class="col-md-12">
						<h5 style="color: green; font-size:18px; ">
							<?php if ($msg) {
								echo htmlentities($msg);
							} ?> </h5>
						<div class="row margin-top-30">
							<div class="col-lg-8 col-md-12">
								<div class="panel panel-white">
									<div class="panel-heading">
										<h5 class="panel-title">Edit Profile</h5>
									</div>
									<div class="panel-body">
										<form name="registration" id="updatemail" method="post">
											<div class="form-group">
												<label for="fess">
													User Email
												</label>
												<input type="email" class="form-control" name="email" id="email" onBlur="userAvailability()" placeholder="Email" required>

												<span id="user-availability-status1" style="font-size:12px;"></span>
											</div>







											<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
												Update
											</button>
										</form>

									</div>
								</div>
							</div>

						</div>
					</div>
					<div class="col-lg-12 col-md-12">
						<div class="panel panel-white">


						</div>
					</div>
				</div>
			</div> <!-- start: FOOTER -->
			<?php include('include/footer.php'); ?>
			<!-- end: FOOTER -->

			<!-- end: BASIC EXAMPLE -->






			<!-- end: SELECT BOXES -->

		</div>
	</div>
	</div>

	<script>
		jQuery(document).ready(function() {
			Main.init();
			FormElements.init();
		});
	</script>
	<script>
		function userAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_availability.php",
				data: 'email=' + $("#email").val(),
				type: "POST",
				success: function(data) {
					$("#user-availability-status1").html(data);
					$("#loaderIcon").hide();
				},
				error: function() {}
			});
		}
	</script>

</body>

</html>