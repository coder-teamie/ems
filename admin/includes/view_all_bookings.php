<table class="table table-bordered table-hover">
  <thead>
  <tr>
    <th>Id</th>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Role</th>
    <th>Email</th>
    <th>Catering Service</th>
    <th>Category</th>
    <th>Venue</th>
    <th>Date</th>
    <th>Time</th>
    <th>Duration</th>
    <th>Event Package</th>
    <th>Event Status</th>
    <th>Approve</th>
    <th>Reject</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
</thead>
<tbody>

<?php

  $query = "SELECT * FROM bookings ";
  $select_bookings = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_bookings)){
    $booking_id = $row['booking_id'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_role = $row['user_role'];
    $user_email = $row['user_email'];
    $catering = $row['catering'];
    $event_category_id = $row['event_category'];
    $event_venue_id = $row['event_venue'];
    $event_date = $row['event_date'];
    $event_time = $row['event_time'];
    $event_duration = $row['event_duration'];
    $event_package = $row['event_package'];
  
  
  echo "<tr>";
    echo "<td>$booking_id</td>";
    echo "<td>{$user_firstname}</td>";
    echo "<td>{$user_lastname}</td>";
    echo "<td>{$user_role}</td>";
    echo "<td>{$user_email}</td>";
    echo "<td>{$catering}</td>";


    $query = "SELECT * FROM categories WHERE cat_id = {$event_category_id} ";
    $select_categories = mysqli_query($connection, $query);

    while($row = mysqli_fetch_array($select_categories)){
      $cat_id = $row['cat_id'];
      $cat_title = $row['cat_title'];
      echo "<td>{$cat_title}</td>";
    }

    $venue_query = "SELECT * FROM venue WHERE venue_id = {$event_venue_id} ";
    $select_venue = mysqli_query($connection, $venue_query);

    while($row = mysqli_fetch_array($select_venue)){
      $venue_id = $row['venue_id'];
      $venue_title = $row['venue_title'];
      echo "<td>{$venue_title}</td>";
    }

    echo "<td>{$event_date}</td>";
    echo "<td>{$event_time}</td>";
    echo "<td>{$event_duration}</td>";
    echo "<td>{$event_package}</td>";
    echo "<td>approved</td>";
    
# || ACTION BUTTONS ||
  echo "<td><a href='./bookings.php?approve={}'>Approve</a></td>";
  echo "<td><a href='./bookings.php?reject={}'>Reject</a></td>";
  echo "<td><a href='./bookings.php?source=edit_booking&b_id={$booking_id}'>Edit</a></td>";
  echo "<td><a href='./bookings.php?delete={$booking_id}'>Delete</a></td>";
  echo "</tr>";
  }
?>

</tr>
</tbody>
</table>

<!-- || SWITCH TO ADMIN || -->
<?php //switch_to_admin(); ?>

<!--  || SWITCH TO SUBSCRIBER || -->
<?php //switch_to_employee(); ?>

<!-- || DELETE BOOKING || -->
<?php delete_booking(); ?>