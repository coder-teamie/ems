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
  
<?php

  if(isset($_GET['source'])){
    $source = $_GET['source'];
  }else{
    $source = '';
  }

  switch($source){
    case 'add_venue':
      include "includes/add_venues.php";
      break;

    case 'edit_venue':
      include "includes/edit_venue.php";
      break;

    default:
      include "includes/view_all_venues.php";
      break;
  }

?>


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