<?php
session_start();
include("headers.php");
 
if (isset($_GET['delid'])) {
  $sql = "DELETE FROM doctor WHERE doctorid='$_GET[delid]'";
  $qsql = mysqli_query($con, $sql);
  if (mysqli_affected_rows($con) == 1) {
    echo "<script>alert('doctor record deleted successfully..');</script>";
  }
}
?>

<div class="container">
  <br>
  <h2>View Doctor</h2>

  <h2>Search Patient - <input type="search" class="light-table-filter" data-table="table" placeholder="Filter" /></h2>


  <table class="table">
    <thead>

    <tbody>
      <tr>
        <th>Doctor Name</th>
        <th>Mobile Number</th>
        <th>Department</th>
        <th>Login ID</th>
        <th>Consultancy Charge</th>
        <th>Education</th>
        <th>Experience</th>
        <th>Status</th>
        <th>Action</th>
      </tr>

      <?php
        $sql = "SELECT * FROM doctor";
        $qsql = mysqli_query($con, $sql);

        while ($rs = mysqli_fetch_array($qsql)) {

          $sqldept = "SELECT * FROM department WHERE departmentid='$rs[departmentid]'";
          $qsqldept = mysqli_query($con, $sqldept);
          $rsdept = mysqli_fetch_array($qsqldept);
           echo "<tr>
                    <td>&nbsp;$rs[doctorname]</td>
                    <td>&nbsp;$rs[mobileno]</td>
		                <td>&nbsp;$rsdept[departmentname]</td>
                    <td>&nbsp;$rs[loginid]</td>
                    <td>&nbsp;$rs[consultancy_charge]</td>
                    <td>&nbsp;$rs[education]</td>
                    <td>&nbsp;$rs[experience]</td>
                    <td>$rs[status]</td>
                    <td>&nbsp;<a href='doctor.php?editid=$rs[doctorid]'>Edit</a> | <a href='viewdoctor.php?delid=$rs[doctorid]'>Delete</a> </td>
                  </tr>";
      }
      ?>
    </tbody>
  </table>
  <p>&nbsp;</p>
</div>
<div class="clear"></div>
<?php
include("footers.php");
?>