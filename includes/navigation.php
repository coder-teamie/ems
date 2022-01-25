<?php
if(session_status() == PHP_SESSION_NONE) session_start();
?>
<?php include "./admin/functions.php"; ?>
<style>
.book-now {
    background: white;
    color: black !important;
    border-radius: 20px;
    padding: 5px 15px !important;
    margin-top: 10px;
    transition: all 300ms ease-in-out;
}
.book-now:hover{
    transform: scale(1.1);
    background: white !important;
    color: black !important;
}
</style>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">


<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php" style="color: white;">BackRoads Tour Company</a>
</div>


<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">

    <li>
        <a href="/event_management_system/index.php">Home</a>
    </li>

    <?php

    $query = "SELECT * FROM categories LIMIT 4";
    $select_all_categories = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_all_categories)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        // echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
    }

?>


<li>
    <a href="./includes/contact.php">Contact Us</a>
</li>

<li>
    <a href="./includes/about.php">About Us</a>
</li>

<li>
    <a href="/event_management_system/packages.php">Packages</a>
</li>

<?php if(isLoggedIn()): ?>

    <li>
        <a href="/event_management_system/admin">Account</a>
    </li>

    <li>
        <a href="/event_management_system/includes/logout.php">Logout</a>
    </li>


<?php else: ?>

    <!-- log in link -->
    <li>
  <a class="login" > Log In </a>

<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">

    <!-- Modal content-->
<div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Login</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
        <!-- <h4>Log in</h4> -->
        <img src="images/admin-login.jpg" class="form-img" alt="login image">

        <form action="./includes/login.php" method="post">
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Enter username">
        </div>
        <div class="input-group">
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
            <span class="input-group-btn">
            <button type="submit" class="btn btn-primary" name="login" > Log In </button>
            </span>
        </div>
        </form> 
        <!-- /.input-group -->
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>
</div>
</div>

    </li>

    <li class="<?php echo $registration_class; ?>">
        <a href="/event_management_system/registration.php">Registration</a>
    </li>

<?php endif; ?>
    </ul>
</div>
<!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Script for login modal -->
<script>
    $(".login").click(function(){
        $("#myModal").modal("show");
    })
</script>