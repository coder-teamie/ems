<?php
  if(isset($_POST['create_user'])){

    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];

    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));


    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
    $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}' )";

    $create_user_query = mysqli_query($connection, $query);
    confirm_query($create_user_query);

    echo "User Created : " . " " . "<a class='btn btn-primary' href='users.php'>View Users</a>";
  }

?>

<form action="" method="post" enctype="multipart/form-data">
  
    <div class="form-group">
    <label for="user_firstname">Firstname</label>
    <input type="text" name="user_firstname" class="form-control">
  </div>
  
  <div class="form-group">
    <label for="user_lastname">Lastname</label>
    <input type="text" name="user_lastname" class="form-control">
  </div>

  <div class="form-group">
    <select name="user_role" id="">
      <option value="employee">--Select Role--</option>
      <option value="admin">Admin</option>
      <option value="employee">Employee</option>
      <option value="customer">Customer</option>
    </select>
  </div>

  <!-- Leave commented markup Wiill add image later po -->

  <!-- <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="image">
  </div> -->

  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control">
  </div>

  <div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" name="user_email" class="form-control" cols="30" rows="10">
  </div>

  <div class="form-group">
    <label for="user_password">Password</label>
    <input type="password" name="user_password" class="form-control">
  </div>

    <div class="form-group">
      <input type="submit" name="create_user" class="btn btn-primary" value="Add User">
    </div>
  </div>


</form>