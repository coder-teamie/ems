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

    <!-- Log in FORM -->
    <div class="well">
        <!-- <h4>Log in</h4> -->
        <img src="images/admin-login.jpg" alt="login image" width="100%">

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

<!-- Blog Categories Well -->
  <div class="well">

<?php

  $query = "SELECT * FROM categories LIMIT 4";
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