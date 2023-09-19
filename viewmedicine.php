<?php
session_start();
include("headers.php");
 
if (isset($_GET['delid'])) {
  $sql = "DELETE FROM medicine WHERE medicineid='$_GET[delid]'";
  $qsql = mysqli_query($con, $sql);
  if (mysqli_affected_rows($con) == 1) {
    echo "<script>alert('Medicine redcord deleted successfully..');</script>";
  }
}
?>

<div class="container">
  <br>
  <h2>View medicine list</h2>
  <br>

  <section class="container">
    <h2>Search medicine - <input type="search" class="light-table-filter" data-table="table" placeholder="Filter"/></h2>


    <table class="table">
      <thead>
        <tr>
          <th>Medicine name</th>
          <th>Medicine cost</th>
          <th>description</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>

        <?php
        $sql = "SELECT * FROM medicine";
        $qsql = mysqli_query($con, $sql);
        while ($rs = mysqli_fetch_array($qsql)) {
          echo "<tr>
          <td>$rs[medicinename]</td>
          <td>$rs[medicinecost]</td>
          <td>$rs[description]</td>
			 <td>$rs[status]</td>
			 <td>
			  <a href='medicine.php?editid=$rs[medicineid]'>Edit</a> | <a href='viewmedicine.php?delid=$rs[medicineid]'>Delete</a> </td>
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