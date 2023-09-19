<?php
session_start();
include("headers.php");
 
if (isset($_GET['delid'])) {
  $sql = "DELETE FROM treatment WHERE treatmentid='$_GET[delid]'";
  $qsql = mysqli_query($con, $sql);
  if (mysqli_affected_rows($con) == 1) {
    echo "<script>alert('treatment deleted successfully..');</script>";
  }
}
?>

<div class="container">
  <br></br>
  <h2>Treatments</h2>
  <br>

  <table class="table">
    <tbody>
      <tr>
        <td><strong>Treatment Type</strong></td>
        <td><strong>Treatment cost</strong></td>
        <td><strong>Note</strong></td>
        <td><strong>Status</strong></td>
        <?php
        if (isset($_SESSION['adminid'])) {
        ?>
          <td><strong>Action</strong></td>
        <?php
        }
        ?>
      </tr>
      <?php
      $sql = "SELECT * FROM treatment";
      $qsql = mysqli_query($con, $sql);
      while ($rs = mysqli_fetch_array($qsql)) {
        echo "<tr>
          <td>$rs[treatmenttype]</td>
		  <td>RM $rs[treatment_cost]</td>
          <td>$rs[note]</td>
			 <td>$rs[status]</td>";
        if (isset($_SESSION['adminid'])) {
          echo "<td>
			  <a href='treatment.php?editid=$rs[treatmentid]'>Edit</a> | <a href='viewtreatment.php?delid=$rs[treatmentid]'>Delete</a> </td>";
        }
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<div class="clear"></div>

<?php
include("footers.php");
?>