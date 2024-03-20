<?php
session_start();
error_reporting(0);
include('include/config.php');
if (strlen($_SESSION['id'] == 0)) {
	header('location:logout.php');
} else {

	if (isset($_POST['submit'])) {
		$docid = $_SESSION['id'];
		$patname = $_POST['patname'];
		$patcontact = $_POST['patcontact'];
		$patemail = $_POST['patemail'];
		$gender = $_POST['gender'];
		$pataddress = $_POST['pataddress'];
		$patage = $_POST['patage'];
		$medhis = $_POST['medhis'];
		$sql = mysqli_query($con, "insert into tblpatient(Docid,PatientName,PatientContno,PatientEmail,PatientGender,PatientAdd,PatientAge,PatientMedhis) values('$docid','$patname','$patcontact','$patemail','$gender','$pataddress','$patage','$medhis')");
		if ($sql) {
			echo "<script>alert('Patient info added Successfully');</script>";
			header('location:add-patient.php');
		}
	}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Doctor | Add Patient</title>

		<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-wycFvLR2pjNDKtu53bgA4zGtTJ2D3vROfYUXvSzvePsYxfyLGnTYJ48z7hPJhLP1IpH2hiGQxt41i33J2j/+QQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


		<link rel="stylesheet" href="dashboard3.css">

		<script>
			function userAvailability() {
				$("#loaderIcon").show();
				jQuery.ajax({
					url: "check_availability.php",
					data: 'email=' + $("#patemail").val(),
					type: "POST",
					success: function(data) {
						$("#user-availability-status1").html(data);
						$("#loaderIcon").hide();
					},
					error: function() {}
				});
			}
		</script>
	</head>

	<body>
		<?php error_reporting(0); ?>
		<input type="checkbox" id="menu-toggle">
		<div class="sidebar">
			<div class="side-header">
				<h3>St.<span>Monica</span></h3>
			</div>

			<div class="side-content">

				<div class="profile">
					<div class="profile-img bg-img" style="background-image: url('profilepic2.png');"></div>
					<h4 class="text-uppercase"><?php $query = mysqli_query($con, "select doctorName from doctors where id='" . $_SESSION['id'] . "'");
												while ($row = mysqli_fetch_array($query)) {
													echo $row['doctorName'];
												}
												?></h4>
				</div>

				<div class="side-menu">
					<ul>
						<li>
							<a href="dashboard.php" style="text-decoration: none;">
								<span class="las la-home"></span>
								<small>Dashboard</small>
							</a>
						</li>
						<li>
							<a href="edit-profile.php" style="text-decoration: none;">
								<span class="las la-home"></span>
								<small>Profile</small>
							</a>
						</li>
						<li>
							<a href="appointment-history.php" style="text-decoration: none;">
								<span class="las la-clipboard-list"></span>
								<small>View Appointment History</small>
							</a>
						</li>
						<li>
							<a href="manage-patient.php" style="text-decoration: none;">
								<span class="las la-user-alt"></span>
								<small>Manage Patient</small>
							</a>
						</li>

						<li>
							<a href="#" class="active" style="text-decoration: none;">
								<span class="las la-envelope"></span>
								<small>Add Patient</small>
							</a>
						</li>

					</ul>
				</div>
			</div>
		</div>

		<div class="main-content">


			<header>
				<div class="header-content">
					<label for="menu-toggle">
						<span class="las la-bars"></span>
					</label>

					<div class="header-menu">
						<label for="">
							<span class="las la-search"></span>
						</label>

						<div class="notify-icon">
							<span class="las la-envelope"></span>
							<span class="notify">4</span>
						</div>

						<div class="notify-icon">
							<span class="las la-bell"></span>
							<span class="notify">3</span>
						</div>

						<div class="user">
							<div class="bg-img" style="background-image: url(img/1.jpeg)"></div>

							<span class="las la-power-off"></span>
							<a href="logout.php">
								<span class="btn btn-primary">Logout</span>
							</a>

						</div>
					</div>
				</div>
			</header>


			<main>

				<div class="page-header">
					<h1>Add Patient</h1>
					<small>Home /Add patient</small>
				</div>

				</section>
				<div class="container-fluid container-fullw bg-white">
					<div class="row">
						<div class="col-md-12">
							<div class="row margin-top-30">
								<div class="col-lg-8 col-md-12">
									<div class="panel panel-white">
										<div class="panel-heading">
											<h4 class="panel-title">Add Patient</h4>
										</div>
										<div class="panel-body">
											<form role="form" name="" method="post">

												<div class="form-group">
													<label for="doctorname">
														<b>Patient Name</b>
													</label>
													<input type="text" name="patname" class="form-control" placeholder="Enter Patient Name" required="true">
												</div>
												<div class="form-group">
													<label for="fess">
														<b>Patient Contact no</b>
													</label>
													<input type="text" name="patcontact" class="form-control" placeholder="Enter Patient Contact no" required="true" maxlength="10" pattern="[0-9]+">
												</div>
												<div class="form-group">
													<label for="fess">
														<b>Patient Email</b>
													</label>
													<input type="email" id="patemail" name="patemail" class="form-control" placeholder="Enter Patient Email id" required="true" onBlur="userAvailability()">
													<span id="user-availability-status1" style="font-size:12px;"></span>
												</div>
												<div class="form-group">
													<label class="block">
														<b>Gender</b><br>
													</label>
													<div class="clip-radio radio-primary">
														<input type="radio" id="rg-female" name="gender" value="female">
														<label for="rg-female">
															Female
														</label>
														<input type="radio" id="rg-male" name="gender" value="male">
														<label for="rg-male">
															Male
														</label>
													</div>
												</div>
												<div class="form-group">
													<label for="address">
														<b>Patient Address</b>
													</label>
													<textarea name="pataddress" class="form-control" placeholder="Enter Patient Address" required="true"></textarea>
												</div>
												<div class="form-group">
													<label for="fess">
														<b>Patient Age</b>
													</label>
													<input type="text" name="patage" class="form-control" placeholder="Enter Patient Age" required="true">
												</div>
												<div class="form-group">
													<label for="fess">
														<b>Medical History</b>
													</label>
													<textarea type="text" name="medhis" class="form-control" placeholder="Enter Patient Medical History(if any)" required="true"></textarea>
												</div>

												<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
													<b>Add</b>
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
				</div>
				<!-- start: FOOTER -->
				<?php include('include/footer.php'); ?>
				<!-- end: FOOTER -->
		</div>
		</div>
		</div>
		</div>
		</div>

		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>

	</html>
<?php } ?>