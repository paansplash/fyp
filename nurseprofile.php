<?php
session_start();
include("headers.php");
 
if (isset($_POST['submit'])) {
	if (isset($_SESSION['nurseid'])) {
		$sql = "UPDATE nurse SET nursename='$_POST[nursename]',loginid='$_POST[loginid]',status='$_POST[select]' WHERE nurseid='$_SESSION[nurseid]'";
		if ($qsql = mysqli_query($con, $sql)) {
			echo "<script>alert('Nurse record updated successfully...');</script>";
		} else {
			echo mysqli_error($con);
		}
	} else {
		$sql = "INSERT INTO nurse(nursename,loginid,status) values('$_POST[nursename]','$_POST[loginid]','$_POST[select]')";
		if ($qsql = mysqli_query($con, $sql)) {
			echo "<script>alert('Nurse record inserted successfully...');</script>";
		} else {
			echo mysqli_error($con);
		}
	}
}
if (isset($_SESSION['nurseid'])) {
	$sql = "SELECT * FROM nurse WHERE nurseid='$_SESSION[nurseid]' ";
	$qsql = mysqli_query($con, $sql);
	$rsedit = mysqli_fetch_array($qsql);
}
?>

<div class="container">
	<br>
	<h2>View and Update Nurse Profile</h2>
	<br>

	<form method="post" action="" name="frmnurseprofile" onSubmit="return validateform()">
		<table class="table">
			<tbody>
				<tr>
					<td width="34%">Nurse Name</td>
					<td width="66%"><input type="text" name="nursename" id="nursename" value="<?php echo $rsedit['nursename']; ?>" /></td>
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
		if (document.frmnurseprofile.nursename.value == "") {
			alert("Nurse name should not be empty..");
			document.frmnurseprofile.nursename.focus();
			return false;
		} else if (!document.frmnurseprofile.nursename.value.match(alphaspaceExp)) {
			alert("Nurse name not valid..");
			document.frmnurseprofile.nursename.focus();
			return false;
		} else if (document.frmnurseprofile.loginid.value == "") {
			alert("Username should not be empty..");
			document.frmnurseprofile.loginid.focus();
			return false;
		} else if (!document.frmnurseprofile.loginid.value.match(alphanumericExp)) {
			alert("Username not valid..");
			document.frmnurseprofile.loginid.focus();
			return false;
		} else if (document.frmnurseprofile.select.value == "") {
			alert("Kindly select the status..");
			document.frmnurseprofile.select.focus();
			return false;
		} else {
			return true;
		}
	}
</script>