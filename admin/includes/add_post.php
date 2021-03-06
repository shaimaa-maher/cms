<?php
   if (isset($_POST['create_post'])) {
      
        $post_author= $_POST['post_author'];
        $post_title= $_POST['post_title'];
        $post_category= $_POST['post_category'];
        $post_status= $_POST['post_status'];

        $post_image= $_FILES['post_image'] ['name'];
        $post_image_temp= $_FILES['post_image'] ['tmp_name'];

        $post_tags= $_POST['post_tags'];
       
        $post_content= mysqli_real_escape_string($connection, $_POST['post_content']);
        
        $post_date= date('d-m-y');

        move_uploaded_file($post_image_temp, "../img/$post_image");


        $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status, post_views_count) VALUES ($post_category,'$post_title','$post_author',now(),'$post_image','$post_content','$post_tags','$post_status',5)";
        
        $create_post_query = mysqli_query($connection, $query);

        ConfirmQuery($create_post_query);
       
        echo "<div class='alert alert-success' role='alert'> The Post Published!</div>";
                
   }
?>

<form action="" method="POST" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="post_title" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_category">Post Category Id</label>
        <br>
        <select name="post_category" id="">
                <?php 
                $query = "SELECT * FROM categories";
                $select_cat= mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($select_cat)) {
                    $cat_id = $row['cat_id'];
                    $cat_title= $row['cat_title'];
                
               echo"<option value='$cat_id'>$cat_title</option>";  
                } 
                ?>
               
            </select>
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" name="post_author" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" name="post_status" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="post_image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" name="post_tags" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" id="editor" name="post_content" cols="30" rows="10"></textarea>

    </div>

    <div class="form-group">
        <input type="submit" name="create_post" class="btn btn-primary" value="Publish Post">
    </div>

</form>