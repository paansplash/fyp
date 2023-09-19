<?php
session_start();
include("headers.php");
 
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM patient WHERE patientid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('patient record deleted successfully..');</script>";
	}
}
?>

<div class="container">
  <br></br>
  <h2>View Patient Record</h2>
  <br></br>

<section class="container">
<p>Search Patient - <input type="search" class="light-table-filter" data-table="table" placeholder="Filter" /></p>


	<table class="table">
      <thead>
        <tr>
          <th width="15%" height="36"><div align="center">Patient Name</div></th>
          <th width="28%"><div align="center">Address</div></th>    
          <th width="20%"><div align="center">Patient Profile</div></th>
          <th width="17%"><div align="center">Action</div></th>
        </tr>
        </thead>
      <tbody>
   <?php
		$sql ="SELECT * FROM patient";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
        echo "<tr>
          <td>$rs[patientname]<br>
		  <strong>Login ID :</strong> $rs[loginid] </td>
		   <td>$rs[address]<br>$rs[city] -  &nbsp;$rs[pincode]<br>
Mob No. - $rs[mobileno]</td>
			    <td><strong>Blood group</strong> - $rs[bloodgroup]<br>
<strong>Gender</strong> - &nbsp;$rs[gender]<br>
<strong>DOB</strong> - &nbsp;$rs[dob]</td>
          <td align='center'>Status - $rs[status] <br>";
if(isset($_SESSION['adminid']))
{
		  echo "<a href='patient.php?editid=$rs[patientid]'>Edit</a> | <a href='viewpatient.php?delid=$rs[patientid]'>Delete</a> <hr>
<a href='patientreport.php?patientid=$rs[patientid]'>View Report</a>";
}
		  echo "</td></tr>";
		}
		?>
      </tbody>
    </table>
</section>
    <p>&nbsp;</p>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>
<?php
include("footers.php");
?>