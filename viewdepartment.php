<?php
session_start();
include("headers.php");
 
if (isset($_GET['delid'])) {
  $sql = "DELETE FROM department WHERE departmentid='$_GET[delid]'";
  $qsql = mysqli_query($con, $sql);
  if (mysqli_affected_rows($con) == 1) {
    echo "<script>alert('department deleted successfully..');</script>";
  }
}
?>

<div class="container">
  <br>
  <h2>View Department</h2>
  <br>
  <section class="container">
    <h2>Search Department - <input type="search" class="light-table-filter" data-table="table" placeholder="Filter" /></h2>


    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $sql = "SELECT * FROM department";
        $qsql = mysqli_query($con, $sql);
        while ($rs = mysqli_fetch_array($qsql)) {
          echo "<tr>
          <td>$rs[departmentname]</td>
          <td>$rs[description]</td>
			 <td>$rs[status]</td>
			 <td>
			  <a href='department.php?editid=$rs[departmentid]'>Edit</a>|<a href='viewdepartment.php?delid=$rs[departmentid]'>Delete</a> </td>
        </tr>";
        }
        ?>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
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