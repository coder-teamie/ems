<?php
  if(isset($_POST['create_post'])){
    $post_title = escape($_POST['title']);
    $post_author = escape($_POST['post_author']);
    $post_category_id = escape($_POST['post_category']);
    $post_status = escape($_POST['post_status']);

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = escape($_POST['post_tags']);
    $post_content = escape($_POST['post_content']);
    $post_date = date('d-m-y');

    move_uploaded_file($post_image_temp, "../images/$post_image");


    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
    $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}' )";

    $create_post_query = mysqli_query($connection, $query);
    confirm_query($create_post_query);

    # || GET LATEST ID OF POST FROM DB ||
    $the_post_id = mysqli_insert_id($connection);

    echo "<div class='alert alert-success'>Post Created. <a style='font-weight: bold;' href='../post.php?p_id=$the_post_id'>View Post</a> or <a href='./posts.php' style='font-weight: bold;'> Add More Posts</a></div>";
  }

?>

<form action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="title">Post Title</label>
    <input type="text" name="title" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_category">Category: </label>
  <select name="post_category" id="post_category">

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
    <label for="post_author">Users: </label>
    <input type="text" name="post_author" class="form-control">

  </div>

  <div class="form-group">
    <select name="post_status" id="">
      <option value="draft">--Select Option--</option>
      <option value="published">Publish</option>
      <option value="draft">Draft</option>
    </select>
  </div>

  <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file" name="image">
  </div>

  <div class="form-group">
    <label for="post_tags">Post Tags</label>
    <input type="text" name="post_tags" class="form-control">
  </div>

  <div class="form-group">
    <label for="summernote">Post Content</label>
    <textarea type="text" id="summernote" name="post_content" class="form-control" cols="30" rows="10"></textarea>
  </div>
  
    <div class="form-group">
      <input type="submit" name="create_post" class="btn btn-primary" value="Publish Post">
    </div>
  </div>


</form>