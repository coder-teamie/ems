<!-- || HEADER || -->
<?php include "./includes/admin_header.php"; ?>

<?php

    if($_SESSION['user_role'] == 'customer'){

        include "./includes/client_admin_navigation.php";

    } 
    
    else{

?>

<div id="wrapper">

<!-- Navigation -->
<?php include  "./includes/admin_navigation.php"; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">

                <h1 class="page-header">
                    Welcome to Admin, 
                    <small style="text-transform: capitalize;"><?php echo $_SESSION['username']; ?></small>
                </h1>

            </div>
        </div>
        <!-- /.row -->




<div class="row">
<div class="col-lg-3 col-md-6">
<div class="panel panel-primary">
<div class="panel-heading">
    <div class="row">
        <div class="col-xs-3">
            <i class="fa fa-file-text fa-5x"></i>
        </div>
        <div class="col-xs-9 text-right">

        <?php
            $query = "SELECT * FROM posts ";
            $select_all_posts = mysqli_query($connection,$query);
            $post_count = mysqli_num_rows($select_all_posts);
            
            echo "<div class='huge'>{$post_count}</div>";
        ?>
            <div>Posts</div>
        </div>
    </div>
</div>
<a href="./posts.php">
    <div class="panel-footer">
        <span class="pull-left">View Details</span>
        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
        <div class="clearfix"></div>
    </div>
</a>
</div>
</div>

<div class="col-lg-3 col-md-6">
<div class="panel panel-green">
<div class="panel-heading">
    <div class="row">
        <div class="col-xs-3">
            <i class="far fa-calendar-alt fa-5x"></i>
        </div>
        <div class="col-xs-9 text-right">

        <?php
            $query = "SELECT * FROM bookings ";
            $select_all_bookings = mysqli_query($connection,$query);
            $bookings_count = mysqli_num_rows($select_all_bookings);
            
            echo "<div class='huge'>{$bookings_count}</div>";
        ?>
        <div>Bookings</div>
        </div>
    </div>
</div>
<a href="bookings.php">
    <div class="panel-footer">
        <span class="pull-left">View Details</span>
        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
        <div class="clearfix"></div>
    </div>
</a>
</div>
</div>

<div class="col-lg-3 col-md-6">
<div class="panel panel-yellow">
<div class="panel-heading">
    <div class="row">
        <div class="col-xs-3">
            <i class="fa fa-user fa-5x"></i>
        </div>
        <div class="col-xs-9 text-right">

        <?php
            $query = "SELECT * FROM users ";
            $select_all_users = mysqli_query($connection,$query);
            $users_count = mysqli_num_rows($select_all_users);
            
            echo "<div class='huge'>{$users_count}</div>";
        ?>
            <div> Users</div>
        </div>
    </div>
</div>
<a href="users.php">
    <div class="panel-footer">
        <span class="pull-left">View Details</span>
        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
        <div class="clearfix"></div>
    </div>
</a>
</div>
</div>

<div class="col-lg-3 col-md-6">
<div class="panel panel-red">
<div class="panel-heading">
    <div class="row">
        <div class="col-xs-3">
            <i class="fa fa-list fa-5x"></i>
        </div>
        <div class="col-xs-9 text-right">

            <?php
            $query = "SELECT * FROM categories ";
            $select_all_categories = mysqli_query($connection,$query);
            $categories_count = mysqli_num_rows($select_all_categories);
            
            echo "<div class='huge'>{$categories_count}</div>";
        ?>
            <div>Event Categories</div>
        </div>
    </div>
</div>
<a href="categories.php">
    <div class="panel-footer">
        <span class="pull-left">View Details</span>
        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
        <div class="clearfix"></div>
    </div>
</a>
</div>
</div>
</div>
<!-- /.row -->

<?php



$query = "SELECT * FROM posts WHERE post_status = 'published' ";
$select_all_published_posts = mysqli_query($connection,$query);
$post_published_count = mysqli_num_rows($select_all_published_posts);

$query = "SELECT * FROM posts WHERE post_status = 'draft' ";
$select_all_draft_posts = mysqli_query($connection,$query);
$post_draft_count = mysqli_num_rows($select_all_draft_posts);

$query = "SELECT * FROM bookings WHERE booking_status = 'Approved' ";
$approved_bookings = mysqli_query($connection,$query);
$approved_bookings_count = mysqli_num_rows($approved_bookings);

// $query = "SELECT * FROM bookings WHERE booking_status = 'Completed' ";
// $pending_bookings = mysqli_query($connection,$query);
// $completed_bookings_count = mysqli_num_rows($pending_bookings);

$query = "SELECT * FROM bookings WHERE booking_status = 'Pending' ";
$pending_bookings = mysqli_query($connection,$query);
$pending_bookings_count = mysqli_num_rows($pending_bookings);

$query = "SELECT * FROM users WHERE user_role = 'employee' ";
$select_all_employees = mysqli_query($connection,$query);
$employee_count = mysqli_num_rows($select_all_employees);

$query = "SELECT * FROM users WHERE user_role = 'customer' ";
$select_all_customers = mysqli_query($connection,$query);
$customer_count = mysqli_num_rows($select_all_customers);

?>

<div class="row">

<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
        ['Data', 'Count'],

        <?php
            $elememt_text = ['All Posts','Active Posts','Draft Posts', 'Bookings', 'Approved Bookings', 'Pending Bookings', 'Users', 'Employees', 'Customers', 'Categories'];
            $elememt_count = [$post_count, $post_published_count, $post_draft_count, $bookings_count, $approved_bookings_count, $pending_bookings_count, $users_count, $employee_count, $customer_count, $categories_count];

            for($i = 0; $i < 10; $i++){
                echo "['{$elememt_text[$i]}'" . "," . "{$elememt_count[$i]}],";
            }


        ?>
        ]);

        var options = {
        chart: {
            title: '',
            subtitle: '',
        }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
    </script>

    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>

</div>

    </div>
    <!-- /.container-fluid -->

</div>
        <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

    <?php }
?>



<!-- || FOOTER || -->
<?php include "./includes/admin_footer.php"; ?>