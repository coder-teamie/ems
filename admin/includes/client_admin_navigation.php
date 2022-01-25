<?php $connection = mysqli_connect('localhost', 'root', '', 'ems'); ?>

<?php //session_start(); ?>
<div id="wrapper">

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
                    <a href="./client_profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
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


<!-- Page Heading -->

<div class="page-wrapper">

    <div class="container-fluid"> 

        <!-- Page Heading -->
        <div class="row" style="background-color: white;">
            <div class="col-lg-12">

                <h1 class="page-header" style="text-transform: capitalize;">
                    Welcome <?php echo $_SESSION['user_role']; ?>, 
                    <small style="text-transform: capitalize;"><?php echo $_SESSION['username']; ?></small>
                </h1>

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Booking Id</th>
            <th>Venue</th>
            <th>Catering</th>
            <th>Category</th>
            <th>Date</th>
            <th>Timeslot</th>
            <th>Package</th>
            <th>Status</th>
            <th>Edit</th>
        </tr>
    </thead>
<tbody>

<?php
if(isset($_SESSION['user_role'])){

    $username = $_SESSION['username'];
    
    // $username_query = "SELECT * FROM users WHERE username = '{$username}' ";
    // $get_username = mysqli_query($connection, $username_query);
    
    // confirm_query($get_username);
    
    // $row = mysqli_fetch_assoc($get_username);
    // $username = $row['username'];
    
    
    $query = "SELECT * FROM bookings WHERE username = '{$username}' ";
    $display_booking_info = mysqli_query($connection, $query);
    
    confirm_query($display_booking_info);
    
    while($row = mysqli_fetch_assoc($display_booking_info)){
        $booking_id = $row['booking_id'];
        $event_venue_id = $row['event_venue'];
        $catering = $row['catering'];
        $event_category = $row['event_category'];
        $event_date = $row['event_date'];
        $timeslot = $row['timeslot'];
        $event_package = $row['event_package'];
        $booking_status = $row['booking_status'];
        
        echo "<tr>";
        
        echo "<td><strong>{$booking_id}</strong></td>";


        $venue_query = "SELECT * FROM venue WHERE venue_id = {$event_venue_id} ";
        $select_venue = mysqli_query($connection, $venue_query);

        while($row = mysqli_fetch_array($select_venue)){
        $venue_id = $row['venue_id'];
        $venue_title = $row['venue_title'];
        echo "<td>{$venue_title}</td>";
        }


        echo "<td>{$catering}</td>";


        $query = "SELECT * FROM categories WHERE cat_id = {$event_category} ";
        $select_category = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_category)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<td>{$cat_title}</td>";
        }


        echo "<td>{$event_date}</td>";
        echo "<td>{$timeslot}</td>";
        echo "<td>{$event_package}</td>";
        // echo "<td>{$booking_status}</td>";
        if($booking_status === 'Approved'){
            echo "<td style='background-color: green; color: white;'>{$booking_status}</td>";
        } else if($booking_status === 'Rejected') {
            echo "<td style='background-color: red; color: white;'>{$booking_status}</td>";
        }
        else {
        echo "<td style='background-color: yellow; color: black;'>{$booking_status}</td>";
        }
        echo "<td><a href='#'>Edit</a></td>";
        echo "</tr>";
        
    }
}
    ?>
        </tbody>
    </table>
</div>
</div>
<!-- /.row -->
    </div>
    </div>