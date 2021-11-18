<?php

if(isset($_GET['b_id'])){
  $booking_id = $_GET['b_id'];
}

$query = "SELECT * FROM bookings WHERE booking_id = $booking_id ";
$select_bookings_by_id = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_bookings_by_id)){
    $booking_id = $row['booking_id'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_role = $row['user_role'];
    $user_email = $row['user_email'];
    $catering = $row['catering'];
    $event_category = $row['event_category'];
    $event_venue = $row['event_venue'];
    $event_date = $row['event_date'];
    $event_time = $row['event_time'];
    $event_duration = $row['event_duration'];
    $event_package = $row['event_package'];

  }

  if(isset($_POST['update_booking'])){
    
    $user_firstname = ['user_firstname'];
    $user_lastname = ['user_lastname'];
    $user_role = ['user_role'];
    $user_email = ['user_email'];
    $catering = ['catering'];
    $event_category = ['event_category'];
    $event_venue = ['event_venue'];
    $event_date = ['event_date'];
    $event_time = ['event_time'];
    $event_duration = ['event_duration'];
    $event_package = ['event_package'];

    $query = "UPDATE bookings SET ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = {$user_lastname}, ";
    $query .= "user_role =  {$user_role}, ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "catering = '{$catering}', ";
    $query .= "event_category = '{$event_category}', ";
    $query .= "event_venue = '{$event_venue}', ";
    $query .= "event_date = '{$event_date}', ";
    $query .= "event_time = '{$event_time}', ";
    $query .= "event_duration = '{$event_duration}', ";
    $query .= "event_package = '{$event_package}' ";
    $query .= "WHERE post_id = {$booking_id} ";

    $update_booking = mysqli_query($connection,$query);
    confirm_query($update_booking);

    echo "<p class='bg-success'>Booking Updated. </a> or <a href='./bookings.php' style='font-weight: bold;'> View Booking / Edit More Bookings </a>
    </p>";
  }

?>

<form action="" method="post">
  
    <div class="form-group">
    <label for="user_firstname">Firstname</label>
    <input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname; ?>">
  </div>
  
  <div class="form-group">
    <label for="user_lastname">Lastname</label>
    <input type="text" name="user_lastname" class="form-control" value="<?php echo $user_lastname; ?>">
  </div>

  <div class="form-group">
    <label for="user_role">User Role: </label>
    <select name="user_role" class="form-control" id="">
      <?php echo "<option value='{$user_role}'>{$user_role}</option>" ?>;

      <?php
        if($user_role == "admin"){
          echo "<option value='employee'>Employee</option>";
          echo "<option value='customer'>Customer</option>";
        } 
        else if($user_role == "employee"){
          echo "<option value='admin'>Admin</option>";
          echo "<option value='customer'>Customer</option>";
        }
        else{
          echo "<option value='employee'>Employee</option>";
          echo "<option value='admin'>Admin</option>";

        }
      ?>

    </select>
  </div>

  <!-- <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="image">
  </div> -->
  
  <!-- <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control">
  </div> -->
  
  <div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" name="user_email" class="form-control" cols="30" rows="10" value="<?php echo $user_email; ?>">
  </div>

  <div class="form-group">
    <label style="font-weight: bold;">Catering Services: </label>
    <select name="catering" id="catering">
      <option value="<?php echo $catering; ?>"><?php echo $catering; ?></option>
    <?php
      if($catering == "yes"){
        echo "<option value='no'>No</option>";
      }else{
        echo "<option value='yes'>Yes</option>";
      }
    ?>
    </select>
  </div>

  <div class="form-group">
    <label for="event_category">Event Category(Choose One): </label>
  <select name="event_category" class="form-control" id="post_category">
    <?php
    echo "<option value='{$event_category}'>{$event_category}</option>";
    ?>

<?php

  $query = "SELECT * FROM categories";
  $select_categories = mysqli_query($connection, $query);

  confirm_query($select_categories);

  while($row = mysqli_fetch_assoc($select_categories)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<option value='{$cat_title}'>{$cat_title}</option>";
  }
?>
</select>
</div>

<div class="form-group">
    <label for="event_venue">Event Venue: </label>
  <select name="event_venue" class="form-control" id="post_category">
    <?php
    echo "<option value='{$event_category}'>{$event_category}</option>";
    ?>

<?php

  $query = "SELECT * FROM venue";
  $select_venues = mysqli_query($connection, $query);

  confirm_query($select_venues);

  while($row = mysqli_fetch_assoc($select_venues)){
    $venue_id = $row['venue_id'];
    $venue_title = $row['venue_title'];

    echo "<option value='{$venue_title}'>{$venue_title}</option>";
  }
?>
</select>
</div>

<div class="form-group">
  <label for="event_date">Event Date: </label>
  <input type="date" class="form-control" name="event_date" id="" value="<?php echo $event_date; ?>">
</div>

<div class="form-group">
  <label for="event_time">Event Time: </label>
  <input type="time" class="form-control" name="event_time" value="<?php echo $event_time; ?>">
</div>

  

  <div class="form-group">
    <label for="event_duration">Event Duration: </label>
    <select name="event_duration" class="form-control" id="">
      <option value="<?php echo $event_duration ?>"><?php echo $event_duration ?></option>

      <?php
        if($event_duration == "1hr"){
          echo "<option value='2hrs'>2 Hours | $700</option>";
          echo "<option value='4hrs'>4 Hours | $850</option>";
          echo "<option value='6hrs'>6 Hours Maximum | $1200</option>";
        }
        else if($event_duration == "2hr"){
          echo "<option value='1hr'>1 Hour Mininum | $500</option>";
          echo "<option value='4hrs'>4 Hours | $850</option>";
          echo "<option value='6hrs'>6 Hours Maximum | $1200</option>";
        }
        else if($event_duration == "4hrs"){
          echo "<option value='1hr'>1 Hour Mininum | $500</option>";
          echo "<option value='2hrs'>2 Hours | $700</option>";
          echo "<option value='6hrs'>6 Hours Maximum | $1200</option>";
        }
        else{
          echo "<option value='1hr'>1 Hour Mininum | $500</option>";
          echo "<option value='2hrs'>2 Hours | $700</option>";
          echo "<option value='4hrs'>4 Hours | $850</option>";
        }
      ?>
    </select>
  </div>

  <div class="form-group">
    <label for="event_package">Event Packages: </label>
    <select name="event_package" class="form-control" id="">
      <option value="<?php echo $event_package  ?>"><?php echo $event_package  ?></option>

      <?php
      if($event_package == 'Basic'){

        echo "<option value='Premium'>Premium - 3 Hours + 1 Hour (Everything in Basic + Red Carpet) | $2500 </option>";
        echo "<option value='Deluxe'>Deluxe - 4 Hours + 1 Hour (Everything in Premium + Valet Parking + Extreme Security Protocol) | $3000 </option>";
      } 
      else if($event_package == "Premium"){
        echo " <option value='Basic'>Basic - 2 Hours + 30mins (Catering Service + Event Host + Video Recording) | $2000 </option>";
        echo "<option value='Deluxe'>Deluxe - 4 Hours + 1 Hour (Everything in Premium + Valet Parking + Extreme Security Protocol) | $3000 </option>";
      } else{
        echo " <option value='Basic'>Basic - 2 Hours + 30mins (Catering Service + Event Host + Video Recording) | $2000 </option>";
        echo "<option value='Premium'>Premium - 3 Hours + 1 Hour (Everything in Basic + Red Carpet) | $2500 </option>";
      }
      ?>
    </select>
  </div>


    <div class="form-group">
      <input type="submit" name="update_booking" class="btn btn-primary" value="Book Now">
    </div>
  </div>


</form>