<?php
session_start();
include("headers.php");
if (isset($_POST['submit'])) {
	if (isset($_SESSION['adminid'])) {
		$sql = "UPDATE admin SET adminname='$_POST[adminname]',loginid='$_POST[loginid]',status='$_POST[select]' WHERE adminid='$_SESSION[adminid]'";
		if ($qsql = mysqli_query($con, $sql)) {
			echo "<script>alert('admin record updated successfully...');</script>";
		} else {
			echo mysqli_error($con);
		}
	} else {
		$sql = "INSERT INTO admin(adminname,loginid,status) values('$_POST[adminname]','$_POST[loginid]','$_POST[select]')";
		if ($qsql = mysqli_query($con, $sql)) {
			echo "<script>alert('Administrator record inserted successfully...');</script>";
		} else {
			echo mysqli_error($con);
		}
	}
}
if (isset($_SESSION['adminid'])) {
	$sql = "SELECT * FROM admin WHERE adminid='$_SESSION[adminid]' ";
	$qsql = mysqli_query($con, $sql);
	$rsedit = mysqli_fetch_array($qsql);
}
?>

<div class="container">
	<br>
	<h2>View and Update Administrator Profile</h2>
	<br>

	<form method="post" action="" name="frmadminprofile" onSubmit="return validateform()">
		<table class="table">
			<tbody>
				<tr>
					<td width="34%">Admin Name</td>
					<td width="66%"><input type="text" name="adminname" id="adminname" value="<?php echo $rsedit['adminname']; ?>" /></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" name="loginid" id="loginid" value="<?php echo $rsedit['loginid']; ?>" /></td>
				</tr>
				<tr>
					<td>Status</td>
					<td><select name="select" id="select">
							<option value="">Select</option>
							<?php
							$arr = array("Active", "Inactive");
							foreach ($arr as $val) {
								if ($val == $rsedit['status']) {
									echo "<option value='$val' selected>$val</option>";
								} else {
									echo "<option value='$val'>$val</option>";
								}
							}
							?>
						</select></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit" /></td>
				</tr>
			</tbody>
		</table>
	</form>
 </div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<?php
include("footers.php");
?>
<script type="application/javascript">
	var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
	var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
	var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

	function validateform() {
		if (document.frmadminprofile.adminname.value == "") {
			alert("Admin name should not be empty..");
			document.frmadminprofile.adminname.focus();
			return false;
		} else if (!document.frmadminprofile.adminname.value.match(alphaspaceExp)) {
			alert("Admin name not valid..");
			document.frmadminprofile.adminname.focus();
			return false;
		} else if (document.frmadminprofile.loginid.value == "") {
			alert("Username should not be empty..");
			document.frmadminprofile.loginid.focus();
			return false;
		} else if (!document.frmadminprofile.loginid.value.match(alphanumericExp)) {
			alert("Username not valid..");
			document.frmadminprofile.loginid.focus();
			return false;
		} else if (document.frmadminprofile.select.value == "") {
			alert("Kindly select the status..");
			document.frmadminprofile.select.focus();
			return false;
		} else {
			return true;
		}
	}
</script>