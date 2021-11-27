<?php
  if(isset($_POST['create_venue'])){
    $venue_title = escape($_POST['venue_title']);

    $venue_image = $_FILES['image']['name'];
    $venue_image_temp = $_FILES['image']['tmp_name'];

    $venue_caption = escape($_POST['venue_caption']);
    move_uploaded_file($venue_image_temp, "../images/$venue_image");

    $query = "INSERT INTO venue(venue_title, venue_image, venue_caption) VALUES('{$venue_title}','{$venue_image}','{$venue_caption}')";

    $create_venue_query = mysqli_query($connection, $query);
    confirm_query($create_venue_query);

    # || GET LATEST ID OF POST FROM DB ||
    // $the_post_id = mysqli_insert_id($connection);

    echo "<p class='bg-success'>Venue Created. <a href='./venues.php' style='font-weight: bold;'> View all Venues</a>
    </p>";
  }

?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="venue_title">Venue Title</label>
    <input type="text" name="venue_title" class="form-control">
  </div>

  <!-- <div class="form-group">
    <label for="post_category">Category: </label>
  <select name="post_category" id="post_category"> -->

<?php

  // $query = "SELECT * FROM categories";
  // $select_categories = mysqli_query($connection, $query);

  // confirm_query($select_categories);

  // while($row = mysqli_fetch_assoc($select_categories)){
  //   $cat_id = $row['cat_id'];
  //   $cat_title = $row['cat_title'];

  //   echo "<option value='{$cat_id}'>{$cat_title}</option>";
  // }
?>
<!-- </select>

  </div> -->

  <div class="form-group">
    <label for="venue_image">Venue Image</label>
    <input type="file" name="image">
  </div>

  <div class="form-group">
    <label for="summernote">Venue Caption</label>
    <textarea type="text" id="summernote" name="venue_caption" class="form-control" cols="30" rows="10"></textarea>
  </div>
  
    <div class="form-group">
      <input type="submit" name="create_venue" class="btn btn-primary" value="Publish Post">
    </div>
  </div>


</form>