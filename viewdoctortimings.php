<?php
session_start();
include("headers.php");
 
if (isset($_GET['delid'])) {
  $sql = "DELETE FROM doctor_timings WHERE doctor_timings_id='$_GET[delid]'";
  $qsql = mysqli_query($con, $sql);
  if (mysqli_affected_rows($con) == 1) {
    echo "<script>alert('doctortimings record deleted successfully..');</script>";
  }
}
?>

<div class="container">
  <br>
  <h2>View Doctor Timings</h2>
  <br>

  <table class="table">
    <tbody>
      <tr>
        <th>Doctor</th>
        <th>Day</th>
        <th>Timings available</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      <?php
      $sql = "SELECT * FROM doctor_timings";
      $qsql = mysqli_query($con, $sql);
      while ($rs = mysqli_fetch_array($qsql)) {
        $sqldoctor = "SELECT * FROM doctor WHERE doctorid='$rs[doctorid]'";
        $qsqldoctor = mysqli_query($con, $sqldoctor);
        $rsdoctor = mysqli_fetch_array($qsqldoctor);

        $sqldoct = "SELECT * FROM doctor_timings WHERE doctor_timings_id='$rs[doctor_timings_id]'";
        $qsqldoct = mysqli_query($con, $sqldoct);
        $rsdoct = mysqli_fetch_array($qsqldoct);



        echo "<tr>
          <td>$rsdoctor[doctorname]</td>
          <td>$rsdoct[available_day]</td>
          <td>$rsdoct[start_time] - $rsdoct[end_time]</td>
          <td>$rs[status]</td>
          <td><a href='doctortimings.php?editid=$rs[doctor_timings_id]'>Edit</a> | <a href='viewdoctortimings.php?delid=$rs[doctor_timings_id]'>Delete</a> </td>
        </tr>";
      }
      ?>

    </tbody>
  </table>
</div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<?php
include("footers.php");
?>