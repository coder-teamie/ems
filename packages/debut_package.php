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

        
        <img class="img-responsive" src="../images/affordable-debut-package-cebu-.jpg" style="height: 40%; width: 100%" alt="">

<!-- Blog Entries Column -->
<div class="col-md-8">
 
 
 <!-- Packages -->
    <div class="packages" style="margin: 0 auto !important;">

    <!-- Wedding Package -->
    <div class="wedding-package">
    <h2 class="" style="color: #961935;">DEBUT PACKAGE</h2>
    <p>Celebrate your teen's milestone with us.</p>
    <p>BackRoads Tours offers affordable Debut Package for your daughter's most special day.</p>
    <p>Contact us to book now!</p>
  <br><br>

    <h4 style="text-decoration: underline; font-weight: bolder;"> 1). Debut Package A | P155,000 for 120 persons</h4>
    <img class="img-responsive" src="../images/DEBUT-PACKAGE-A.jpg" alt="">

<?php

    if(isLoggedIn()){

        echo '<a href="../admin/client_calendar.php"  class="btn btn-primary">Book Now</a>';

    } else {

        echo '<a href="../index.php"  class="btn btn-primary">Book Now</a>';

    }

?>
    <hr>
    <br>

    <h4 style="text-decoration: underline; font-weight: bolder;">2). Debut Package B | P120,000 for 100 persons</h4>
    <img class="img-responsive" src="../images/DEBUT-PACKAGE-B.jpg" alt="">
    
    
<?php

    if(isLoggedIn()){

        echo '<a href="../admin/client_calendar.php"  class="btn btn-primary">Book Now</a>';

    } else {

        echo '<a href="../index.php"  class="btn btn-primary">Book Now</a>';

    }

?>


    <hr>
    <br>

    <h4 style="text-decoration: underline; font-weight: bolder;">3). Debut Package C | P68,000 for 100 persons</h4>
    <img class="img-responsive" src="../images/DEBUT-PACKAGE-C.jpg" alt="">

<?php

    if(isLoggedIn()){

        echo '<a href="../admin/client_calendar.php"  class="btn btn-primary">Book Now</a>';

    } else {

        echo '<a href="../index.php"  class="btn btn-primary">Book Now</a>';

    }

?>


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


