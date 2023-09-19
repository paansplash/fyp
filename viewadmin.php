<?php
session_start();
include("headers.php");
 
if (isset($_GET['delid'])) {
  $sql = "DELETE FROM admin WHERE adminid='$_GET[delid]'";
  $qsql = mysqli_query($con, $sql);
  if (mysqli_affected_rows($con) == 1) {
    echo "<script>alert('admin record deleted successfully..');</script>";
  }
}
?>

<div class="container">
  <br>
  <h2>View Administrator Record</h2>
  <br>

  <section class="container">
    <h2>Search Admin - <input type="search" class="light-table-filter" data-table="table" placeholder="Filter" /></h2>
    <table class="table">
      <thead>
        <tr>
          <td width="12%" height="40">Admin Name</td>
          <td width="11%">Username</td>
          <td width="12%">Status</td>
          <td width="34%">Action</td>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM admin";
        $qsql = mysqli_query($con, $sql);
        while ($rs = mysqli_fetch_array($qsql)) {
          echo "<tr>
          <td>$rs[adminname]</td>
          <td>$rs[loginid]</td>
          <td>$rs[status]</td>
          <td><a href='admin.php?editid=$rs[adminid]'>Edit</a>| <a href='viewadmin.php?delid=$rs[adminid]'>Delete</a> </td>
        </tr>";
        }
        ?>
      </tbody>
    </table>
  </section>
</div>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<?php
include("footers.php");
?>