<?php
session_start();
include("header.php");
 
if (isset($_SESSION['patientid'])) {
	echo "<script>window.location='patientaccount.php';</script>";
}
if (isset($_POST['submit'])) {
	$sql = "SELECT * FROM patient WHERE loginid='$_POST[loginid]' AND password='$_POST[password]' AND status='Active'";
	$qsql = mysqli_query($con, $sql);
	if (mysqli_num_rows($qsql) >= 1) {
		$rslogin = mysqli_fetch_array($qsql);
		$_SESSION['patientid'] = $rslogin['patientid'];
		echo "<script>window.location='patientaccount.php';</script>";
	} else {
		echo "<script>alert('Invalid Username and password entered..'); </script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="login.css">
	<!------ Include the above in your HEAD tag ---------->
</head>

<body>
	<div class="wrapper fadeInDown">
		<div id="formContent">
			<!-- Tabs Titles -->

			<!-- Icon -->
			<div class="fadeIn first">
				<img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
			</div>

			<!-- Login Form -->
			<form method="post" action="" name="frmpatlogin" onSubmit="return validateform()">
				<input type="text" id="login" class="fadeIn second" name="loginid" placeholder="login">
				<input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
				<input type="submit" class="fadeIn fourth" name="submit" id="submit" value="Login">
			</form>

			<!-- Remind Password -->
			<!-- <div id="formFooter">
				<a class="underlineHover" href="patient.php">New User</a> | <a class="underlineHover" href="patientforgotpassword.php">Forgot Password?</a>
			</div> -->

		</div>
	</div>
</body>
<?php
include("footer.php");
?>
<script type="application/javascript">
	var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
	var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
	var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

	function validateform() {
		if (document.frmpatlogin.loginid.value == "") {
			alert("Username should not be empty..");
			document.frmpatlogin.loginid.focus();
			return false;
		} else if (document.frmpatlogin.password.value == "") {
			alert("Password should not be empty..");
			document.frmpatlogin.password.focus();
			return false;
		} else if (document.frmpatlogin.password.value.length < 8) {
			alert("Password length should be more than 8 characters...");
			document.frmpatlogin.password.focus();
			return false;
		}
	}
</script>