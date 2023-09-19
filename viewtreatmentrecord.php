<?php
session_start();
include("headers.php");
 
if (isset($_GET['delid'])) {
	$sql = "DELETE FROM treatment_records WHERE appointmentid='$_GET[delid]'";
	$qsql = mysqli_query($con, $sql);
	if (mysqli_affected_rows($con) == 1) {
		echo "<script>alert('appointment record deleted successfully..');</script>";
	}
}
?>

<div class="container">
	<br>
	<h2>View New treatment records</h2>
	<form method="post" action="">
		<section class="container">
			<p>Search Patient - <input type="search" class="light-table-filter" data-table="table" placeholder="Filter" /></p>
			<table class="table">
				<tbody>
					<tr>
						<th>Treatment Type</th>
						<th>Patient</th>
						<th>Doctor</th>
						<th>Treatment Description</th>
						<th>Treatment Date</th>
						<th>Treatment Time</th>

					</tr>
					<?php
					$sql = "SELECT * FROM treatment_records where status='Active'";
					if (isset($_SESSION['patientid'])) {
						$sql = $sql . " AND patientid='$_SESSION[patientid]'";
					}
					if (isset($_SESSION['doctorid'])) {
						$sql = $sql . " AND doctorid='$_SESSION[doctorid]'";
					}
					$qsql = mysqli_query($con, $sql);
					while ($rs = mysqli_fetch_array($qsql)) {
						$sqlpat = "SELECT * FROM patient WHERE patientid='$rs[patientid]'";
						$qsqlpat = mysqli_query($con, $sqlpat);
						$rspat = mysqli_fetch_array($qsqlpat);

						$sqldoc = "SELECT * FROM doctor WHERE doctorid='$rs[doctorid]'";
						$qsqldoc = mysqli_query($con, $sqldoc);
						$rsdoc = mysqli_fetch_array($qsqldoc);

						$sqltreatment = "SELECT * FROM treatment WHERE treatmentid='$rs[treatmentid]'";
						$qsqltreatment = mysqli_query($con, $sqltreatment);
						$rstreatment = mysqli_fetch_array($qsqltreatment);

						echo "<tr>
          <td>$rstreatment[treatmenttype]</td>
		   <td>$rspat[patientname]</td>
		    <td>$rsdoc[doctorname]</td>
			<td>$rs[treatment_description]</td>
			 <td>$rs[treatment_date]</td>
			  <td>$rs[treatment_time]</td>";

						echo " </tr>";
					}
					?>
				</tbody>
			</table>
	</form>
</div>
<div class="clear"></div>
<?php
include("footers.php");
?>