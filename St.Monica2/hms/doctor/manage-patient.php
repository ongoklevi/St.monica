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
		<title>Doctor | Manage Patients</title>
		<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-wycFvLR2pjNDKtu53bgA4zGtTJ2D3vROfYUXvSzvePsYxfyLGnTYJ48z7hPJhLP1IpH2hiGQxt41i33J2j/+QQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


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
							<a href="#" class="active" style="text-decoration: none;">
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
					<h1>Manage Patient</h1>
					<small>Home / manage patient</small>
				</div>
				<div id="app">
					</section>
					<div class="container-fluid container-fullw bg-white">
						<div class="row">
							<div class="col-md-12">
								<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patients</span></h5>

								<table class="table table-hover" id="sample-table-1">
									<thead>
										<tr>
											<th class="center">#</th>
											<th><b>Patient Name</b></th>
											<th><b>Patient Contact Number</b></th>
											<th><b>Patient Gender</b> </th>
											<th><b>Creation Date </b></th>
											<th><b>Updation Date</b> </th>
											<th><b>Action</b></th>
										</tr>
									</thead>
									<tbody>
										<?php
										$docid = $_SESSION['id'];
										$sql = mysqli_query($con, "select * from tblpatient where Docid='$docid' ");
										$cnt = 1;
										while ($row = mysqli_fetch_array($sql)) {
										?>
											<tr>
												<td class="center"><?php echo $cnt; ?>.</td>
												<td class="hidden-xs"><?php echo $row['PatientName']; ?></td>
												<td><?php echo $row['PatientContno']; ?></td>
												<td><?php echo $row['PatientGender']; ?></td>
												<td><?php echo $row['CreationDate']; ?></td>
												<td><?php echo $row['UpdationDate']; ?>
												</td>
												<td>

													<a href="edit-patient.php?editid=<?php echo $row['ID']; ?>"><i class="fa fa-edit">edit</i></a> || <a href="view-patient.php?viewid=<?php echo $row['ID']; ?>"><i class="fa fa-eye">view</i></a>

												</td>
											</tr>
										<?php
											$cnt = $cnt + 1;
										} ?>
									</tbody>
								</table>
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