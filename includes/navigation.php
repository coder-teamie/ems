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

    <?php

    $query = "SELECT * FROM categories LIMIT 4";
    $select_all_categories = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_all_categories)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
    }

?>

<?php 
// if(isset($_SESSION['user_role'])){

//     echo "<li>";
//         echo "<a href='./admin/index.php'>Admin</a>";
//     echo "</li>";
// } 


?>
<li>
        <a href="/ems/packages.php">Packages</a>
    </li>

<?php if(isLoggedIn()): ?>

    <li>
        <a href="/ems/admin">Account</a>
    </li>

    <li>
        <a href="/ems/includes/logout.php">Logout</a>
    </li>


<?php else: ?>

    <!-- <li>
        <a href="/ems/includes/login">Login</a>
    </li> -->

    <li class="<?php echo $registration_class; ?>">
        <a href="/ems/registration.php">Registration</a>
    </li>

<?php endif; ?>
    </ul>
</div>
<!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>