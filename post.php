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
