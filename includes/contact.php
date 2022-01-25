<?php
if(session_status() == PHP_SESSION_NONE) session_start();
?>

<?php include "./db.php"; ?>
<?php include "./packages_header.php"; ?>
<?php include "../admin/functions.php"; ?>
<?php include "./packages_navigation.php"; ?>

<!-- 
<div class="row"> -->
 <div class="container" style="margin: 0 auto !important;">

    <!-- <div class="row"> -->

    <!-- Blog Entries Column -->
    <div class="form-container">
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
        <button type="submit" name="create_inquiry" class="btn btn-primary submit-btn">Submit</button>
    </form>
    </div>

<!-- </div> -->

</div>




<footer>
            <!-- <div class="row"> -->
                <!-- <div class="col-lg-12"> -->
                    <!-- <div class="flex-container"> -->
                        <!-- <div class="footer-text"> -->
                            <p>Copyright &copy; BackRoads Tour Company <span class="date"></span></p>
                        </div>
<script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <script src="../admin/js/scripts.js"></script>

    <script src="../admin/js/summernote.min.js"></script>

    </footer