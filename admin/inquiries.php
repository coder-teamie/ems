<!-- || HEADER || -->
<?php include "./includes/admin_header.php"; ?>

<div id="wrapper">

<!-- || NAVIGATION || -->
<?php include  "./includes/admin_navigation.php"; ?>

<div id="page-wrapper">

  <div class="container-fluid">

<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">
    Welcome to Admin
    <small style="text-transform: capitalize;"><?php echo $_SESSION['username']; ?></small>
  </h1>

<table class="table table-bordered table-hover">
  <thead>
  <tr>
    <th>ID</th>
    <th>Name of Client</th>
    <th>Email</th>
    <th>Concern</th>
    <th>Inquiry Status</th>
    <th>Inquiry Date</th>
    <th>Resolved</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody>

<?php

  $query = "SELECT * FROM inquiries ";
  $select_inquiries = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_inquiries)){
  $inquiry_id = $row['inquiry_id'];
  $customer_name = $row['customer_name'];
  $customer_email = $row['customer_email'];
  $customer_inquiry = $row['customer_inquiry'];
  $inquiry_status = $row['inquiry_status'];
  $inquiry_date = $row['inquiry_date'];

  echo "<tr>";
    echo "<td>$inquiry_id</td>";
    echo "<td>$customer_name</td>";
    echo "<td>$customer_email</td>";
    echo "<td>$customer_inquiry</td>";
    echo "<td>$inquiry_status</td>";
    echo "<td>$inquiry_date</td>";
    
# || ACTION BUTTONS ||
  echo "<td><a href='inquiries.php?resolved_inquiry={$inquiry_id}'>Resolved</a></td>";
  echo "<td><a href='inquiries.php?delete={$inquiry_id}'>Delete</a></td>";
  echo "</tr>";
  }
?>


</tr>
</tbody>
</table>

<?php

if(isset($_GET['resolved_inquiry'])){
  $inq_id = $_GET['resolved_inquiry'];

  $query = "UPDATE inquiries SET inquiry_status = 'resolved' WHERE inquiry_id = $inq_id ";
  $inquiry_status_query = mysqli_query($connection, $query);

  header("Location: inquiries.php");
}

?>

<!-- || SWITCH TO ADMIN || -->
<?php switch_to_admin(); ?>

<!--  || SWITCH TO EMPLOYEE || -->
<?php switch_to_employee(); ?>

<!-- || DELETE USER || -->
<?php delete_user(); ?>

</div>
<!-- /.row -->

  </div>
  <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<!-- || FOOTER || -->
<?php include "./includes/admin_footer.php"; ?>