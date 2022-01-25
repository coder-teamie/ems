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

    <img class="img-responsive" src="../images/wedding-reception-package-cebu-2.jpg" style="height: 40%; width: 100%" alt="">

<!-- Blog Entries Column -->
<div class="col-md-8">
    <!-- Packages -->
    <div class="packages" style="margin: 0 auto !important;">

    <!-- Wedding Package -->
    <div class="wedding-package">
    <h2 class="" style="color: #961935;">WEDDING PACKAGES</h2>
    <p>Looking for Wedding and Reception venue? We've got you! </p>
    <p>Sarrosa International Hotel offers Wedding Packages that you can choose for your special day. Select from our 3 Wedding Packages that suits your budget. Celebrate your special moment with us. Call and book with us now.</p>

    <br><br>

    <h4 style="text-decoration: underline; font-weight: bolder;"> 1). Wedding Package A | P195,000 for 150 persons</h4>
    <img class="img-responsive" src="../images/Wedding-package-A.jpg" alt="">

<?php

    if(isLoggedIn()){

        echo '<a href="../admin/client_calendar.php"  class="btn btn-primary">Book Now</a>';

    } else {

        echo '<a href="../index.php"  class="btn btn-primary">Book Now</a>';

    }

?>
    <hr>
    <br>

    <h4 style="text-decoration: underline; font-weight: bolder;">2). Wedding Package B | P145,000 for 100 persons</h4>
    <img class="img-responsive" src="../images/Wedding-package-B.jpg" alt="">
    
    
<?php

    if(isLoggedIn()){

        echo '<a href="../admin/client_calendar.php"  class="btn btn-primary">Book Now</a>';

    } else {

        echo '<a href="../index.php"  class="btn btn-primary">Book Now</a>';

    }

?>


    <hr>
    <br>

    <h4 style="text-decoration: underline; font-weight: bolder;">3). Wedding Package B | P50,000 for 100 persons</h4>
    <img class="img-responsive" src="../images/Wedding-package-C.jpg" alt="">

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