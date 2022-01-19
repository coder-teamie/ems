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
      <img class="img-responsive" src="../images/social-party-package-cebu.jpg" style="height: 40%; width: 100%" alt="">

<!-- Blog Entries Column -->
<div class="col-md-8">
 
 
 <!-- Packages -->
    <div class="packages" style="margin: 0 auto !important;">

    <!-- Wedding Package -->
    <div class="wedding-package" style="margin: 0 auto !important;">
      <br><br>
    <h2 class="" style="color: #961935;">SOCIAL PARTY PACKAGES</h2>
    <p>BackRoads Tours offers affodable Social Party Package that's perfect your events like Acquaintance Party, Anniversaries, Baptism, Birthday Parties, Graduation Parties, Reunion and more.</p> 
    <p>Contact us to book now!</p>
  <br><br>

    <img class="img-responsive" src="../images/Social-Packages.jpg" height="90vh" alt="">

<?php

    if(isLoggedIn()){

        echo '<a href="../admin/client_calendar.php"  class="btn btn-primary">Book Now</a>';

    } else {

        echo '<a href="../index.php"  class="btn btn-primary">Book Now</a>';

    }

?>

    <br>

</div>
</div>
<!-- End of Packages -->

<hr>
<br>
    <a href="../packages.php" class="btn btn-primary" style="text-align: left">Back to Packages</a>

</div>
</div>
<!-- /.row -->

<hr>

<?php include "../includes/package_footer.php"; ?>



