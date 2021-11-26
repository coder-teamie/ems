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
}
?>

<?php

if(isset($_POST['edit_user'])){
  $user_firstname = $_POST['user_firstname'];
  $user_lastname = $_POST['user_lastname'];
  $user_email = $_POST['user_email'];
  $user_password = $_POST['user_password'];
  
  $query = "SELECT randSalt FROM users ";
  $select_randSalt = mysqli_query($connection, $query);
  
  if(!$select_randSalt){
    die("QUERY FAILED" . mysqli_error($connection));;
  }
  
  $row = mysqli_fetch_array($select_randSalt);
  $salt = $row['randSalt'];
  $hashed_password = crypt($user_password, $salt);
  
  $query = "UPDATE users SET ";
  $query .= "user_firstname = '{$user_firstname}', ";
  $query .= "user_lastname = '{$user_lastname}', ";
  $query .= "username = '{$username}', ";
  $query .= "user_email = '{$user_email}', ";
  $query .= "user_password = '{$hashed_password}' ";
  $query .= "WHERE username = '{$username}' ";
  
  $edit_profile_query  = mysqli_query($connection, $query);
  confirm_query($edit_profile_query);
}

?>

<!-- NAVIGATION -->
<?php include "./includes/client_admin_navigation.php" ?>

<div id="page-wrapper">

  <div class="container-fluid">

  <form action="" method="post" enctype="multipart/form-data">
  
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