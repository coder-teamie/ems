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
      </ul>
</li>
<li>
        <a href="client_profile.php"><i class="fa fa-fw fa-user"></i>  Profile</a>
        </li>
    </ul>
</div>
    <!-- /.navbar-collapse -->
</nav>

<div id="wrapper">

<div id="page-wrapper">

<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">

        <h1 class="page-header">
            Welcome, 
            <small style="text-transform: capitalize;"><?php echo $_SESSION['username']; ?></small>
        </h1>

<?php

  if(isset($_POST['create_booking'])){
    $user_firstname = escape($_POST['user_firstname']);
    $user_lastname = escape($_POST['user_lastname']);
    $user_role = escape($_POST['user_role']);
    $user_email = escape($_POST['user_email']);
    $catering = escape($_POST['catering']);
    $event_category = escape($_POST['event_category']);
    $event_venue = escape($_POST['event_venue']);
    $event_date = escape($_POST['event_date']);
    $event_time = escape($_POST['event_time']);
    $event_duration = escape($_POST['event_duration']);
    $event_package = escape($_POST['event_package']);

    $query = "INSERT INTO bookings(user_firstname, user_lastname, user_role, user_email, catering, booking_status, event_category, event_venue, event_date, event_time, event_duration, event_package) ";
    $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$user_email}','{$catering}', 'Pending', '{$event_category}','{$event_venue}','{$event_date}','{$event_time}','{$event_duration}','{$event_package}' )";

    $create_booking_query = mysqli_query($connection, $query);
    confirm_query($create_booking_query);

    echo "<p class='bg-success'>Booking Created.</p>";
  }

?>

<form action="" method="post">
  
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

<div class="form-group">
  <label for="event_date">Event Date: </label>
  <input type="date" class="form-control" name="event_date" id="">
</div>

<div class="form-group">
  <label for="event_time">Event Time: </label>
  <input type="time" class="form-control" name="event_time">
</div>

  <div class="form-group">
    <label for="event_duration">Event Duration: </label>
    <select name="event_duration" class="form-control" id="">
      <option value="n/a">--Select Duration--</option>
      <option value='1-Hour|Mininum|$500'>1 Hour Mininum | $500</option>
      <option value='2-Hours|$700'>2 Hours | $700</option>
      <option value='4-Hours|$850'>4 Hours | $850</option>
      <option value='6-Hours|Maximum|$1200'>6 Hours Maximum | $1200</option>
    </select>
  </div>

  <div class="form-group">
    <label for="event_package">Event Packages: </label>
    <select name="event_package" class="form-control" id="">
      <option value="n/a">--Select Option--</option>
      <option value="Basic">Basic - 2 Hours + 30mins (Catering Service + Event Host + Video Recording) | $2000 </option>
      <option value="Premium">Premium - 3 Hours + 1 Hour (Everything in Basic + Red Carpet) | $2500 </option>
      <option value="Deluxe">Deluxe - 4 Hours + 1 Hour (Everything in Premium + Valet Parking + Extreme Security Protocol) | $3000 </option>
    </select>
  </div>


    <div class="form-group">
      <input type="submit" name="create_booking" class="btn btn-primary" value="Book Now">
    </div>
  </div>


</form>
            
</div>
</div>
<!-- /.row -->