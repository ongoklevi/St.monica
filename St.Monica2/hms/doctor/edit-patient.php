<?php
session_start();
error_reporting(0);
include('include/config.php');
if (strlen($_SESSION['id'] == 0)) {
	header('location:logout.php');
} else {

	if (isset($_POST['submit'])) {
		$eid = $_GET['editid'];
		$patname = $_POST['patname'];
		$patcontact = $_POST['patcontact'];
		$patemail = $_POST['patemail'];
		$gender = $_POST['gender'];
		$pataddress = $_POST['pataddress'];
		$patage = $_POST['patage'];
		$medhis = $_POST['medhis'];
		$sql = mysqli_query($con, "update tblpatient set PatientName='$patname',PatientContno='$patcontact',PatientEmail='$patemail',PatientGender='$gender',PatientAdd='$pataddress',PatientAge='$patage',PatientMedhis='$medhis' where ID='$eid'");
		if ($sql) {
			echo "<script>alert('Patient info updated Successfully');</script>";
			header('location:manage-patient.php');
		}
	}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Doctor | edit Patient</title>
		<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

		<link rel="stylesheet" href="dashboard3.css">



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
							<a href="add-patient.php" style="text-decoration: none;">
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
					<h1>Edit patient</h1>
					<small>Home / Edit Patient</small>
				</div>
				<!-- start: BASIC EXAMPLE -->
				<div class="container-fluid container-fullw bg-white">
					<div class="row">
						<div class="col-md-12">
							<div class="row margin-top-30">
								<div class="col-lg-8 col-md-12">
									<div class="panel panel-white">
										<div class="panel-heading">
											<h5 class="panel-title">Edit Patient Details</h5>
										</div>
										<div class="panel-body">
											<form role="form" name="" method="post">
												<?php
												$eid = $_GET['editid'];
												$ret = mysqli_query($con, "select * from tblpatient where ID='$eid'");
												$cnt = 1;
												while ($row = mysqli_fetch_array($ret)) {

												?>
													<div class="form-group">
														<label for="doctorname">
															<b>Patient Name</b>
														</label>
														<input type="text" name="patname" class="form-control" value="<?php echo $row['PatientName']; ?>" required="true">
													</div>
													<div class="form-group">
														<label for="fess">
															<b>Patient Contact no</b>
														</label>
														<input type="text" name="patcontact" class="form-control" value="<?php echo $row['PatientContno']; ?>" required="true" maxlength="10" pattern="[0-9]+">
													</div>
													<div class="form-group">
														<label for="fess">
															<b>Patient Email</b>
														</label>
														<input type="email" id="patemail" name="patemail" class="form-control" value="<?php echo $row['PatientEmail']; ?>" readonly='true'>
														<span id="email-availability-status"></span>
													</div>
													<div class="form-group">
														<label class="control-label"><b>Gender:</b> </label><br>
														<?php if ($row['Gender'] == "Female") { ?>
															<input type="radio" name="gender" id="gender" value="Female" checked="true">Female
															<input type="radio" name="gender" id="gender" value="male">Male
														<?php } else { ?>
															<label>
																<input type="radio" name="gender" id="gender" value="Male" checked="true">Male
																<input type="radio" name="gender" id="gender" value="Female">Female
															</label>
														<?php } ?>
													</div><br>
													<div class="form-group">
														<label for="address">
															<b>Patient Address</b>
														</label>
														<textarea name="pataddress" class="form-control" required="true"><?php echo $row['PatientAdd']; ?></textarea>
													</div>
													<div class="form-group">
														<label for="fess">
															<b>Patient Age</b>
														</label>
														<input type="text" name="patage" class="form-control" value="<?php echo $row['PatientAge']; ?>" required="true">
													</div>
													<div class="form-group">
														<label for="fess">
															<b>Medical History</b>
														</label>
														<textarea type="text" name="medhis" class="form-control" placeholder="Enter Patient Medical History(if any)" required="true"><?php echo $row['PatientMedhis']; ?></textarea>
													</div>
													<div class="form-group">
														<label for="fess">
															<b>Creation Date</b>
														</label>
														<input type="text" class="form-control" value="<?php echo $row['CreationDate']; ?>" readonly='true'>
													</div>
												<?php } ?>
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
		</div>
		</div>
		</div>
		</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-f7OyTqX3cT3W6jVHzq+Q6JgqXzR2O8G9Xl5nQj1RyyKj2lNQv1hY5t5xuQ9l9vYr" crossorigin="anonymous"></script>


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