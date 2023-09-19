<?php
session_start();
if (!isset($_SESSION['doctorid'])) {
  echo "<script>window.location='doctorlogin.php';</script>";
}
include("headers.php");
?>
<div class="container">
  <br></br>

  <h2>Welcome to the Doctor Account <?php echo $rsdoctorprofile['doctorname']; ?></h2>
  <br></br>

  <h2>Number of Appointment Records :
    <?php
    $sql = "SELECT * FROM appointment WHERE status='Active'";
    $qsql = mysqli_query($con, $sql);
    echo mysqli_num_rows($qsql);
    ?>
  </h2>

  <br>

  <h2>Number of Patient Records :
    <?php
    $sql = "SELECT * FROM patient WHERE status='Active'";
    $qsql = mysqli_query($con, $sql);
    echo mysqli_num_rows($qsql);
    ?>
  </h2>
</div>
</div>

<div class="clear"></div>
</div>
</div>
<?php
include("footers.php");
?>