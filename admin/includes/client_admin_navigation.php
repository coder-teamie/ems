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
            <tr>
                <td><strong>BD12</strong></td>
                <td>Crystal Ball Room (200 - 300 Pax)</td>
                <td>Yes</td>
                <td>Product Launch</td>
                <td>2021-12-16</td>
                <td>08:00AM-09:00AM</td>
                <td>Deluxe</td>
                <td>Pending</td>
                <td><a href='#'>Edit</a></td>
            </tr>
        </tbody>
        </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    </div>