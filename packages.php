<!-- || HEADER || -->
<?php include "./includes/header.php"; ?>

<!-- || DB ||  -->
<?php include "./includes/db.php"; ?>

<!-- || NAVIGATION || -->
<?php include "./includes/navigation.php"; ?>

<style>
  .btn {
    width: 40% !important;
    text-align: left;
    margin-bottom: 1rem;
  }
  .package-list ul li {
    list-style-type: none;
  }
  a {
    text-decoration: none;
  }
</style>

<!-- Page Content -->
<div class="container" style="margin: 0 auto !important;">

    <div class="row">
<img src="./images/Wedding-Venue-Banner-6.jpg" style="height: 40vh; width: 70vw" alt="" class="img-responsive">
<!-- Blog Entries Column -->
<div class="col-md-8">
  <h2>BOOKING TERMS & CONDITIONS</h2>
  <ul>
    <li> All venues are non smoking (PhP 15,000 - penalty). </li> 
    <li> All bookings waiting for swab test results are pre-arranged and no last minute. </li> 
    <li> All requests are subject to availability upon check in. </li> 
    <li> All bookings once approrved cannot be modified</li> 
    <li> In compliance with the health and safety protocols imposed by the government, there will be no venue cleaning while the guest is still in-house thus, guest is responsible for the cleanliness and tidiness of the venue during use. All basic needs are provided prior the arrival. </li> 
      </ul>

      <div class="package-list" style="height: 50vh;">
      <h2>Our Packages</h2>
        <ul>
          <li><a href="./packages/wedding_package.php" class="btn btn-primary">Wedding Packages</a></li>
          <li><a href="./packages/kiddie_package.php" class="btn btn-primary">Kiddie Party Packages</a></li>
          <li><a href="./packages/debut_package.php" class="btn btn-primary">Debut Packages</a></li>
          <li><a href="./packages/social_party_package.php" class="btn btn-primary">Social Party Package</a></li>
        </ul>

      </div>

<!-- <hr> -->

</div>

<!-- Blog Sidebar Widgets Column -->
<?php //include "./includes/sidebar.php"; ?>

</div>
<!-- /.row -->

<hr>

<?php include "./includes/footer.php"; ?>
