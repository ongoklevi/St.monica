<?php
session_start();
error_reporting(0);
include('include/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>User| Dashboard</title>

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
                <h4 class="text-uppercase"><?php $query = mysqli_query($con, "select fullName from users where id='" . $_SESSION['id'] . "'");
                                            while ($row = mysqli_fetch_array($query)) {
                                                echo $row['fullName'];
                                            }  ?> </h4>
            </div>

            <div class="side-menu">
                <ul>
                    <li>
                        <a href="dashboard3.php" class="active" style="text-decoration: none;">
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
                        <a href="Book-appointment.php" style="text-decoration: none;">
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
                            <span class="btn btn-primary btn-lg">Logout</span>
                        </a>

                    </div>
                </div>
            </div>
        </header>


        <main>

            <div class="page-header">
                <h1>Dashboard</h1>
                <small>Home / Dashboard</small>
            </div>
            <div class="analytics">

                <div class="card text-center">
                    <div class="card-head">
                        <h2>My Profile</h2>
                    </div>

                    <div class="card-progress">
                        <small>click to update your profile</small>
                        <p class="links cl-effect-1"><br>
                            <button type="button" class="btn btn-outline-primary">
                                <a href="updateprofile.php" style="text-decoration: none;">
                                    Update Profile
                                </a>
                            </button>
                        </p>
                    </div>
                </div>

                <div class="card">
                    <div class="card-head">
                        <h2>My Appointments</h2>
                    </div>
                    <div class="card-progress">
                        <small>click to view your appointments</small>
                        <br><br>
                        <button type="button" class="btn btn-outline-primary">
                            <a href="appointment-history3.php" style="text-decoration: none;">
                                View Appointment History
                            </a>
                        </button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-head">
                        <h2>Book your Appointment</h2>
                    </div>
                    <div class="card-progress">
                        <small>click to Book an Appointment</small><br>
                        <button type="button" class="btn btn-outline-primary">
                            <a href="book-appointment.php" style="text-decoration: none;">
                                Book Appointment
                            </a>
                        </button>
                    </div>
                </div>
                <!-- start: FOOTER -->
                <?php include('include/footer.php'); ?>
                <!-- end: FOOTER -->

            </div>
    </div>


    </main>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>