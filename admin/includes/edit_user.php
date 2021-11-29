<?php

  if(isset($_GET['edit_user'])){

    $the_user_id = $_GET['edit_user'];

  $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
  $select_users_query = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_users_query)){
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
  }

?>

<?php

  if(isset($_POST['edit_user'])){

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];

    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    if(!empty($user_password)){
      
      $query = "SELECT user_password FROM users WHERE user_id = $the_user_id ";
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
    $query .= "user_role = '{$user_role}', ";
    $query .= "username = '{$username}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_password = '{$hashed_password}' ";
    $query .="WHERE user_id = {$the_user_id} ";

    $edit_user_query = mysqli_query($connection,$query);
    confirm_query($edit_user_query);

    header("Location: users.php");

    echo "User Updated!" . " <a href='users.php'><strong>View Users?</strong></a>";
    }

  }

} else {
  header("Location: index.php");
}


?>

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
    <select name="user_role" id="">
      <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>

    <?php

      if($user_role == 'admin'){
        echo "<option value='employee'>Employee</option>";
      } else {
        echo "<option value='admin'>Admin</option>";
      }

    ?>

      
    </select>
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
      <input type="submit" name="edit_user" class="btn btn-primary" value="Update User">
    </div>
  </div>


</form>