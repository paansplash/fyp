<?php
session_start();
include("headers.php");
if (isset($_POST['submit'])) {
	if (isset($_GET['editid'])) {
		$sql = "UPDATE admin SET adminname='$_POST[adminname]',loginid='$_POST[loginid]',password='$_POST[password]',status='$_POST[select]' WHERE adminid='$_GET[editid]'";
		if ($qsql = mysqli_query($con, $sql)) {
			echo "<script>alert('admin record updated successfully...');</script>";
		} else {
			echo mysqli_error($con);
		}
	} else {
		$sql = "INSERT INTO admin (adminname,loginid,password,status) values('$_POST[adminname]','$_POST[loginid]','$_POST[password]','$_POST[select]')";
		if ($qsql = mysqli_query($con, $sql)) {
			echo "<script>alert('Administrator record inserted successfully...');</script>";
		} else {
			echo mysqli_error($con);
		}
	}
}
if (isset($_GET['editid'])) {
	$sql = "SELECT * FROM admin WHERE adminid='$_GET[editid]' ";
	$qsql = mysqli_query($con, $sql);
	$rsedit = mysqli_fetch_array($qsql);
}
?>
<div class="container">
	<br>
	<h2>Add New Admin</h2>
	<br>

	<form method="post" action="" name="frmadmin" onSubmit="return validateform()">
		<table class="table">
			<tbody>
				<tr>
					<td>Admin Name</td>
					<td><input type="text" name="adminname" id="adminname" value="<?php echo $rsedit['adminname']; ?>" /></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><input type="text" name="loginid" id="loginid" value="<?php echo $rsedit['loginid']; ?>" /></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" id="password" value="<?php echo $rsedit['password']; ?>" /></td>
				</tr>
				<tr>
					<td>Confirm Password</td>
					<td><input type="password" name="cnfirmpassword" id="cnfirmpassword" value="<?php echo $rsedit['confirmpassword']; ?>" /></td>
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
		if (document.frmadmin.adminname.value == "") {
			alert("Admin name should not be empty..");
			document.frmadmin.adminname.focus();
			return false;
		} else if (!document.frmadmin.adminname.value.match(alphaspaceExp)) {
			alert("Admin name not valid..");
			document.frmadmin.adminname.focus();
			return false;
		} else if (document.frmadmin.loginid.value == "") {
			alert("Username should not be empty..");
			document.frmadmin.loginid.focus();
			return false;
		} else if (!document.frmadmin.loginid.value.match(alphanumericExp)) {
			alert("Username not valid..");
			document.frmadmin.loginid.focus();
			return false;
		} else if (document.frmadmin.password.value == "") {
			alert("Password should not be empty..");
			document.frmadmin.password.focus();
			return false;
		} else if (document.frmadmin.password.value.length < 8) {
			alert("Password length should be more than 8 characters...");
			document.frmadmin.password.focus();
			return false;
		} else if (document.frmadmin.password.value != document.frmadmin.cnfirmpassword.value) {
			alert("Password and confirm password should be equal..");
			document.frmadmin.password.focus();
			return false;
		} else if (document.frmadmin.select.value == "") {
			alert("Kindly select the status..");
			document.frmadmin.select.focus();
			return false;
		} else {
			return true;
		}
	}
</script>