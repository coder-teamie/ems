<?php
  if(isset($_POST['checkBoxArray'])){
    
    foreach($_POST['checkBoxArray'] as $postValueId){

    $bulk_options = $_POST['bulk_options'];

    switch($bulk_options){
      case 'published':
        $query = "UPDATE posts SET post_status = '$bulk_options' WHERE post_id = $postValueId ";
        $update_post_status_published = mysqli_query($connection, $query);
        confirm_query($update_post_status_published);
        break;
        
      case 'draft':
        $query = "UPDATE posts SET post_status = '$bulk_options' WHERE post_id = $postValueId ";
        $update_post_status_draft = mysqli_query($connection, $query);
        confirm_query($update_post_status_draft);
        break;

      case 'delete':
        $query = "DELETE FROM posts WHERE post_id = $postValueId ";
        $delete_post_query = mysqli_query($connection, $query);
        break;

      case 'clone':
        $query = "SELECT * FROM posts WHERE post_id = {$postValueId} ";
        $select_post_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_post_query)){
          $post_user = $row['post_user'];
          $post_title = $row['post_title'];
          $post_category_id = $row['post_category_id'];
          $post_status = $row['post_status'];
          $post_image = $row['post_image'];
          $post_content = $row['post_content'];
          $post_tags = $row['post_tags'];
          $post_date = $row['post_date'];
        }
        $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
        $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}' )";

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
    <option value="published">Published</option>
    <option value="draft">Draft</option>
    <option value="delete">Delete</option>
    <option value="clone">Clone</option>
  </select>
</div>

<div class="form-group col-xs-4">
  <input type="submit" name="submit" class="btn btn-success" value="Apply">
  <a href="./posts.php?source=add_post" class="btn btn-primary">Add New</a>

</div>
</div>

    <thead>
      <tr>
        <th><input type="checkbox" id="selectAllBoxes"></th>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Date</th>
        <th>View Post</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      
<?php

  $query = "SELECT * FROM posts ORDER BY post_id DESC ";
  $select_all_posts = mysqli_query($connection, $query);

  while($row = mysqli_fetch_array($select_all_posts)){
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_date = $row['post_date'];

    echo "<tr>";

    ?>

<td><input type='checkbox' name='checkBoxArray[]' class='checkBoxes' value='<?php echo $post_id; ?>'></td>

<?php
    echo "<td>{$post_id}</td>";
    echo "<td>{$post_author}</td>";
    echo "<td>{$post_title}</td>";

# || DYNAMIC CATEGORY ||

  $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
  $select_categories_id = mysqli_query($connection, $query);

  while($row = mysqli_fetch_assoc($select_categories_id)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];
    echo "<td>{$cat_title}</td>";
}
# || END OF DYNAMIC CATEGORY ||

    echo "<td>{$post_status}</td>";
    echo "<td><img width='100' height='80' src='../images/{$post_image}' alt='image'></td>";
    echo "<td>{$post_tags}</td>";

    echo "<td>{$post_date}</td>";
    echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
    echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
    // echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
    echo "<td><a rel='$post_id' href='javascript:void(0)' class='delete_link'>Delete</a></td>";
    echo "<tr>";

    }
?>

<?php include "delete_modal.php"; ?>

<?php delete_posts(); ?>

  </tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
  $(document).ready(function(){
    $('.delete_link').on('click', function(){
      var id = $(this).attr("rel");
      var delete_url = 'posts.php?delete=' + id + '';
      $('.modal_delete_link').attr("href", delete_url);
      $("#myModal").modal('show');
    })
  });
</script>