<?php
session_start();
//error_reporting(0);
include('include/config.php');

if (isset($_POST['submit'])) {
	$specilization = $_POST['Doctorspecialization'];
	$doctorid = $_POST['doctor'];
	$userid = $_SESSION['id'];
	$fees = $_POST['fees'];
	$appdate = $_POST['appdate'];
	$time = $_POST['apptime'];
	$userstatus = 1;
	$docstatus = 1;
	$query = mysqli_query($con, "insert into appointment(doctorSpecialization,doctorId,userId,consultancyFees,appointmentDate,appointmentTime,userStatus,doctorStatus) values('$specilization','$doctorid','$userid','$fees','$appdate','$time','$userstatus','$docstatus')");
	if ($query) {
		echo "<script>alert('Your appointment successfully booked');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<title>Book | Appointment</title>
	<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
	<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">

	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

	<link rel="stylesheet" href="dashboard3.css">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="icon">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


	<script>
		function getdoctor(val) {
			$.ajax({
				type: "POST",
				url: "get_doctor.php",
				data: 'specilizationid=' + val,
				success: function(data) {
					$("#doctor").html(data);
				}
			});
		}
	</script>


	<script>
		function getfee(val) {
			$.ajax({
				type: "POST",
				url: "get_doctor.php",
				data: 'doctor=' + val,
				success: function(data) {
					$("#fees").html(data);
				}
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
				<h4 class="text-uppercase"><?php $query = mysqli_query($con, "select fullName from users where id='" . $_SESSION['id'] . "'");
											while ($row = mysqli_fetch_array($query)) {
												echo $row['fullName'];
											}  ?> </h4>
			</div>
			<div class="side-menu">
				<ul>
					<li>
						<a href="dashboard3.php" style="text-decoration: none;">
							<span class="las la-home"></span>
							<small>Dashboard</small>
						</a>
					</li>
					<li>
						<a href="updateprofile.php" style="text-decoration: none;">
							<span class="las la-user-alt"></span>
							<small>Update Profile</small>
						</a>
					</li>
					<li>
						<a href="appointment-history3.php" style="text-decoration: none;">
							<span class="las la-clipboard-list"></span>
							<small>View Appointment History</small>
						</a>
					</li>
					<li>
						<a href="#" class="active" style="text-decoration: none;">
							<span class="las la-envelope"></span>
							<small>Book Appointment</small>
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
				<h1>Book Appointment</h1>
				<small>Home / book Appointment</small>
			</div>
			<!-- end: PAGE TITLE -->
			<!-- start: BASIC EXAMPLE -->
			<div class="container-fluid container-fullw bg-white text-center ">
				<div class="row">
					<div class="col-md-12">

						<div class="row margin-top-30">
							<div class="col-lg-8 col-md-12">
								<div class="panel panel-white">
									<div class="panel-heading">
										<h5 class="panel-title">Book Appointment</h5>
									</div>
									<div class="panel-body">
										<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']); ?>
											<?php echo htmlentities($_SESSION['msg1'] = ""); ?></p>
										<form role="form" name="book" method="post">


											<div class="form-group">
												<label for="DoctorSpecialization">
													Doctor Specialization
												</label>
												<hr />
												<select name="Doctorspecialization" class="form-control" onChange="getdoctor(this.value);" required="required">
													<option value=""><i>Select Specialization</i></option>
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
												<label for="doctor">
													Doctors
												</label>
												<select name="doctor" class="form-control" id="doctor" onChange="getfee(this.value);" required="required">
													<option value="">Select Doctor</option>
												</select>
											</div>





											<div class="form-group">
												<label for="consultancyfees">
													Consultancy Fees
												</label>
												<select name="fees" class="form-control" id="fees" readonly>

												</select>
											</div>

											<div class="form-group">
												<label for="AppointmentDate">
													Date
												</label>
												<input class="form-control datepicker" name="appdate" required="required" data-date-format="yyyy-mm-dd">

											</div>

											<div class="form-group">
												<label for="Appointmenttime">

													Time

												</label>
												<input class="form-control" name="apptime" id="timepicker1" required="required">eg : 10:00 PM
											</div>

											<button type="submit" name="submit" class="btn btn-o btn-primary">
												Submit
											</button>
										</form>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>

			<!-- end: BASIC EXAMPLE -->


			<!-- start: FOOTER -->
			<?php include('include/footer.php'); ?>
			<!-- end: FOOTER -->



			<!-- end: SELECT BOXES -->

	</div>
	</div>

	</div>


	<!-- start: SETTINGS -->
	<?php include('include/setting.php'); ?>
	<!-- end: SETTINGS -->
	</div>
	<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
	<script>
		jQuery(document).ready(function() {
			Main.init();
			FormElements.init();
		});

		$('.datepicker').datepicker({
			format: 'yyyy-mm-dd',
			startDate: '-3d'
		});
	</script>
	<script type="text/javascript">
		$('#timepicker1').timepicker();
	</script>
	<!-- end: JavaScript Event Handlers for this page -->
	<!-- end: CLIP-TWO JAVASCRIPTS -->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</body>

</html>