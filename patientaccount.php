<?php
session_start();
include("dbconnection.php");
if (!isset($_SESSION['patientid'])) {
  echo "<script>window.location='patientlogin.php';</script>";
}
include("headers.php");

$sqlpatient = "SELECT * FROM patient WHERE patientid='$_SESSION[patientid]' ";
$qsqlpatient = mysqli_query($con, $sqlpatient);
$rspatient = mysqli_fetch_array($qsqlpatient);

$sqlpatientappointment = "SELECT * FROM appointment WHERE patientid='$_SESSION[patientid]' ";
$qsqlpatientappointment = mysqli_query($con, $sqlpatientappointment);
$rspatientappointment = mysqli_fetch_array($qsqlpatientappointment);
?>
<div class="container">
  <br>
  <h2>Patient Account</h2>
  <br>
  <h3>This account is registered under <?php echo $rspatient['patientname']; ?> </h3>
  <br>
  <?php
  if (mysqli_num_rows($qsqlpatientappointment) == 0) {
  ?>
    <h3>Appointment records not found.. </h3>
  <?php
  } else {
  ?>
    <h3>Last Appointment taken on - <?php echo $rspatientappointment['appointmentdate']; ?> <?php echo $rspatientappointment['appointmenttime']; ?> </h3>
  <?php
  }
  ?>
</div>
</div>

<div class="clear"></div>
</div>
</div>
<?php
include("footers.php");
?>