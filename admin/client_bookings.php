<?php include "./includes/admin_header.php"; ?>

<!-- <div id="wrapper"> -->

<!-- Navigation -->
<?php include "./includes/client_admin_navigation.php" ?>

<div id="page-wrapper">

<div class="container-fluid">


<?php
  if(isset($_GET['source'])){
      $source = $_GET['source'];
  } else{
    $source = '';
  }

  switch($source){
    case 'add_booking':
      include "includes/client_booking_form.php";
      break;

    case 'edit_booking':
      include "includes/client_edit_booking.php";
      break;

    default:
    include "includes/view_all_bookings.php";
    break;
    }

  ?>

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "./includes/admin_footer.php" ?>