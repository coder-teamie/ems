<?php
  if(isset($_POST['checkBoxArray'])){
    
    foreach($_POST['checkBoxArray'] as $venueValueId){

    $bulk_options = $_POST['bulk_options'];

    switch($bulk_options){

      case 'delete':
        $query = "DELETE FROM venue WHERE venue_id = $venueValueId ";
        $delete_venue_query = mysqli_query($connection, $query);
        break;

      case 'clone':
        $query = "SELECT * FROM venue WHERE venue_id = {$venueValueId} ";
        $select_venue_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_venue_query)){
          $venue_title = $row['venue_title'];
          $venue_image = $row['venue_image'];
          $venue_caption = $row['venue_caption'];
        }
        $query = "INSERT INTO venue(venue_title, venue_image, venue_caption) ";
        $query .= "VALUES('{$venue_title}', '{$venue_image}', '{$venue_caption}')";

        $clone_query = mysqli_query($connection, $query);

        if(!$clone_query){
          die("QUERY FAILED" . mysqli_error($connection));
        }
        break;
    }
    }
  }

?>

<form action="" method="post">

<table class="table table-bordered table-hover">

<div id="bulkOptionContainer" class="row">
  <div class="col-sm-4">
  <select name="bulk_options" class="form-control" id="">
    <option value="">--Select Option--</option>
    <option value="delete">Delete</option>
    <option value="clone">Clone</option>
  </select>
</div>

<div class="form-group col-xs-4">
  <input type="submit" name="submit" class="btn btn-success" value="Apply">
  <a href="./venues.php?source=add_venue" class="btn btn-primary">Add New</a>

</div>
</div>

    <thead>
      <tr>
        <th><input type="checkbox" id="selectAllBoxes"></th>
        <th>Id</th>
        <th>Venue Title</th>
        <th>Venue Image</th>
        <th>Caption</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      
<?php

  $query = "SELECT * FROM venue ORDER BY venue_id ASC ";
  $select_all_venues = mysqli_query($connection, $query);

  while($row = mysqli_fetch_array($select_all_venues)){
    $venue_id = $row['venue_id'];
    $venue_title = $row['venue_title'];
    $venue_image = $row['venue_image'];
    $venue_caption = $row['venue_caption'];

    echo "<tr>";

    ?>

<td><input type='checkbox' name='checkBoxArray[]' class='checkBoxes' value='<?php echo $venue_id; ?>'></td>

<?php
    echo "<td>{$venue_id}</td>";
    echo "<td>{$venue_title}</td>";

    echo "<td><img width='100' src='../images/{$venue_image}' alt='image'></td>";
    echo "<td>{$venue_caption}</td>";

    echo "<td><a href='venues.php?source=edit_venue&v_id={$venue_id}'>Edit</a></td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='venues.php?delete={$venue_id}'>Delete</a></td>";
    echo "<tr>";

}

?>

<?php //delete_posts(); ?>

  </tbody>
</table>