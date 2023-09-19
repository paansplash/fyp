<?php
include("header.php");
 
if (isset($_GET['delid'])) {
  $sql = "DELETE FROM prescription WHERE prescriptionid='$_GET[delid]'";
  $qsql = mysqli_query($con, $sql);
  if (mysqli_affected_rows($con) == 1) {
    echo "<script>alert('prescription deleted successfully..');</script>";
  }
}
?>
<div class="container">
  <br></br>
  <h2>View Rrescription Record</h2>
  <br></br>

  <?php
  $sql = "SELECT * FROM prescription";
  $qsql = mysqli_query($con, $sql);
  while ($rs = mysqli_fetch_array($qsql)) {
    $sqlpatient = "SELECT * FROM patient WHERE patientid='$rs[patientid]'";
    $qsqlpatient = mysqli_query($con, $sqlpatient);
    $rspatient = mysqli_fetch_array($qsqlpatient);

    $sqldoctor = "SELECT * FROM doctor WHERE doctorid='$rs[doctorid]'";
    $qsqldoctor = mysqli_query($con, $sqldoctor);
    $rsdoctor = mysqli_fetch_array($qsqldoctor);
  ?>
    <table class="table">
      <tbody>
        <tr>
          <td><strong>Doctor</strong></td>
          <td><strong>Patient</strong></td>
          <td><strong>Prescription Date</strong></td>
          <td><strong>Status</strong></td>
        </tr>
        <?php
        echo "<tr>
              <td>$rsdoctor[doctorname]</td>
              <td>$rspatient[patientname]</td>
               <td>$rs[prescriptiondate]</td>
            <td>$rs[status]</td>
            
            </tr>";

        ?>
      </tbody>
    </table>

    <h1>View Prescription record</h1>
    <table class="table">
      <tbody>
        <tr>
          <td>Medicine</td>
          <td>Cost</td>
          <td>Unit</td>
          <td>Dosage</td>
        </tr>
        <?php
        $sqlprescription_records = "SELECT * FROM prescription_records WHERE prescription_id='$_GET[prescriptionid]'";
        $qsqlprescription_records = mysqli_query($con, $sqlprescription_records);
        while ($rsprescription_records = mysqli_fetch_array($qsqlprescription_records)) {
          echo "<tr>
              <td>$rsprescription_records[medicine_name]</td>
              <td>$rsprescription_records[cost]</td>
               <td>$rsprescription_records[unit]</td>
                <td>$rsprescription_records[dosage]</td>
                  
            </tr>";
        }
        ?>
        <tr>
          <td colspan="6">
            <div align="center">
              <input type="submit" name="print" id="print" value="Print" onclick="myFunction()" />
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  <?php
  }
  ?> 
</div>
<div class="clear"></div>
<?php
include("footer.php");
?>