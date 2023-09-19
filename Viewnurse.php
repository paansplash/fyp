<?php
session_start();
include("headers.php");

if (isset($_GET['delid'])) {
    $sql = "DELETE FROM nurse WHERE nurseid='$_GET[delid]'";
    $qsql = mysqli_query($con, $sql);
    if (mysqli_affected_rows($con) == 1) {
        echo "<script>alert('nurse record deleted successfully..');</script>";
    }
}
?>

<div class="container">
    <br>
    <h2>View nurse</h2>

    <h2>Search Patient - <input type="search" class="light-table-filter" data-table="table" placeholder="Filter" /></h2>


    <table class="table">
        <thead>

        <tbody>
            <tr>
                <th>Nurse Name</th>
                <th>Mobile Number</th>
                <th>Department</th>
                <th>Login ID</th>
                <th>Education</th>
                <th>Experience</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            <?php
            $sql = "SELECT * FROM nurse";
            $qsql = mysqli_query($con, $sql);

            while ($rs = mysqli_fetch_array($qsql)) {

                $sqldept = "SELECT * FROM department WHERE departmentid='$rs[departmentid]'";
                $qsqldept = mysqli_query($con, $sqldept);
                $rsdept = mysqli_fetch_array($qsqldept);
                echo "<tr>
                    <td>$rs[nursename]</td>
                    <td>$rs[mobileno]</td>
		                <td>$rsdept[departmentname]</td>
                    <td>$rs[loginid]</td>
                    <td>$rs[education]</td>
                    <td>$rs[experience]</td>
                    <td>$rs[status]</td>
                    <td><a href='nurse.php?editid=$rs[nurseid]'>Edit</a> | <a href='viewnurse.php?delid=$rs[nurseid]'>Delete</a> </td>
                  </tr>";
            }
            ?>
        </tbody>
    </table>
    <p>&nbsp;</p>
</div>
<div class="clear"></div>
<?php
include("footers.php");
?>