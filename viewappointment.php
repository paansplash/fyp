<?php
session_start();
include("headers.php");
 
if (isset($_GET['delid'])) {
	$sql = "DELETE FROM appointment WHERE appointmentid='$_GET[delid]'";
	$qsql = mysqli_query($con, $sql);
	if (mysqli_affected_rows($con) == 1) {
		echo "<script>alert('appointment record deleted successfully..');</script>";
	}
}
if (isset($_GET['approveid'])) {
	$sql = "UPDATE appointment SET status='Approved' WHERE appointmentid='$_GET[approveid]'";
	$qsql = mysqli_query($con, $sql);
	if (mysqli_affected_rows($con) == 1) {
		echo "<script>alert('Appointment record Approved successfully..');</script>";
	}
}
?>

<div class="container">
	<br></br>
	<h2>Appointment Records</h2>
	<br></br>
	<p><strong> Appointment - <input type="search" class="light-table-filter" data-table="table" placeholder="Filter" /></strong></p>

	<table class="table">
		<thead>
			<tr>
				<th>Patient detail</th>
				<th>Appointment Date & Time</th>
				<th>Department</th>
				<th>Doctor</th>
				<th>Reason</th>
				<th>Status</th>
				<th>
					<div align="center">Action</div>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$sql = "SELECT * FROM appointment WHERE (status !='')";
			if (isset($_SESSION['patientid'])) {
				$sql  = $sql . " AND patientid='$_SESSION[patientid]'";
			}
			$qsql = mysqli_query($con, $sql);
			while ($rs = mysqli_fetch_array($qsql)) {
				$sqlpat = "SELECT * FROM patient WHERE patientid='$rs[patientid]'";
				$qsqlpat = mysqli_query($con, $sqlpat);
				$rspat = mysqli_fetch_array($qsqlpat);


				$sqldept = "SELECT * FROM department WHERE departmentid='$rs[departmentid]'";
				$qsqldept = mysqli_query($con, $sqldept);
				$rsdept = mysqli_fetch_array($qsqldept);

				$sqldoc = "SELECT * FROM doctor WHERE doctorid='$rs[doctorid]'";
				$qsqldoc = mysqli_query($con, $sqldoc);
				$rsdoc = mysqli_fetch_array($qsqldoc);
				echo "<tr>
          <td>$rspat[patientname]<br>$rspat[mobileno]</td>		 
			 <td>" . date("d-M-Y", strtotime($rs['appointmentdate'])) . "  <br>" . date("H:i A", strtotime($rs['appointmenttime'])) . "</td> 
		    <td>$rsdept[departmentname]</td>
			   <td>$rsdoc[doctorname]</td>
			    <td>$rs[app_reason]</td>
			    <td>$rs[status]</td>
          <td><div align='center'>";
				if ($rs['status'] != "Approved") {
					if (!(isset($_SESSION['patientid']))) {
						echo "<a href='appointmentapproval.php?editid=$rs[appointmentid]'>Approve</a><hr>";
					}
					echo "  <a href='viewappointment.php?delid=$rs[appointmentid]'>Delete</a>";
				} else {
					echo "<a href='patientreport.php?patientid=$rs[patientid]&appointmentid=$rs[appointmentid]'>View Report</a>";
				}
				echo "</center></td></tr>";
			}
			?>
		</tbody>
	</table>
</div>
<?php
include("footers.php");
?>