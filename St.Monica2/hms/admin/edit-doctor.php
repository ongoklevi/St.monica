<?php
session_start();
error_reporting(0);
include('include/config.php');
if (strlen($_SESSION['id'] == 0)) {
	header('location:logout.php');
} else {

	$did = intval($_GET['id']); // get doctor id
	if (isset($_POST['submit'])) {
		$docspecialization = $_POST['Doctorspecialization'];
		$docname = $_POST['docname'];
		$docaddress = $_POST['clinicaddress'];
		$docfees = $_POST['docfees'];
		$doccontactno = $_POST['doccontact'];
		$docemail = $_POST['docemail'];
		$sql = mysqli_query($con, "Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno',docEmail='$docemail' where id='$did'");
		if ($sql) {
			$msg = "Doctor Details updated Successfully";
		}
	}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Admin | Edit Doctor Details</title>
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
					<h4 class="text-uppercase"><?php $query = mysqli_query($con, "select username from admin where id='" . $_SESSION['id'] . "'");
												while ($row = mysqli_fetch_array($query)) {
													echo $row['username'];
												}
												?></h4>
				</div>

				<div class="side-menu">
					<ul>
						<li>
							<a href="#" class="active" style="text-decoration: none;">
								<span class="las la-home"></span>
								<small>Dashboard</small>
							</a>
						</li>
						<li>
							<a href="manage-users.php" style="text-decoration: none;">
								<span class="las la-user-alt"></span>
								<small>Manage users</small>
							</a>
						</li>

						<li>
							<a href="Manage-doctors.php" style="text-decoration: none;">
								<span class="las la-user-alt"></span>
								<small>Manage Doctors</small>
							</a>
						</li>
						<li>
							<a href="add-doctor.php" style="text-decoration: none;">
								<span class="las la-user-alt"></span>
								<small>Add Doctor</small>
							</a>
						</li>
						<li>
							<a href="appointment-history.php" style="text-decoration: none;">
								<span class="las la-clipboard-list"></span>
								<small>View Appointment History</small>
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
					<h1>Appointment History</h1>
					<small>Home / Appointment History</small>
				</div>
				<!-- end: PAGE TITLE -->
				<!-- start: BASIC EXAMPLE -->
				<div class="container-fluid container-fullw bg-white">
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
											<h5 class="panel-title">Edit Doctor info</h5>
										</div>
										<div class="panel-body">
											<?php $sql = mysqli_query($con, "select * from doctors where id='$did'");
											while ($data = mysqli_fetch_array($sql)) {
											?>
												<h4><b class="text-uppercase"><?php echo htmlentities($data['doctorName']); ?>'s</b> Profile</h4>
												<p><b>Profile Reg. Date: </b><?php echo htmlentities($data['creationDate']); ?></p>
												<?php if ($data['updationDate']) { ?>
													<p><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']); ?></p>
												<?php } ?>
												<hr />
												<form role="form" name="adddoc" method="post" onSubmit="return valid();">
													<div class="form-group">
														<label for="DoctorSpecialization">
															<b>Doctor Specialization</b>
														</label>
														<select name="Doctorspecialization" class="form-control" required="required">
															<option value="<?php echo htmlentities($data['specilization']); ?>">
																<?php echo htmlentities($data['specilization']); ?></option>
															<?php $ret = mysqli_query($con, "select * from doctorspecilization");
															while ($row = mysqli_fetch_array($ret)) {
															?>
																<option value="<?php echo htmlentities($row['specilization']); ?>">
																	<?php echo htmlentities($row['specilization']); ?>
																</option>
															<?php } ?>

														</select>
													</div>

													<div class="form-group">
														<label for="doctorname">
															<b>Doctor Name</b>
														</label>
														<input type="text" name="docname" class="form-control" value="<?php echo htmlentities($data['doctorName']); ?>">
													</div>


													<div class="form-group">
														<label for="address">
															<b>Doctor Clinic Address</b>
														</label>
														<textarea name="clinicaddress" class="form-control"><?php echo htmlentities($data['address']); ?></textarea>
													</div>
													<div class="form-group">
														<label for="fess">
															<b>Doctor Consultancy Fees</b>
														</label>
														<input type="text" name="docfees" class="form-control" required="required" value="<?php echo htmlentities($data['docFees']); ?>">
													</div>

													<div class="form-group">
														<label for="fess">
															<b>Doctor Contact no</b>
														</label>
														<input type="text" name="doccontact" class="form-control" required="required" value="<?php echo htmlentities($data['contactno']); ?>">
													</div>

													<div class="form-group">
														<label for="fess">
															<b>Doctor Email</b>
														</label>
														<input type="email" name="docemail" class="form-control" readonly="readonly" value="<?php echo htmlentities($data['docEmail']); ?>">
													</div>




												<?php } ?>


												<button type="submit" name="submit" class="btn btn-o btn-primary">
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
				</div><!-- start: FOOTER -->
				<?php include('include/footer.php'); ?>
				<!-- end: FOOTER -->
			</main>
		</div>
		</div>
		</div>
		<!-- end: BASIC EXAMPLE -->






		<!-- end: SELECT BOXES -->

		</div>
		</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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