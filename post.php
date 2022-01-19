<!-- || HEADER || -->
<?php include "./includes/header.php"; ?>

<!-- || DB ||  -->
<?php include "./includes/db.php"; ?>

<!-- || NAVIGATION || -->
<?php include "./includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container" style="margin: 0 auto !important;">

    <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-8">

    <?php

    if(isset($_GET['p_id'])){
        $the_post_id = $_GET['p_id'];
    
    $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
    $select_all_posts_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_all_posts_query)){
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = substr($row['post_content'],0,150);
        $post_tags = $row['post_tags'];

    ?>

        <!-- <h1 class="page-header">
            Page Heading
            <small>Secondary Text</small>
        </h1> -->

        <!-- First Blog Post -->
        <h2>
            <a href="#"><?php echo $post_title; ?></a>
        </h2>
        <p class="lead">
            by <a href="index.php"><?php echo $post_author; ?></a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
        <hr>
        <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
        <hr>
        <p><?php echo $post_content; ?></p>
        <a class="btn btn-primary" href="#contact-form">Inquire Now<span class="glyphicon glyphicon-chevron-right"></span></a>


<?php } 
}
else {
    header("Location: index.php");
}

?>

<style>
.package-details {
    margin-top: 5rem;
    margin-left: -3rem;
}
.heading{
    font-weight: bold !important;
}
.sub{
    font-weight: lighter !important;
}
</style>

<br><br>

<p>Check out our awesome <a href="./packages.php">packages here</a></p>

<br><br><br>

<!-- <ul class="package-details">
    <p>Available on our Basic, Premium and Deluxe Packages</p>
    <li class="heading">FULL CATERING SETUP 100 PAX
        <ul class="sub">
            <li>Choice of Pork, Chicken, Fish, Pasta, Veggie, Rice, Desert and Drinks</li>
            <li>Classic Cake, Wine, Dove, Thematic tables and chairs, Centerpieces</li>
            <li>Couple Couch and Backdrop</li>
        </ul>
    </li>
    <li class="heading">BASIC PHOTO & VIDEO SERVICES
        <ul class="sub">
            <li>Full Photo and Video Coverage</li>
            <li>3min HD Video Highlights</li>
            <li>Prenuptial Shoot / E-sesssion</li>
        </ul>
    </li>
    <li class="heading">BASIC LIGHTS & SOUNDS
        <ul class="sub">
            <li>PA System, Projector w/ Wide-screen</li>
        </ul>
    </li>
    <li class="heading">OTD COORDINATION + EMCEE
        <ul class="sub">
            <li>(1) Event Specialist (1) Couple Manager</li>
            <li>(1) Junior Cordinator, Program Conceptualization</li>
            <li>Wedding Checklist RSVP Management</li>
            <li>Equipped w/ Two-way radio</li>
        </ul>
    </li>
    <li class="heading">FLOWERS FOR ENTOURAGE
        <ul class="sub">
            <li>(1) Bridal Bouquet, (1) Groom's Buttonaire,</li>
            <li>(5) Corsage for Female Sponsors, (5) Buttonaire for Male Sponsors,</li>
            <li>(5) Mini Bouquet for Bridesmaids, (5) Buttonaire for Groomsmen,</li>
            <li>(3) Flower basket with Loose petals (1) Bridal Car Bouquet</li>
        </ul>
    </li>
    <li class="heading">INVITATION & SOUVENIRS
        <ul class="sub">
            <li>50 pcs classic invitation, 3 inserts, baronial envelope, Maxi wax seal</li>
            <li>50 pcs souvenirs: Wooden Coaster, Tea Bottles, Customized Soap</li>
        </ul>
    </li>
</ul> -->


<?php
if(isset($_POST['create_inquiry'])){

    $the_post_id = $_GET['p_id'];

    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_inquiry = mysqli_real_escape_string($connection, $_POST['customer_inquiry']);

    if(!empty($customer_name) && !empty($customer_email) &&!empty($customer_inquiry)) {
    

    $query = "INSERT INTO inquiries(customer_name, customer_email, customer_inquiry, inquiry_status, inquiry_date) ";

    $query .= "VALUES('{$customer_name}', '{$customer_email}', '{$customer_inquiry}', 'in-review', now())";
    
    $create_inquiry_query = mysqli_query($connection, $query);

    if(!$create_inquiry_query){
        die("QUERY FAILED" . mysqli_error($connection));
    }
}
    else{
        echo "<script> alert('Fields cannot be empty'); </script>";
    }

    

}
?>

<div class="well" id="contact-form">
<h4>Contact Us </h4>
<form action="" role="form" method="post">
    <label for="author">Name</label>
    <div class="form-group">
        <input type="text" name="customer_name" class="form-control">
    </div>

    <label for="email">Email</label>
    <div class="form-group">
        <input type="email" name="customer_email" class="form-control" >
    </div>

    <label for="comment">Description</label>
    <div class="form-group">
        <textarea class="form-control" id="summernote" name="customer_inquiry" rows="3"></textarea>
    </div>
        <button type="submit" name="create_inquiry" class="btn btn-primary">Submit</button>
    </form>
</div>









<!-- Blog Comments -->

                <!-- Comments Form -->
                <!-- <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div> -->

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                <!-- <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div> -->

                <!-- Comment -->
                <!-- <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4> -->
                        <!-- Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. -->
                        <!-- Nested Comment -->
                        <!-- <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div> -->
                        <!-- End Nested Comment -->
                    <!-- </div>
                </div> -->

        
        <hr>

    </div>

<!-- Blog Sidebar Widgets Column -->
<?php //include "./includes/sidebar.php"; ?>

</div>
<!-- /.row -->

<hr>

<?php include "./includes/footer.php"; ?>
