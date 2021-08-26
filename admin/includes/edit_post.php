<?php

if (isset($_GET['p_id'])) {
    
$the_post_id = $_GET['p_id'];

$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
$select_posts_by_id_query = mysqli_query($connection, $query);
            
            while ($row = mysqli_fetch_assoc($select_posts_by_id_query)) 
            {
                $post_id = $row['post_id'];
                $post_author= $row['post_author'];
                $post_title= $row['post_title'];
                $post_category= $row['post_category_id'];
                $post_status= $row['post_status'];
                $post_image= $row['post_image'];
                $post_tags= $row['post_tags'];
                $post_comments= $row['post_comment_count'];
                $post_date= $row['post_date'];
                $post_content = $row['post_content'];
            }
             
        }

        //----------------------------------------------------------------
             //update the post.
             if (isset($_POST['update_post'])) {

                // echo $post_id;
                $post_author= $_POST['post_author'];
                $post_title= $_POST['post_title'];
                $post_category= $_POST['post_category'];
                $post_status= $_POST['post_status'];
        
                $post_image= $_FILES['post_image'] ['name'];
                $post_image_temp= $_FILES['post_image'] ['tmp_name'];
        
                $post_tags= $_POST['post_tags'];
                $post_comments= 4;
                $post_content= mysqli_real_escape_string($connection, $_POST['post_content']);
                $post_date= date('d-m-y');
        
                move_uploaded_file($post_image_temp, "../img/$post_image");
        
                // make sure that the image field doesn't empty.
                if (empty($post_image)) {
                   $query ="SELECT * FROM posts WHERE post_id = $the_post_id";
                   $getting_image = mysqli_query($connection,$query);
                   $result = mysqli_fetch_assoc($getting_image) ;
                   $post_image = $result['post_image'];
                }

                //saving the updated data.
                $query = "UPDATE posts SET";  
                $query.=" post_category_id = '$post_category', ";
                $query.=" post_title = '$post_title', ";
                $query.=" post_author = '$post_author', ";
                $query.=" post_image = '$post_image', ";
                $query.=" post_content = '$post_content', ";
                $query.=" post_tags = '$post_tags', ";
                $query.=" post_status = '$post_status', ";
                $query.=" post_date = now() ";
                $query.=" WHERE post_id = $the_post_id ";
                
                $update_post_query = mysqli_query($connection, $query);
                ConfirmQuery($update_post_query);  
                echo "<div class='alert alert-success' role='alert'>
                The Post Updated Successfully! <br> <a href='../post.php?p_id= $post_id'>View Post</a><br> <a href='posts.php'>Edit More Posts</a>
                </div>";
        

            }
?>

<form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="title">Post Title</label>
            <input type="text" name="post_title" value="<?php echo $post_title;?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="post_category">Post Category </label><br>

                <?php 
                //Getting the current category name and id to make it the first option.
                $query = "SELECT * FROM categories WHERE cat_id = $post_category";
                $select_cat= mysqli_query($connection, $query);
                $current_post_cat = mysqli_fetch_assoc($select_cat);
                ?>
           
            <select name="post_category" id="" class="form-control">
                
                <option value="<?php echo $current_post_cat['cat_id'];?>"><?php echo $current_post_cat['cat_title'];?></option>

                <?php 
                //Getting all gategories except the current one.
                $query = "SELECT * FROM categories WHERE cat_id != $post_category";
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
            <input type="text" name="post_author" value="<?php echo $post_author; ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="post_status">Post Status</label><br>
            <select name="post_status" id="" class="form-control">
               <option value="<?php echo $post_status;?>"> <?php echo $post_status; ?> </option>

               <?php 
               if ($post_status == 'published') {
                   echo"<option value='draft'>draft</option>"; 
               }else {
                   echo"<option value='published'>published</option>";  
               }
                
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="post_image">Post Image</label><br>
            <img width='100' src="../img/<?php echo $post_image; ?>" alt="post image"> 
            <input type="file" name="post_image">

        </div>

        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" name="post_tags" value="<?php echo $post_tags; ?>" class="form-control">
        </div>

        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea class="form-control" id="editor" name="post_content" cols="30" rows="10"><?php echo $post_content; ?></textarea>
            
        </div>

        <div class="form-group">
            <input type="submit" name="update_post" class="btn btn-primary" value="Update Post">
        </div>

</form>