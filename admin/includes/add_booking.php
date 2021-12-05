<style>
  .booking-header{
    background: #333;
    color: #fff;
    width: fit-content;
    margin: 0 auto;
    padding: 0.2rem 0.5rem;
    /* border-radius: 1rem; */
    font-size: 2rem;
    box-shadow: 5px 9px 10px -2px rgba(0,0,0,0.61);
-webkit-box-shadow: 5px 9px 10px -2px rgba(0,0,0,0.61);
-moz-box-shadow: 5px 9px 10px -2px rgba(0,0,0,0.61);

  }
  .booking-header span{
    font-size: 3rem;
  }
</style>

<?php

if(isset($_GET['date'])){
  $date = $_GET['date'];

?>

<?php
  if(isset($_POST['create_booking'])){
    $user_firstname = escape($_POST['user_firstname']);
    $user_lastname = escape($_POST['user_lastname']);
    $user_role = escape($_POST['user_role']);
    // $post_status = escape($_POST['username']);
    $user_email = escape($_POST['user_email']);
    $catering = escape($_POST['catering']);
    $event_category = escape($_POST['event_category']);
    $event_venue = escape($_POST['event_venue']);
    // $date = escape($_POST['event_date']);
    $timeslots = escape($_POST['timeslot']);
    $event_duration = escape($_POST['event_duration']);
    $event_package = escape($_POST['event_package']);

    $query = "INSERT INTO bookings(user_firstname, user_lastname, user_role, user_email, catering, booking_status, event_category, event_venue, event_date, timeslot, event_duration, event_package) ";
    $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$user_email}','{$catering}', 'Pending', '{$event_category}','{$event_venue}','{$date}','{$timeslot}','{$event_duration}','{$event_package}' )";

    $create_booking_query = mysqli_query($connection, $query);
    confirm_query($create_booking_query);

    echo "<div class='alert alert-success'>Booking Created. <a href='./bookings.php' style='font-weight: bold;'> View Bookings </a>
    </div>";
  }
  }

?>

<form action="" method="post" autocomplete="off">
  
    <div class="form-group">
    <label for="user_firstname">Firstname</label>
    <input type="text" name="user_firstname" class="form-control">
  </div>
  
  <div class="form-group">
    <label for="user_lastname">Lastname</label>
    <input type="text" name="user_lastname" class="form-control">
  </div>

  <div class="form-group">
    <label for="user_role">User Role: </label>
    <select name="user_role" class="form-control" id="">
      <option value="n/a">--Select Options--</option>
      <option value="admin">Admin</option>
      <option value="employee">Employee</option>
      <option value="customer">Customer</option>
    </select>
  </div>

  <div class="form-group">
    <label for="user_email">Email</label>
    <input type="email" name="user_email" class="form-control" cols="30" rows="10">
  </div>

  <div class="form-group">
    <label style="font-weight: bold;">Catering Services: </label>
    <select name="catering" id="catering">
      <option value="yes">Yes</option>
      <option value="no">No</option>
    </select>
  </div>

  <div class="form-group">
    <label for="event_category">Event Category(Choose One): </label>
  <select name="event_category" class="form-control" id="post_category">

<?php

  $query = "SELECT * FROM categories";
  $select_categories = mysqli_query($connection, $query);

  confirm_query($select_categories);

  while($row = mysqli_fetch_assoc($select_categories)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<option value='{$cat_id}'>{$cat_title}</option>";
  }
?>
</select>
</div>

<div class="form-group">
    <label for="event_venue">Event Venue: </label>
  <select name="event_venue" class="form-control" id="post_category">

<?php

  $query = "SELECT * FROM venue";
  $select_venues = mysqli_query($connection, $query);

  confirm_query($select_venues);

  while($row = mysqli_fetch_array($select_venues)){
    $venue_id = $row['venue_id'];
    $venue_title = $row['venue_title'];

    echo "<option value='{$venue_id}'>{$venue_title}</option>";
  }
?>
</select>
</div>

<!-- <div class="form-group">
  <label for="event_date">Event Date: </label>
  <input type="date" value="" class="form-control" name="event_date" id="">
</div> -->

<div class="form-group">
  <label for="timeslot">Timeslot: </label>
  <select class="form-control" name="timeslot">
    <option value="07:00AM-08:00AM">07:00AM-08:00AM</option>
    <option value="08:00AM-09:00AM">08:00AM-09:00AM</option>
    <option value="09:00AM-10:00AM">09:00AM-10:00AM</option>
    <option value="10:00AM-11:00AM">10:00AM-11:00AM</option>
    <option value="11:00AM-12:00PM">11:00AM-12:00PM</option>
    <option value="12:00PM-01:00PM">12:00PM-01:00PM</option>
    <option value="13:00PM-14:00PM">13:00PM-14:00PM</option>
    <option value="14:00PM-15:00PM">14:00PM-15:00PM</option>
    <option value="15:00PM-16:00PM">15:00PM-16:00PM</option>
    <option value="16:00PM-17:00PM">16:00PM-17:00PM</option>
    <option value="17:00PM-18:00PM">17:00PM-18:00PM</option>
    <option value="18:00PM-19:00PM">18:00PM-19:00PM</option>
    <option value="19:00PM-20:00PM">19:00PM-20:00PM</option>
  </select>
</div>

  <!-- <div class="form-group">
    <label for="event_duration">Event Duration: </label>
    <select name="event_duration" class="form-control" id="">
      <option value="n/a">--Select Duration--</option>
      <option value='1-Hour|Mininum|$500'>1 Hour Mininum | $1000</option>
      <option value='2-Hours|$700'>2 Hours | $1500</option>
      <option value='4-Hours|$850'>4 Hours | $2000</option>
    </select>
  </div> -->

  <div class="form-group">
    <label for="event_package">Event Packages: </label>
    <select name="event_package" class="form-control" id="">
      <option value="n/a">--Select Option--</option>
      <option value="Basic">Basic - 1 Hour + 30mins (Catering Service + Event Host + Video Recording) | $2000 </option>
      <option value="Premium">Premium - 2 Hours + 1 Hour (Everything in Basic + Red Carpet) | $2500 </option>
      <option value="Deluxe">Deluxe - 4 Hours + 1 Hour (Everything in Premium + Valet Parking + Extreme Security Protocol) | $3000 </option>
    </select>
  </div>


    <div class="form-group">
      <input type="submit" name="create_booking" class="btn btn-primary" value="Book Now">
    </div>
  </div>


</form>