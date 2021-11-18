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
      <small>User</small>
    </h1>

  <div class="col-xs-6">

<!-- || ADD CATEGORIES || -->
<?php add_categories(); ?>

<form action="" method="post">
          
  <div class="form-group">
    <label for="cat_title">Add Category</label>
    <input class="form-control" type="text" name="cat_title">
  </div>

  <div class="form-group">
    <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
  </div>

</form>

<!-- || UPDATE CATEGORIES || -->
<?php 
  if(isset($_GET['edit'])){
    $cat_id = $_GET['edit'];
    include "includes/update_categories.php";
  }
?>

</div>

  <div class="col-xs-4">

  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Category Title</th>
      </tr>
    </thead>
    <tbody>

<!-- || FIND ALL CATEGORIES || -->
<?php find_all_categories(); ?>

<!-- || DELETE CATEGORIES || -->
<?php delete_category(); ?>

    </tbody>
  </table>

</div>

</div>
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