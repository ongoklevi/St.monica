<?php
session_start();
error_reporting(0);
include('include/config.php');
if (strlen($_SESSION['id'] == 0)) {
  header('location:logout.php');
} else {
  if (isset($_POST['submit'])) {

    $vid = $_GET['viewid'];
    $bp = $_POST['bp'];
    $bs = $_POST['bs'];
    $weight = $_POST['weight'];
    $temp = $_POST['temp'];
    $pres = $_POST['pres'];


    $query .= mysqli_query($con, "insert   tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres)value('$vid','$bp','$bs','$weight','$temp','$pres')");
    if ($query) {
      echo '<script>alert("Medicle history has been added.")</script>';
      echo "<script>window.location.href ='manage-patient.php'</script>";
    } else {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
  }

?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title>Doctor | Manage Patients</title>
    
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/css/styles.css">
   

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">


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
              <a href="#" class="active" style="text-decoration: none;">
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
          <h1>Appointment History</h1>
          <small>Home / Appointment History</small>
        </div>
        </section>
        <div class="container-fluid container-fullw bg-white">
          <div class="row">
            <div class="col-md-12">
              <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Patients</span></h5>
              <?php
              $vid = $_GET['viewid'];
              $ret = mysqli_query($con, "select * from tblpatient where ID='$vid'");
              $cnt = 1;
              while ($row = mysqli_fetch_array($ret)) {
              ?>
                <table border="1" class="table table-bordered">
                  <tr align="center">
                    <td colspan="4" style="font-size:20px;color:blue">
                      Patient Details</td>
                  </tr>

                  <tr>
                    <th scope>Patient Name</th>
                    <td><?php echo $row['PatientName']; ?></td>
                    <th scope>Patient Email</th>
                    <td><?php echo $row['PatientEmail']; ?></td>
                  </tr>
                  <tr>
                    <th scope>Patient Mobile Number</th>
                    <td><?php echo $row['PatientContno']; ?></td>
                    <th>Patient Address</th>
                    <td><?php echo $row['PatientAdd']; ?></td>
                  </tr>
                  <tr>
                    <th>Patient Gender</th>
                    <td><?php echo $row['PatientGender']; ?></td>
                    <th>Patient Age</th>
                    <td><?php echo $row['PatientAge']; ?></td>
                  </tr>
                  <tr>

                    <th>Patient Medical History(if any)</th>
                    <td><?php echo $row['PatientMedhis']; ?></td>
                    <th>Patient Reg Date</th>
                    <td><?php echo $row['CreationDate']; ?></td>
                  </tr>

                <?php } ?>
                </table>
                <?php

                $ret = mysqli_query($con, "select * from tblmedicalhistory  where PatientID='$vid'");



                ?>
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                  <tr align="center">
                    <th colspan="8">Medical History</th>
                  </tr>
                  <tr>
                    <th>#</th>
                    <th>Blood Pressure</th>
                    <th>Weight</th>
                    <th>Blood Sugar</th>
                    <th>Body Temprature</th>
                    <th>Medical Prescription</th>
                    <th>Visit Date</th>
                  </tr>
                  <?php
                  while ($row = mysqli_fetch_array($ret)) {
                  ?>
                    <tr>
                      <td><?php echo $cnt; ?></td>
                      <td><?php echo $row['BloodPressure']; ?></td>
                      <td><?php echo $row['Weight']; ?></td>
                      <td><?php echo $row['BloodSugar']; ?></td>
                      <td><?php echo $row['Temperature']; ?></td>
                      <td><?php echo $row['MedicalPres']; ?></td>
                      <td><?php echo $row['CreationDate']; ?></td>
                    </tr>
                  <?php $cnt = $cnt + 1;
                  } ?>
                </table>

                <p align="center">
                  <button class="btn btn-primary waves-effect waves-light w-lg" data-toggle="modal" data-target="#myModal">Add Medical History</button>
                </p>

                <?php  ?>
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Medical History</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <table class="table table-bordered table-hover data-tables">

                          <form method="post" name="submit">

                            <tr>
                              <th>Blood Pressure :</th>
                              <td>
                                <input name="bp" placeholder="Blood Pressure" class="form-control wd-450" required="true">
                              </td>
                            </tr>
                            <tr>
                              <th>Blood Sugar :</th>
                              <td>
                                <input name="bs" placeholder="Blood Sugar" class="form-control wd-450" required="true">
                              </td>
                            </tr>
                            <tr>
                              <th>Weight :</th>
                              <td>
                                <input name="weight" placeholder="Weight" class="form-control wd-450" required="true">
                              </td>
                            </tr>
                            <tr>
                              <th>Body Temprature :</th>
                              <td>
                                <input name="temp" placeholder="Blood Sugar" class="form-control wd-450" required="true">
                              </td>
                            </tr>

                            <tr>
                              <th>Prescription :</th>
                              <td>
                                <textarea name="pres" placeholder="Medical Prescription" rows="12" cols="14" class="form-control wd-450" required="true"></textarea>
                              </td>
                            </tr>

                        </table>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>

                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div> <!-- start: FOOTER -->
    <?php include('include/footer.php'); ?>
    <!-- end: FOOTER -->
        </div>
    </div>
   

    <!-- start: SETTINGS -->
    <?php include('include/setting.php'); ?>

    <!-- end: SETTINGS -->
    </div>
    <!-- start: MAIN JAVASCRIPTS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

   <!-- end: MAIN JAVASCRIPTS -->
   
    <!-- start: CLIP-TWO JAVASCRIPTS -->
    <script src="assets/js/main.js"></script>
    <!-- start: JavaScript Event Handlers for this page -->
    <script src="assets/js/form-elements.js"></script>
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
<?php }  ?>