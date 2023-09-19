<?php
session_start();
if (!isset($_SESSION['adminid'])) {
	echo "<script>window.location='adminlogin.php';</script>";
}
include("headers.php");
?>
<div class="container">
	<br>
	<h1>Admin Dashboard</h1>
	<br>
	<p>
	<form method="get" action=""><strong>Date -</strong> <input type="date" name="date" value="<?php echo $_GET['date']; ?>"><input type="submit" name="submit" value="Submit"></form>
	</p>
	<h3>Number of Appointment Records :
		<?php
		$sql = "SELECT * FROM appointment WHERE status='Active'";
		if (isset($_GET['date'])) {
			$sql = $sql . " AND appointmentdate ='$_GET[date]'";
		}
		$qsql = mysqli_query($con, $sql);
		echo mysqli_num_rows($qsql);
		?>
	</h3>

	<h3>Number of Patient Records :
		<?php
		$sql = "SELECT * FROM patient WHERE status='Active'";
		$qsql = mysqli_query($con, $sql);
		echo mysqli_num_rows($qsql);
		?>
	</h3>
	<h3>Number of Treatment Records :
		<?php
		$sql = "SELECT * FROM treatment_records WHERE status='Active'";
		if (isset($_GET['date'])) {
			$sql = $sql . " AND treatment_date  ='$_GET[date]'";
		}
		$qsql = mysqli_query($con, $sql);
		echo mysqli_num_rows($qsql);
		?>
	</h3>

	<h3>Number of Prescription :
		<?php
		$sql = "SELECT * FROM prescription WHERE status='Active'";
		if (isset($_GET['date'])) {
			$sql = $sql . " AND prescriptiondate   ='$_GET[date]'";
		}
		$qsql = mysqli_query($con, $sql);
		echo mysqli_num_rows($qsql);
		?>
	</h3>
	<br>
	<hr>


<!-- DATABASE RECORD -->

	<h2>  Database Records</h2>
	<br>

	<h3>Number of Prescription Records :
		<?php
		$sql = "SELECT * FROM prescription_records WHERE status='Active'";
		$qsql = mysqli_query($con, $sql);
		echo mysqli_num_rows($qsql);
		?>
	</h3>

	<h3>Number of Treatment Types :
		<?php
		$sql = "SELECT * FROM treatment WHERE status='Active'";
		$qsql = mysqli_query($con, $sql);
		echo mysqli_num_rows($qsql);
		?>
	</h3>


	<h3>Number of Admin records :
		<?php
		$sql = "SELECT * FROM admin WHERE status='Active'";
		$qsql = mysqli_query($con, $sql);
		echo mysqli_num_rows($qsql);
		?>
	</h3>

	<h3>Number of Department Records :
		<?php
		$sql = "SELECT * FROM department WHERE status='Active'";
		$qsql = mysqli_query($con, $sql);
		echo mysqli_num_rows($qsql);
		?>
	</h3>

	<h3>Number of Doctor Records :
		<?php
		$sql = "SELECT * FROM doctor WHERE status='Active' ";
		$qsql = mysqli_query($con, $sql);
		echo mysqli_num_rows($qsql);
		?>
	</h3>

	<h3>Number of Doctor Timings Records :
		<?php
		$sql = "SELECT * FROM doctor_timings WHERE status='Active'";
		$qsql = mysqli_query($con, $sql);
		echo mysqli_num_rows($qsql);
		?>
	</h3>
</div>
</div>

<div class="clear"></div>
</div>
</div>
<?php
include("footers.php");
?>