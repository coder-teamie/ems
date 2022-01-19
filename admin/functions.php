<?php


# || QUERY ||
function query($query){
  global $connection;
  $result = mysqli_query($connection, $query);
  confirm_query($result);
  return $result;
}

# || FETCH RESULTS

function fetchRecords($result){
  return mysqli_fetch_array($result);
}

function count_records($result){
  return mysqli_num_rows($result);
}

# || ESCAPE ||
function escape($string){
  global $connection;
  return mysqli_real_escape_string($connection, trim($string));
}

# || CONFIRM QUERY ||
function confirm_query($result){
  global $connection;
  if(!$result){
    die("Query Failed" . mysqli_error($connection));
  }
}

# || DELETE CATEGORY ||
function delete_category(){
  global $connection;
  if(isset($_GET['delete'])){
  $cat_id =$_GET['delete'];

  $query = "DELETE FROM categories WHERE cat_id = {$cat_id} ";
  $delete_categories = mysqli_query($connection, $query);

  header("Location: categories.php");
  }
}

# || CHECKING IF LOGGED IN ||
function isLoggedIn(){
  if(isset($_SESSION['user_role'])){

    return true;

  }
    return false;

}

 # CHHECKING IF USER IS ADMIN
  function is_admin(){

    if(isLoggedIn()){

    $result = query("SELECT user_role FROM users WHERE user_id =".$_SESSION['user_id']."");

    $row = fetchRecords($result);

    if($row['user_role'] == 'admin'){

      return true;

    } else {

      return false;

    }
  }
  return false;
}

# || ADD CATEGORIES ||
function add_categories(){
  global $connection;
  
  if(isset($_POST['submit'])){
    $cat_title = $_POST['cat_title'];
    if($cat_title == '' || empty($cat_title)){
      echo "This field should not be empty";
    } 
    else{
      $query = "INSERT INTO categories(cat_title) VALUE('{$cat_title}') ";
      $create_category_query = mysqli_query($connection, $query);
      
      if(!$create_category_query){
        die("Query Failed" . mysqli_error($connection));
      }
    }
  }
}

# || FIND ALL CATEGORIES ||
function find_all_categories(){
  global $connection;

  $query = "SELECT * FROM categories";
  $select_categories = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_categories)){
      $cat_id = $row['cat_id'];
      $cat_title = $row['cat_title'];

      echo "<tr>";
      echo "<td>{$cat_id}</td>";
      echo "<td>{$cat_title}</td>";
      echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
      echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
      echo "</tr>";
    }
}

# || DELETING POSTS ||
function delete_posts () {
  global $connection;
  if(isset($_GET['delete'])){
  $delete_post_id = $_GET['delete'];
  
  $query = "DELETE FROM posts WHERE post_id = {$delete_post_id} ";
  $delete_query = mysqli_query($connection, $query);

  header("Location: posts.php");
  }
}

# || DELETING BOOKINGS ||
function delete_booking () {
  global $connection;
  if(isset($_GET['delete'])){
  $booking_id = $_GET['delete'];
  
  $query = "DELETE FROM bookings WHERE booking_id = {$booking_id} ";
  $delete_query = mysqli_query($connection, $query);

  header("Location: bookings.php");
  }
}

# || DELETING USERS ||
function delete_user () {
  global $connection;
    if(isset($_GET['delete'])){
    $delete_user_id = mysqli_real_escape_string($connection, $_GET['delete']);
    
    $query = "DELETE FROM users WHERE user_id = {$delete_user_id} ";
    $delete_query = mysqli_query($connection, $query);
  
    header("Location: users.php");
    }
}

# || SWITCH TO ADMIN ||

function switch_to_admin () {
  global $connection;

  if(isset($_GET['switch_to_admin'])){
  $user_id = $_GET['switch_to_admin'];
  $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $user_id ";
  $approve_query = mysqli_query($connection, $query);

  header("Location: users.php");
  }
}

# || SWITCH TO EMPLOYEE ||

function switch_to_employee () {
  global $connection;

  if(isset($_GET['switch_to_employee'])){
  $user_id = $_GET['switch_to_employee'];
  $query = "UPDATE users SET user_role = 'employee' WHERE user_id = $user_id ";
  $approve_query = mysqli_query($connection, $query);

  header("Location: users.php");
  }
}

# || APPROVE BOOKING ||

function approve_booking () {
  global $connection;

  if(isset($_GET['approve_booking'])){
  $booking_id = $_GET['approve_booking'];
  $query = "UPDATE bookings SET booking_status = 'Approved' WHERE booking_id = $booking_id ";
  $approve_query = mysqli_query($connection, $query);

  header("Location: bookings.php");
  }
}

# || REJECT BOOKING ||

function reject_booking () {
  global $connection;

  if(isset($_GET['reject_booking'])){
  $booking_id = $_GET['reject_booking'];
  $query = "UPDATE bookings SET booking_status = 'Rejected' WHERE booking_id = $booking_id ";
  $reject_query = mysqli_query($connection, $query);

  header("Location: bookings.php");
  }
}

# || COMPLETE BOOKING ||

function complete_booking () {
  global $connection;

  if(isset($_GET['complete_booking'])){
  $booking_id = $_GET['complete_booking'];
  $query = "UPDATE bookings SET booking_status = 'Completed' WHERE booking_id = $booking_id ";
  $complete_query = mysqli_query($connection, $query);

  header("Location: bookings.php");
  }
}

# || EDIT BOOKING ||

// function edit_booking () {
//   global $connection;

//   if(isset($_GET['edit_booking'])){
//   $booking_id = $_GET['edit_booking'];
//   $query = "UPDATE bookings SET booking_status = 'Approved' WHERE booking_id = $booking_id ";
//   $approve_query = mysqli_query($connection, $query);

//   header("Location: bookings.php");
//   }
// }

?>