<?php
session_start();
error_reporting(0);
include('include/config.php');
if (strlen($_SESSION['id'] == 0)) {
	header('location:logout.php');
} else {


?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Admin | Dashboard</title>

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

				<div class="analytics">
					<div class="card">
						<div class="card-head">
							<h2>Manage users</h2>
						</div>
						<div class="card-progress">
							<small>click to manage users</small>
							<p class="cl-effect-1">
								<a href=" manage-users.php">
									<?php $result1 = mysqli_query($con, "SELECT * FROM users ");
									$num_rows1 = mysqli_num_rows($result1); {
									?>
										Total Users :<?php echo htmlentities($num_rows1);
													} ?>
								</a>

							</p>
						</div>
					</div>
					<div class="card">
						<div class="card-head">
							<h2>Manage Doctors</h2>
						</div>
						<div class="card-progress">
							<small>click to manage users</small>
							<p class="cl-effect-1">
								<a href="manage-doctors.php">
									<?php $result1 = mysqli_query($con, "SELECT * FROM doctors ");
									$num_rows1 = mysqli_num_rows($result1); {
									?>
										Total Doctors :<?php echo htmlentities($num_rows1);
													} ?>
								</a>

							</p>
						</div>
					</div>
					<div class="card">
						<div class="card-head">
							<h2>Appointments</h2>
						</div>
						<div class="card-progress">
							<small>click to view Appointments</small>
							<p class="links cl-effect-1">
								<a href="book-appointment.php">
									<a href="appointment-history.php">
										<?php $sql = mysqli_query($con, "SELECT * FROM appointment");
										$num_rows2 = mysqli_num_rows($sql); {
										?>
											Total Appointments :<?php echo htmlentities($num_rows2);
															} ?>
									</a>
								</a>
							</p>
						</div>
					</div>
					<div class="card">
						<div class="card-head">
							<h2>Total Patients</h2>
						</div>
						<div class="card-progress">
							<small>click to view Total Patients</small>
							<p class="links cl-effect-1">
								<a href="manage-patient.php">
									<?php $result = mysqli_query($con, "SELECT * FROM tblpatient ");
									$num_rows = mysqli_num_rows($result); {
									?>
										Total Patients :<?php echo htmlentities($num_rows);
													} ?>
								</a>
							</p>
						</div>
					</div>
				</div>
				<!-- start: FOOTER -->
				<?php include('include/footer.php'); ?>
				<!-- end: FOOTER -->
			</main>
		</div>

		<!--</div>
		<!-- end: SELECT BOXES -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>




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