<?php
session_start();
include("headers.php");
 
if (isset($_GET['delid'])) {
  $sql = "DELETE FROM prescription WHERE prescriptionid='$_GET[delid]'";
  $qsql = mysqli_query($con, $sql);
  if (mysqli_affected_rows($con) == 1) {
    echo "<script>alert('prescription deleted successfully..');</script>";
  }
}
?>

<div class="container">
  <br>
  <h2>View Prescription</h2>
  <br>
  <p>View prescription record</p>
  <?php
  $sql = "SELECT * FROM prescription where patientid='$_SESSION[patientid]'";
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

    <p><strong>Prescription record</strong></p>
    <table class="table">
      <tbody>
        <tr>
          <td>Medicine</td>
          <td>Cost</td>
          <td>Unit</td>
          <td>Dosage</td>
        </tr>
        <?php
        $sqlprescription_records = "SELECT * FROM prescription_records LEFT JOIN medicine ON prescription_records.medicine_name=medicine.medicineid WHERE prescription_records.prescription_id='$rs[0]'";
        $qsqlprescription_records = mysqli_query($con, $sqlprescription_records);
        while ($rsprescription_records = mysqli_fetch_array($qsqlprescription_records)) {
          echo "<tr>
              <td>$rsprescription_records[medicinename]</td>
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
  ?> <p> ;</p>
</div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<?php
include("footers.php");
?>
<script>
  function myFunction() {
    window.print();
  }
</script>