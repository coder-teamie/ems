<?php include "./includes/admin_header.php"; ?>

<?php

if(isset($_SESSION['username'])){
  
  $username = $_SESSION['username'];
  $query = "SELECT* FROM users WHERE username = '{$username}' ";
  $select_profile_query = mysqli_query($connection, $query);
  
  while($row = mysqli_fetch_array($select_profile_query)){
    
    $user_id = $row['user_id'];
    $username= $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_role = $row['user_role'];
  }

?>

<?php

if(isset($_POST['edit_user'])){
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    if(!empty($user_password)){
      
      $query = "SELECT user_password FROM users WHERE username = '{$username}' ";
      $edit_user_password_query = mysqli_query($connection, $query);

      confirm_query($edit_user_password_query);

      $row = mysqli_fetch_array($edit_user_password_query);
      $db_user_password = $row['user_password'];
      

      if($db_user_password !== $user_password){

        $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));

      }

    $query = "UPDATE users SET ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "username = '{$username}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$hashed_password}' WHERE username = '{$username}' ";

    $edit_profile_query  = mysqli_query($connection, $query);
    confirm_query($edit_profile_query);
  }
}
}
else {
  header("Location: index.php");
}

?>

<div id="wrapper">

<div id="page-wrapper">
  

  <div class="container-fluid">
    <!-- NAVIGATION -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">EMS Admin</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li><a href="../index.php">Home</a></li>


        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-transform: capitalize;"><i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                </li>
            </ul>
        </li>
    </ul>

  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
    <li>
      <a href="javascript:;" data-toggle="collapse" data-target="#bookings"><i class="fa fa-fw fa-arrows-v"></i> Bookings <i class="fa fa-fw fa-caret-down"></i></a>
      <ul id="bookings" class="collapse">
        <li>
            <a href="client_calendar.php"><i class="far fa-fw fa-calendar-alt"></i> Calender</a>
        </li>
      </ul>
</li>
<li>
        <a href="client_profile.php"><i class="fa fa-fw fa-user"></i>  Profile</a>
        </li>
    </ul>
</div>
    <!-- /.navbar-collapse -->
</nav>

  <form action="" method="post" enctype="multipart/form-data">

  <?php if(isset($_POST['edit_user'])){
    echo "<div class='alert alert-success'>User Profile Updated.</div>";
  } ?>
  
    <div class="form-group">
    <label for="user_firstname">Firstname</label>
    <input type="text" value="<?php echo $user_firstname; ?>" name="user_firstname" class="form-control">
  </div>
  
  <div class="form-group">
    <label for="user_lastname">Lastname</label>
    <input type="text" value="<?php echo $user_lastname; ?>" name="user_lastname" class="form-control">
  </div>

  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" value="<?php echo $username; ?>" name="username" class="form-control">
  </div>

  <div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" value="<?php echo $user_email; ?>" name="user_email" class="form-control" cols="30" rows="10">
  </div>

  <div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" autocomplete="off" name="user_password" class="form-control">
  </div>

    <div class="form-group">
      <input type="submit" name="edit_user" class="btn btn-primary" value="Update Profile">
    </div>
  </div>


</form>


<!-- </div>
</div> -->
</div>
</div>
<!-- </div> -->

<?php include "./includes/admin_footer.php" ?>