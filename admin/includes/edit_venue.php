<?php

  if(isset($_GET['v_id'])){
    $venue_id = $_GET['v_id'];
  }

    $query = "SELECT * FROM venue WHERE venue_id = $venue_id ";
    $select_venue_by_id = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($select_venue_by_id)){

      $venue_id = $row['venue_id'];
      $venue_title = $row['venue_title'];
      $venue_image = $row['venue_image'];
      $venue_caption = $row['venue_caption'];

  }

  if(isset($_POST['update_venue'])){
    
    $venue_title = $_POST['venue_title'];
    $venue_image = $_FILES['image']['name'];
    $venue_image_temp = $_FILES['image']['tmp_name'];
    $venue_caption = $_POST['venue_caption'];

    move_uploaded_file($venue_image_temp, "../images/$venue_image");

    if(empty($venue_image)){

      $query = "SELECT * FROM venue WHERE venue_id = $venue_id ";
      $select_image = mysqli_query($connection, $query);

      while($row = mysqli_fetch_array($select_image)){
        $venue_image = $row['venue_image'];
    }
  }

    $query = "UPDATE venue SET ";
    $query .= "venue_title = '{$venue_title}', ";
    $query .= "venue_image = '{$venue_image}', ";
    $query .= "venue_caption = '{$venue_caption}' ";
    $query .= "WHERE venue_id = {$venue_id} ";

    $update_venue = mysqli_query($connection,$query);
    confirm_query($update_venue);

    echo "<p class='bg-success'>Venue Updated.<a href='./venues.php' style='font-weight: bold;'> View all Venues</a>
    </p>";
  }

?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="venue_title">Venue Title</label>
    <input type="text" value="<?php echo $venue_title; ?>" name="venue_title" class="form-control">
  </div>

  <div class="form-group">
    <img width="100" src="../images/<?php echo $venue_image; ?>" style="margin-bottom: 1rem;" alt="">
    <input type="file" name="image">
  </div>

  <div class="form-group">
    <label for="summernote">Venue Caption</label>
    <textarea type="text"  id="summernote" name="venue_caption" class="form-control" cols="30" rows="10"><?php echo $venue_caption; ?></textarea>
  </div>
  
    <div class="form-group">
      <input type="submit" name="update_venue" class="btn btn-primary" value="Update Venue">
    </div>
  </div>


</form>