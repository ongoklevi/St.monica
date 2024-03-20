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
    </a>
    </p>
<?php }  ?>