<table class="table table-bordered table-hover">
  <thead>
  <tr>
    <th>Id</th>
    <th>Username</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Email</th>
    <th>Role</th>
    <th>Admin</th>
    <th>Employee</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody>

<?php

  $query = "SELECT * FROM users ";
  $select_users = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_users)){
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_image = $row['user_image'];
    $user_role = $row['user_role'];
  
  
  echo "<tr>";
    echo "<td>$user_id</td>";
    echo "<td>$username</td>";
    echo "<td>$user_firstname</td>";
    echo "<td>$user_lastname</td>";
    echo "<td>$user_email</td>";
    echo "<td>$user_role</td>";
    
# || ACTION BUTTONS ||
  echo "<td><a href='users.php?switch_to_admin={$user_id}'>Admin</a></td>";
  echo "<td><a href='users.php?switch_to_employee={$user_id}'>Employee</a></td>";
  echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
  echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
  echo "</tr>";
  }
?>


</tr>
</tbody>
</table>

<!-- || SWITCH TO ADMIN || -->
<?php switch_to_admin(); ?>

<!--  || SWITCH TO SUBSCRIBER || -->
<?php switch_to_employee(); ?>

<!-- || DELETE USER || -->
<?php delete_user(); ?>