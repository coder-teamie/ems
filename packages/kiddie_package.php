<?php
if(session_status() == PHP_SESSION_NONE) session_start();
?>
 <!-- || DB ||  -->
 <?php include "../includes/db.php"; ?>

 <!-- || HEADER || -->
<?php include "../includes/packages_header.php";?>


<?php include "../admin/functions.php"; ?>

<!-- || NAVIGATION || -->
<?php include "../includes/packages_navigation.php"; ?>

<!-- Page Content -->
<div class="container" style="margin: 0 auto !important;">

    <div class="row">
        <div class="package-row">

        
      <img class="img-responsive" src="../images/kiddie-party-package-cebu.jpg" sstyle="height: 40%; width: 100%" alt="">

<!-- Blog Entries Column -->
<div class="col-md-8">
 
 
 <!-- Packages -->
    <div class="packages" style="margin: 0 auto !important;">

    <!-- Wedding Package -->
    <div class="wedding-package">
        
    <h2 class="" style="color: #961935;">KIDDIE PARTY PACKAGE</h2>
    <p>BackRoads offers affodable Kiddie Party Package that your kids and guests will surely enjoy. Make your kid's special day memorable. </p>
    <p> Contact us to book now!</p>
  <br><br>

    <img class="img-responsive" src="../images/kiddie-party-package.jpg" alt="">

<?php

    if(isLoggedIn()){

        echo '<a href="../admin/client_calendar.php"  class="btn btn-primary">Book Now</a>';

    } else {

        echo '<a href="../index.php"  class="btn btn-primary">Book Now</a>';

    }

?>
    <hr>
    <br>


</div>
</div>
<!-- End of Packages -->

<hr>
<br>
    <a href="../packages.php" class="btn btn-primary" style="text-align: left">Back to Packages</a>
</div>
</div>
</div>
<!-- /.row -->

<hr>

<?php include "../includes/package_footer.php"; ?>