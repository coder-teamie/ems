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

    $query = "SELECT * FROM categories LIMIT 5";
    $select_all_categories = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_all_categories)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
    }

?>

        <li>
            <a href="./admin/index.php">Admin</a>
        </li>
        <li>
            <a href="registration.php">Registration</a>
        </li>
        <li >
            <a href="./admin/bookings.php?source=add_booking" class="book-now">Book Now</a>
        </li>
    </ul>
</div>
<!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>