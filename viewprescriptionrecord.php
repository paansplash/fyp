<?php
include("header.php");
 
if (isset($_GET['delid'])) {
  $sql = "DELETE FROM prescription_records WHERE prescription_record_id='$_GET[delid]'";
  $qsql = mysqli_query($con, $sql);
  if (mysqli_affected_rows($con) == 1) {
    echo "<script>alert('prescription record deleted successfully..');</script>";
  }
}
?>

<div class="container">
  <br></br>
  <h2>View Prescription Record</h2>
  <br></br>

  <table class="table">
    <tbody>
      <tr>
        <td>Medicine</td>
        <td>Cost</td>
        <td>Unit</td>
        <td>Dosage</td>
        <td>Status</td>
        <td>Action</td>
      </tr>
      <?php
      $sql = "SELECT * FROM prescription_records";
      $qsql = mysqli_query($con, $sql);
      while ($rs = mysqli_fetch_array($qsql)) {
        echo "<tr>
          <td>$rs[medicine_name]</td>
          <td>$rs[cost]</td>
		   <td>$rs[unit]</td>
		    <td>$rs[dosage]</td>
			 <td>$rs[status]</td>
			  <td><a href='prescriptionrecord.php?editid=$rs[prescription_record_id]'>Edit</a>  | <a href='viewprescriptionrecord.php?delid=$rs[prescription_record_id]'>Delete</a> </td>
        </tr>";
      }
      ?>
    </tbody>
  </table>
</div>
<div class="clear"></div>
<?php
include("footer.php");
?>