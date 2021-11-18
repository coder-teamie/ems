
<table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
      </tr>
    </thead>
    <tbody>
      
<?php

  $query = "SELECT * FROM posts";
  $select_all_posts = mysqli_query($connection, $query);

  while($row = mysqli_fetch_array($select_all_posts)){
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_category_id = $row['post_category_id'];
    $post_status = $row['post_status'];
    $post_image = $row['post_image'];
    $post_tags = $row['post_tags'];
    $post_comment_count = $row['post_comment_count'];
    $post_date = $row['post_date'];

    echo "<tr>";
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
    echo "<td><img width='100' src='../images/{$post_image}' alt='image'></td>";
    echo "<td>{$post_tags}</td>";

    // $query = "SELECT * FROM comments WHERE comment_post_id = {$post_id} ";
    // $send_comment_query = mysqli_query($connection, $query);

    // $row = mysqli_fetch_array($send_comment_query);
    // // $comment_id = $row['comment_id'];
    // $count_comments = mysqli_num_rows($send_comment_query);

    // if($count_comments > 0){
    //   $comment_post_id = $row['comment_post_id'];
    //   echo "<td><a href='post_comments.php?id={$post_id}'>$count_comments</a></td>";
    // } 
    // else {
    //   echo "<td><a href=''>$count_comments</a></td>";
    // }

    echo "<td>{$post_comment_count}</td>";
    echo "<td>{$post_date}</td>";
    echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
    echo "<tr>";

    }

?>

<?php delete_posts(); ?>

  </tbody>
</table>