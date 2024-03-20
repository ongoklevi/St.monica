<?php
session_start();
error_reporting(0);
include('include/config.php');
if (strlen($_SESSION['id']) == 0) {
    header('location:logout.php');
} else {
    if (isset($_GET['cancel'])) {
        mysqli_query($con, "UPDATE appointment SET userStatus='0' WHERE id='" . $_GET['id'] . "'");
        $_SESSION['msg'] = "Your appointment has been canceled!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>User | Appointment history</title>

    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="dashboard3.css">
</head>

<body>
    <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3>St.<span>Monica</span></h3>
        </div>

        <div class="side-content">
            <div class="profile">
                <div class="profile-img bg-img" style="background-image: url('profilepic2.png');"></div>
                <h4 class="text-uppercase">
                    <?php
                    $query = mysqli_query($con, "SELECT fullName FROM users WHERE id='" . $_SESSION['id'] . "'");
                    while ($row = mysqli_fetch_array($query)) {
                        echo $row['fullName'];
                    }
                    ?>
                </h4>
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
                        <a href="#" class="active" style="text-decoration: none;">
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
                <h1>Appointment History</h1>
                <small>Home /Appointment History </small>
            </div>

            <div class="container-fluid container-fullw bg-white">
                <div class="row">
                    <div class="col-md-12">
                        <p style="color: red;"><?php echo htmlentities($_SESSION['msg']); ?>
                            <?php echo htmlentities($_SESSION['msg'] = ""); ?></p>
                        <table class="table table-hover" id="sample-table-1">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th class="hidden-xs">Doctor Name</th>
                                    <th>Specialization</th>
                                    <th>Consultancy Fee</th>
                                    <th>Appointment Date / Time</th>
                                    <th>Appointment Creation Date</th>
                                    <th>Current Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = mysqli_query($con, "SELECT doctors.doctorName AS docname, appointment.* FROM appointment JOIN doctors ON doctors.id=appointment.doctorId WHERE appointment.userId='" . $_SESSION['id'] . "'");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                    <tr>
                                        <td class="center"><?php echo $cnt; ?>.</td>
                                        <td class="hidden-xs"><?php echo $row['docname']; ?></td>
                                        <td><?php echo $row['doctorSpecialization']; ?></td>
                                        <td><?php echo $row['consultancyFees']; ?></td>
                                        <td><?php echo $row['appointmentDate']; ?> / <?php echo $row['appointmentTime']; ?></td>
                                        <td><?php echo $row['postingDate']; ?></td>
                                        <td>
                                            <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                                                echo "Active";
                                            }
                                            if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
                                                echo "Cancel by You";
                                            }

                                            if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
                                                echo "Cancel by Doctor";
                                            }
                                            ?>
                                        </td>
                                        </td>
                                        <td>
                                            <?php if ($row['status'] == "Pending") { ?>
                                                <a href="appointment-history.php?id=<?php echo $row['id'] ?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment?')" class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
                                            <?php } else { ?>
                                                <a href="appointment-history.php?id=<?php echo $row['id'] ?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')" class="btn btn-transparent btn-xs tooltips" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove">Cancel</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php
                                    $cnt++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- start: FOOTER -->
            <?php include('include/footer.php'); ?>
            <!-- end: FOOTER -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-f7OyTqX3cT3W6jVHzq+Q6JgqXzR2O8G9Xl5nQj1RyyKj2lNQv1hY5t5xuQ9l9vYr" crossorigin="anonymous"></script>
</body>

</html>