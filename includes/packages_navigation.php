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
    <a class="navbar-brand" href="../index.php" style="color: white;">BackRoads Tour Company</a>
</div>


<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav">
    <li>
        <a href="/event_management_system/index.php">Home</a>
    </li>

    <?php

    // $stmt = "SELECT * FROM categories LIMIT 4";
    // $select_all_categories = mysqli_query($connection, $stmt);

    // while($row = mysqli_fetch_array($select_all_categories)){
    //     $cat_id = $row['cat_id'];
    //     $cat_title = $row['cat_title'];

    //     echo "<li><a href='../category.php?category=$cat_id'>{$cat_title}</a></li>";
    // }

?>

<?php 
// if(isset($_SESSION['user_role'])){

//     echo "<li>";
//         echo "<a href='./admin/index.php'>Admin</a>";
//     echo "</li>";
// } 


?>
<li>
    <a href="../includes/contact.php">Contact Us</a>
</li>

<li>
    <a href="./includes/about.php">About Us</a>
</li>

<li>
    <a href="/event_management_system/packages.php">Packages</a>
</li>
<?php if(isLoggedIn()): ?>

    <li>
        <a href="/event_management_system/admin">Admin</a>
    </li>

    <li>
        <a href="/event_management_system/includes/logout.php">Logout</a>
    </li>


<?php else: ?>

    <!-- <li>
        <a href="/event_management_system/includes/login">Login</a>
    </li> -->

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