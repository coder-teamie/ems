
<?php ob_start(); ?>

<?php session_start(); ?>
<?php include "./functions.php"; ?>

<!-- || HEADER || -->
<?php include "../includes/db.php" ?>


<?php
$mysqli = new mysqli('localhost', 'root', '', 'ems');
$message = '';

if(isset($_GET['date'])){
  $date = $_GET['date'];

  $stmt = $mysqli->prepare("SELECT * FROM bookings WHERE event_date = ?");
	$stmt->bind_param('s', $date);
	$bookings = array();
	if($stmt->execute()){
		$result = $stmt->get_result();
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
				$bookings[] = $row['timeslot'];
			}
			$stmt->close();
		}
	}


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
    // $event_time = escape($_POST['event_time']);
    // $event_duration = escape($_POST['event_duration']);
    $event_package = escape($_POST['event_package']);
    $timeslot = $_POST['timeslot'];

    $stmt = $mysqli->prepare("SELECT * FROM bookings WHERE event_date = ? and timeslot = ?");
	$stmt->bind_param('ss', $date, $timeslot);
	if($stmt->execute()){
		$result = $stmt->get_result();
		if($result->num_rows>0){
			
      $message = "<div class='alert alert-danger' style='margin-top: 2rem!important;'>Already Booked! Check Another Timeslot</div>";
        
		} else{
      $query = "INSERT INTO bookings(user_firstname, user_lastname, user_role, user_email, catering, booking_status, event_category, event_venue, event_date, event_package, timeslot) ";
      $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$user_email}','{$catering}', 'Pending', '{$event_category}','{$event_venue}','{$date}','{$event_package}', '{$timeslot}' )";

      $create_booking_query = mysqli_query($connection, $query);
      confirm_query($create_booking_query);
      $bookings[] = $timeslot;

      $message = "<div class='alert alert-success' style='margin-top: 2rem!important;'>Booking Created. <a href='./bookings.php' style='font-weight: bold;'> View Bookings </a></div>";
    }
	}

    

  }
  }


  $duration = 60;
  $cleanup = 0;
  $start = "07:00";
  $end = "20:00";

  function timeslots($duration, $cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT". $duration . "M");
    $cleanupInterval = new DateInterval("PT" . $cleanup . "M");
    $slots = array();

    for($intStart = $start; $intStart < $end; $intStart->add($interval)->add($cleanupInterval)){
      $endPeriod = clone $intStart;
      $endPeriod->add($interval);
      if($endPeriod>$end){
        break;
      }

      $slots[] = $intStart->format("H:iA"). "-" . $endPeriod->format("H:iA"); 
    }

    return $slots;
  }

?>


<!DOCTYPE html>
<html lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMS || Booking Form</title>

    <!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"></link> -->

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <script src="https://kit.fontawesome.com/2cd1fc15ff.js" crossorigin="anonymous"></script>

    <style>

      .alert-msg{
        margin-top: 3rem;
      }

      body{
		    background: white !important ;
	    }

    .grid-container{
      display: grid;
      grid-template-columns: auto 1fr;
      grid-template-rows: auto auto 1fr;
    }

    .grid-1 .side-nav{
      height: 100vh;
    }

    .booking-header{
      background: #333;
      color: #fff;
      width: fit-content;
      margin: 5rem auto;
      /* margin-top: 5rem; */
      padding: 0.3rem 0.6rem;
      /* border-radius: 1rem; */
      font-size: 3rem;
      box-shadow: 5px 9px 10px -2px rgba(0,0,0,0.61);
      -webkit-box-shadow: 5px 9px 10px -2px rgba(0,0,0,0.61);
      -moz-box-shadow: 5px 9px 10px -2px rgba(0,0,0,0.61);
    }
    .booking-header span{
      font-size: 3.5rem;
    }

    .grid-2{
      width: auto;
    }

</style>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="grid-container">
		<div id="wrapper" class="grid-1" style="margin-bottom: 7rem;">
	<?php include "includes/admin_navigation.php" ?>
	</div>
<div class="container grid-2">
  <div class="row">
    <div class="col-md-12">
    <?php 
      echo $message;
    ?>
    </div>
    <div class="col-lg-12">

      
  <h1 class="text-center booking-header">Booking for <span><?php echo date('F d, Y', strtotime($date)); ?></span></h1>
    <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
    foreach($timeslots as $timeslot){
      ?>
      <div class="col-md-2">
        <div class="form-group">
          <?php if(in_array($timeslot,$bookings)){?>
          <button class="btn btn-danger"><?php echo $timeslot; ?></button>

        <?php }else{ ?>

          <button class="btn btn-success book" data-timeslot="<?php echo $timeslot; ?>"><?php echo $timeslot; ?></button>

        <?php } ?>
        </div>
      </div>
    <?php } ?>
  </div>
  
</div>
  
</div>
</div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Booking <span id="slot" class="bg-success"></span></h4>
  </div>
  <div class="modal-body">
    <div class="row">
      <div class="col-md-12">
        <form action="" method="post">
          <div class="form-group">
            <label for="">Timeslot</label>
            <input type="text" name="timeslot" readonly id="timeslot"  class="form-control">
          </div>
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

          <div class="form-group">
            <label for="event_package">Event Packages: </label>
            <select name="event_package" class="form-control" id="">
              <option value="n/a">--Select Option--</option>
              <option value="package-a">PACKAGE A | $2500 </option>
              <option value="package-b">PACKAGE B | $2000 </option>
              <option value="package-c">PACKAGE C | $1000 </option>
            </select>
          </div>
          
          <!-- Create a link that will redirect to contact form onclick "SUPPORT" -->
          <div class="form-group">
            <p class="form-control" style="background-color: #333 !important; color: white !important;">Kindly Contact <a href="#" style="font-size: larger!important;">Support</a> if you would like to extend your event duration</p>
          </div>

            <div class="form-group">
              <input type="submit" name="create_booking" class="btn btn-primary" value="Book Now">
            </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
      
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script>
      $(".book").click(function(){
        var timeslot = $(this).attr('data-timeslot');
        $("#slot").html(timeslot);
        $("#timeslot").val(timeslot);
        $("#myModal").modal("show");
      })
    </script>
  </body>
</html>
