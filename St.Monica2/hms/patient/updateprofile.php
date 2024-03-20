<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];

    $sql = mysqli_query($con, "Update users set fullName='$fname',address='$address',city='$city',gender='$gender' where id='" . $_SESSION['id'] . "'");
    if ($sql) {
        $msg = "Your Profile updated Successfully";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>User | Update profile</title>

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
                        <a href="dashboard3.php" style="text-decoration: none;">
                            <span class="las la-home"></span>
                            <small>Dashboard</small>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="active" style="text-decoration: none;">
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
                        <a href="book-appointment.php" style="text-decoration: none;">
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
                <h1>Update Profile</h1>
                <small>Home / Update profile</small>
            </div>
            <!-- start: BASIC EXAMPLE -->
            <div class="container-fluid container-fullw bg-white text-center">
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
                                        <?php
                                        $sql = mysqli_query($con, "select * from users where id='" . $_SESSION['id'] . "'");
                                        while ($data = mysqli_fetch_array($sql)) {
                                        ?>
                                            <h4><?php echo htmlentities($data['fullName']); ?>'s Profile</h4>
                                            <p><b>Profile Reg. Date: </b><?php echo htmlentities($data['regDate']); ?></p>
                                            <?php if ($data['updationDate']) { ?>
                                                <p><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']); ?></p>
                                            <?php } ?>
                                            <hr />
                                            <form role="form" name="edit" method="post">


                                                <div class="form-group">
                                                    <label for="fname">
                                                        User Name
                                                    </label>
                                                    <input type="text" name="fname" class="form-control" value="<?php echo htmlentities($data['fullName']); ?>">
                                                </div>


                                                <div class="form-group">
                                                    <label for="address">
                                                        Address
                                                    </label>
                                                    <textarea name="address" class="form-control"><?php echo htmlentities($data['address']); ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="city">
                                                        City
                                                    </label>
                                                    <input type="text" name="city" class="form-control" required="required" value="<?php echo htmlentities($data['city']); ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="gender">
                                                        Gender
                                                    </label>

                                                    <select name="gender" class="form-control" required="required">
                                                        <option value="<?php echo htmlentities($data['gender']); ?>"><?php echo htmlentities($data['gender']); ?></option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="other">Other</option>
                                                    </select>

                                                </div>

                                                <div class="form-group">
                                                    <label for="fess">
                                                        User Email
                                                    </label>
                                                    <input type="email" name="uemail" class="form-control" readonly="readonly" value="<?php echo htmlentities($data['email']); ?>">
                                                    <a href="change-emaild.php">Update your email id</a>
                                                </div>







                                                <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                    Update
                                                </button>
                                            </form>
                                        <?php } ?>
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

            <!-- end: BASIC EXAMPLE -->

            <!-- start: FOOTER -->
            <?php include('include/footer.php'); ?>
            <!-- end: FOOTER -->



    </div>


    </main>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>