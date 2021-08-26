<?php

//  if (isset($_GET['delete'])) {
//      $post_id = $_GET['delete'];
//      $query = "DELETE FROM posts WHERE post_id = $post_id";
//      $delete_post_query = mysqli_query($connection, $query);
//      ConfirmQuery($delete_post_query); 
//      echo "<div class='alert alert-success' role='alert'>
//      The Post Deleted!
//          </div>";
//  }


//  if (isset($_GET['change_to_published'])) {
//     $post_id = $_GET['change_to_published'];
//    // echo $post_id;
//     $query = "UPDATE posts SET post_status = 'published' WHERE post_id = $post_id";
//     $published_post_query = mysqli_query($connection, $query);
//     ConfirmQuery($published_post_query);
//     header("Location:posts.php"); 
    
// }

// if (isset($_GET['change_to_draft'])) {
//     $post_id = $_GET['change_to_draft'];
//    // echo $post_id;
//     $query = "UPDATE posts SET post_status = 'draft' WHERE post_id = $post_id";
//     $draft_post_query = mysqli_query($connection, $query);
//     ConfirmQuery($draft_post_query);
//     header("Location:posts.php"); 
    
// }

if (isset($_POST['checkBoxArray'])) {
    
}

?>
<form action="" method="post">

<table class="table table-hover table-bordered">

            <div id="bulkOptionsContainer" class="col-xs-4">
                <select class="form-control" name="" id="">
                    <option value="">Select Option</option>
                    <option value="">Publish</option>
                    <option value="">Draft</option>
                    <option value="">Delete</option>
                </select>
            </div>

            <div class="col-xs-4">
                <input type="submit" value="submit" class="btn btn-success" value="apply">
                <a href="add_post.php" class="btn btn-primary">Add New</a>
            </div>




    <thead>
        <tr>
            <th>Mark</th>
            <th>Id</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
            <th colspan="4">Actions</th>
        </tr>
    </thead>
    <tbody> 
            <?php
            $query = "SELECT * FROM posts";
            $select_all_posts_query = mysqli_query($connection, $query);
            ConfirmQuery($select_all_posts_query);
            
            while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                $post_id = $row['post_id'];
                $post_author= $row['post_author'];
                $post_title= $row['post_title'];
                $post_category_id= $row['post_category_id'];
                $post_status= $row['post_status'];
                $post_image= $row['post_image'];
                $post_tags= $row['post_tags'];
                $post_comments= $row['post_comment_count'];
                $post_date= $row['post_date'];

                 
                

                echo"<tr>";
                echo "<td><input type ='checkbox' class='checkBoxs' name ='checkBoxArray[]' value =$post_id></td>";
                echo "<td>$post_id</td>";
                echo "<td>$post_author</td>";
                echo "<td>$post_title</td>";

                //getting the cat_title and displaying the category title instead of its id.
                $query = "SELECT * FROM categories WHERE cat_id = $post_category_id ";
                $select_cat= mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_cat)){ 
                $post_category= $row['cat_title'];
                echo "<td>$post_category</td>";
                }
                
                
                echo "<td>$post_status</td>";
                echo "<td><img width ='100' class='img-responsive' src='../img/$post_image'></td>";
                echo "<td>$post_tags</td>";
                echo "<td>$post_comments</td>";
                echo "<td> $post_date</td>";
                echo "<td><a href='posts.php?change_to_published={$post_id}'>Published</a></td>";
                echo "<td><a href='posts.php?change_to_draft={$post_id}'>Draft</a></td>";
                echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                echo "</tr>";                                    
            } 
                                            
            ?>

    </tbody>
</table>
</form>

