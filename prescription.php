<?php
session_start();
include("headers.php");
 
if(isset($_POST['submit']))
{
	// utk tgok ada input field dari form
	// var_dump($_POST);
	// die();

	if(isset($_GET['editid']))
	{	
		$sql1 ="SELECT treatment_records_id from treatment_records where appointmentid ='$_GET[appid]'";
		$recordsid = mysqli_query($con,$sql1);
		$sql ="UPDATE prescription SET treatment_records_id='$recordsid',doctorid='$_POST[doctorid]',patientid='$_POST[patientid]',prescriptiondate='$_POST[date]',status='$_POST[select]' WHERE prescription_id='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('prescription record updated successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
		$sql ="INSERT INTO prescription(treatment_records_id,doctorid,patientid,prescriptiondate,status,appointmentid) 
		values('$_POST[treatment_records_id]','$_POST[doctorid]','$_POST[patientid]','$_POST[date]','Active','$_GET[appid]')";
		if($qsql = mysqli_query($con,$sql))
		{
			$insid= mysqli_insert_id($con);
			$prescriptionid= $insid;
			$prescriptiondate= $_POST['date'];
			$billtype="Prescription charge";
			$billamt=0;
			include("insertbillingrecord.php");	
			echo "<script>alert('prescription record inserted successfully...');</script>";
			echo "<script>window.location='prescriptionrecord.php?prescriptionid=" . $insid . "&patientid=$_GET[patientid]&appid=$_GET[appid]';</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_GET['editid']))
{
	$sql="SELECT * FROM prescription WHERE prescriptionid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>

<div class="container">
	<br>
	<h2>Add New Prescription</h2>
	<br>
	<p>Add new prescription record</p>
	<form method="post" action="" name="frmpres" onSubmit="return validateform()">
		<input type="hidden" name="patientid" value="<?php echo $_GET['patientid']; ?>" />
		<!-- <input type="input" name="treatment_records_id" value="<?php // echo $_GET['treatment_records_id']; ?>" /> -->
		<!-- <input type="input" name="appid" value="<?php // echo $_GET['appid']; ?>" /> -->
		
		<table class="table">
			<tbody>
				<tr>
					<td>Patient</td>
					<td>
						<?php
						$sqlpatient = "SELECT * FROM patient WHERE status='Active' AND patientid='$_GET[patientid]'";
						$qsqlpatient = mysqli_query($con, $sqlpatient);
						while ($rspatient = mysqli_fetch_array($qsqlpatient)) {
							echo "$rspatient[patientid]- $rspatient[patientname]";
						}
						?></td>
				</tr>
				<tr>
					<td>Treatment record id</td>
					<td>
						<?php
						$sql1 ="SELECT treatment_records_id from treatment_records where appointmentid ='$_GET[appid]'";
						$qsql = mysqli_query($con, $sql1);
						while ($rs = mysqli_fetch_array($qsql)) {
							echo "$rs[treatment_records_id]";
							echo '<input type="hidden" name="treatment_records_id" value="'.$rs["treatment_records_id"].'" >';
						}
						?>
					</td>
				</tr>

				<?php
				if (isset($_SESSION['doctorid'])) {
				?>
					<tr>
						<td>Doctor</td>
						<td>
							<?php
							$sqldoctor = "SELECT * FROM doctor INNER JOIN department ON department.departmentid=doctor.departmentid WHERE doctor.status='Active' AND doctor.doctorid='$_SESSION[doctorid]'";
							$qsqldoctor = mysqli_query($con, $sqldoctor);
							while ($rsdoctor = mysqli_fetch_array($qsqldoctor)) {
								echo "$rsdoctor[doctorname] ( $rsdoctor[departmentname] )";
							}
							?>
							<input type="hidden" name="doctorid" value="<?php echo $_SESSION['doctorid']; ?>" />
						</td>
					<?php
				} else {
					?>
					<tr>
						<td width="34%">Doctor</td>
						<td width="66%"><select name="doctorid" id="doctorid">
								<option value="">Select</option>
								<?php
								$sqldoctor = "SELECT * FROM doctor WHERE status='Active'";
								$qsqldoctor = mysqli_query($con, $sqldoctor);
								while ($rsdoctor = mysqli_fetch_array($qsqldoctor)) {
									if ($rsdoctor['doctorid'] == $rsedit['doctorid']) {
										echo "<option value='$rsdoctor[doctorid]' selected>$rsdoctor[doctorid]-$rsdoctor[doctorname]</option>";
									} else {
										echo "<option value='$rsdoctor[doctorid]'>$rsdoctor[doctorid]-$rsdoctor[doctorname]</option>";
									}
								}
								?>
							</select></td>
					</tr>
				<?php
				}
				?>
				<tr>
					<td>Prescription Date</td>
					<td><input type="date" name="date" id="date" value="<?php echo $rsedit['prescriptiondate']; ?>" /></td>
				</tr>

				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit" /></td>
				</tr>
			</tbody>
		</table>
		<p> ;</p>
</div>

<div class="container">

</div>


<div class="clear"></div>
</div>
</div>
<?php
include("footer.php");
?>
<script type="application/javascript">
	function validateform() {
		if (document.frmpres.doctorid.value == "") {
			alert("Doctor name should not be empty..");
			document.frmpres.doctorid.focus();
			return false;
		} else if (document.frmpres.select3.value == "") {
			alert("Patient name should not be empty..");
			document.frmpres.select3.focus();
			return false;
		} else if (document.frmpres.date.value == "") {
			alert("Prescription date should not be empty..");
			document.frmpres.date.focus();
			return false;
		} else if (document.frmpres.select.value == "") {
			alert("Kindly select the status..");
			document.frmpres.select.focus();
			return false;
		} else {
			return true;
		}
	}
</script>