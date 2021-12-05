<?php session_start(); ?>

<?php include "functions.php" ?>
<?php

function build_calendar($month, $year){
	$mysqli = new mysqli('localhost', 'root', '', 'ems');
	// $stmt = $mysqli->prepare("SELECT * FROM bookings WHERE MONTH(event_date) = ? AND YEAR(event_date)=?");
	// $stmt->bind_param('ss', $month, $year);
	// $bookings = array();
	// if($stmt->execute()){
	// 	$result = $stmt->get_result();
	// 	if($result->num_rows>0){
	// 		while($row = $result->fetch_assoc()){
	// 			$bookings[] = $row['event_date'];
	// 		}
	// 		$stmt->close();
	// 	}
	// }

    #Creating an array containing names of all days in the week
    $daysOfWeek = array('Sunday', 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

    # What is the first day of the month in question?
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

    # How many days does this month contain?
    $numberDays = date('t',$firstDayOfMonth);

    # Retrieve some information about the first day of the
    # month in question.
    $dateComponents = getdate($firstDayOfMonth);

    # What is the name of the month in question?
    $monthName = $dateComponents['month'];

    # What is the index value (0-6) of the first day of the
    # month in question.
    $dayOfWeek = $dateComponents['wday'];

    # Create the table tag opener and day headers
    
    $datetoday = date('Y-m-d');
    $calendar = "<table class='table table-bordered table-hovered'>";
		
		$prev_month = date('m', mktime(0,0,0, $month - 1, 1, $year));
		$prev_year = date('Y', mktime(0,0,0, $month - 1, 1, $year));
		$next_month = date('m', mktime(0,0,0, $month + 1, 1, $year));
		$next_year = date('Y', mktime(0,0,0, $month + 1, 1, $year));
		
    $calendar .= "<center><h2>$monthName $year</h2>";
		$calendar .= "<a class='btn btn-xs btn-primary' href='?month=".$prev_month."&year=".$prev_year."'>Previous Month</a> ";
		$calendar .= "<a class='btn btn-primary btn-xs' href='?day=".$datetoday."&month=".date('m')."&year=".date('Y')."'> Current Month </a> ";
		$calendar .= "<a class='btn btn-primary btn-xs' href='?month=".$next_month."&year=$next_year'> Next Month</a> </center><br>";
    
    $calendar .= "<tr>";

    # Create the calendar headers
    foreach($daysOfWeek as $day) {
        $calendar .= "<th class='header'>$day</th>";
    } 
    
    # Create the rest of the calendar
    # Initiate the day counter, starting with the 1st.
    $calendar .= "</tr><tr>";
    $currentDay = 1;

		# The variable $dayOfWeek is used to
		# ensure that the calendar
		# display consists of exactly 7 columns.

    if($dayOfWeek > 0) { 
        for($k=0;$k < $dayOfWeek; $k++){
            $calendar .= "<td class='empty'></td>"; 
        }
    }
    
    
    $month = str_pad($month, 2, "0", STR_PAD_LEFT);
    
    while ($currentDay <= $numberDays) {

				#Seventh column (Saturday) reached. Start a new row.
				if ($dayOfWeek == 7) {
					$dayOfWeek = 0;
					$calendar .= "</tr><tr>";
				}
				
				$currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
				$date = "$year-$month-$currentDayRel";
				$dayname = strtolower(date('l', strtotime($date)));
				$eventNum = 0;
				$today = $date==date('Y-m-d') ? 'today' : '';

				#check and block all holidays 
				if($date == date('2021-12-25') || $date == date('2022-01-01') || $date == date('2021-12-26') || $date == date('2022-01-09')){
					$calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Holiday</button>";
				}
				elseif($date<date('Y-m-d')){
					$calendar.="<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
				}
				else{

					#check how many days in a week are booked if > than 3,4,5 echo all booked
					$totalbookings = checkSlots($mysqli, $date);
					if($totalbookings == 13){
						$calendar.="<td class='$today'><h4>$currentDay</h4> <a href='#' class='btn btn-danger btn-xs'>All Booked</a></td>";
					}else{
						$availableslots = 13 - $totalbookings;
						$calendar.="<td class='$today'><h4>$currentDay</h4> <a href='includes/client_booking_form.php?date=".$date."' class='btn btn-success btn-xs'>Book</a><small><i>$availableslots slots left</i></small></td>";
					}
				}
				
				#Increment counters
				$currentDay++;
				$dayOfWeek++;
		}
		
		# Complete the row of the last week in month, if necessary
		if ($dayOfWeek < 7) { 
        $remainingDays = 7 - $dayOfWeek;
        for($i=0; $i < $remainingDays; $i++){
            $calendar .= "<td class='empty'></td>"; 
        }
    }
    
    $calendar .= "</tr>";
    $calendar .= "</table>";
    return $calendar;
}

function checkSlots($mysqli, $date){
		$stmt = $mysqli->prepare("SELECT * FROM bookings WHERE event_date = ?");
	$stmt->bind_param('s', $date);
	$totalbookings = 0;
	if($stmt->execute()){
		$result = $stmt->get_result();
		if($result->num_rows>0){
			while($row = $result->fetch_assoc()){
				$totalbookings++;
			}
			$stmt->close();
		}
	}
	return $totalbookings;
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"></link>
<style>
	table{
		table-layout: fixed;
	}

	td{
		width: 33%;
	}

	.today{
		background: yellow !important;
	}
	body{
		background: white!important ;
	}
	.grid-container{
		display: grid;
		grid-template-columns: auto 1fr;
	}
	.grid-1 .side-nav{
		height: 100vh;
	}
</style>

<link rel="stylesheet" href="css/calender.css">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">


    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div class="grid-container">
		<div id="wrapper" class="grid-1" style="margin-bottom: 7rem;">
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
	</div>
	<div class="container grid-2">
		<div class="row">
			<div class="col-md-12">
				<?php
					$date_components = getdate();
					if(isset($_GET['month']) && isset($_GET['year'])){

						$month = $_GET['month'];
						$year = $_GET['year'];

					} else{
					
						$month = $date_components['mon'];
						$year = $date_components['year'];

					}
					echo build_calendar($month, $year);
				?>
			</div>
		</div>
	</div>
	</div>
	
	<!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>

    <!-- Js -->
    <script src="../js/scripts.js"></script>

    <!-- || FONT AWESOME || -->
    <script src="https://kit.fontawesome.com/2cd1fc15ff.js" crossorigin="anonymous"></script>

    <script src="../js/summernote.min.js"></script>
</body>
</html>
