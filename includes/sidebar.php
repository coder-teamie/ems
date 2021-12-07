<style>
  .modal-content{
    width: 50rem !important;
    margin: 0 auto !important;
    margin-top: 15rem !important;
    height: 55rem !important;
  }
  .form-img{
    width: 40rem !important;
    display: block !important;
    margin: 0 auto !important;
  }
  /* form{
    display: grid !important;
    margin: 0 auto !important;
  } */
</style>

<div class="col-md-4">
    <!-- Blog Search Well -->
    <div class="well">
        <h4>Venue Search</h4>

        <form action="search.php" method="post">
        <div class="input-group">
            <input type="text" name="search" class="form-control">
            <span class="input-group-btn">
                <button name="submit" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
        </form> 
        <!-- /.input-group -->
</div>

<div class="well">
  <?php  if(isset($_SESSION['user_role'])): ?>
        <h4>Logged in as <?php echo $_SESSION['username'] ?></h4>
        <a href="includes/logout.php" class="btn btn-primary">Log Out</a>
  <?php else: ?>
  <button type="submit" class="btn btn-primary login" > Log In Here </button>

<div id="myModal" class="modal fade" role="dialog">
<div class="modal-dialog">

    <!-- Modal content-->
<div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Login</h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
        <!-- <h4>Log in</h4> -->
        <img src="images/admin-login.jpg" class="form-img" alt="login image">

        <form action="./includes/login.php" method="post">
        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Enter username">
        </div>
        <div class="input-group">
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
            <span class="input-group-btn">
            <button type="submit" class="btn btn-primary" name="login" > Log In </button>
            </span>
        </div>
        </form> 
        <!-- /.input-group -->
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  </div>
</div>
</div>
</div>
<?php  endif; ?>
</div>

<!-- Blog Categories Well -->
<div class="well">

<?php

  $query = "SELECT * FROM categories LIMIT 5";
  $select_categories_sidebar = mysqli_query($connection, $query);

?>
  <h4>Event Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">
        <?php
            while($row = mysqli_fetch_array($select_categories_sidebar)){
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];

            echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
          }
        ?>

          </ul>
        </div>
        <!-- /.col-lg-6 -->
    
      </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include "widget.php"; ?>

</div>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Script for login modal -->
<script>
    $(".login").click(function(){
        $("#myModal").modal("show");
    })
</script>