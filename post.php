 <!-- Header -->
 <?php include "includes/header.php"; ?>
 <?php include "includes/db.php" ?>

 <!-- Navigation -->
 <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">



            <?php 
            if (isset($_GET['p_id'])) {
                
                $post_id=$_GET['p_id'];
            
                $query = "SELECT * FROM posts WHERE post_id=$post_id";

                $select_post_query = mysqli_query($connection, $query);
                
                while ($row = mysqli_fetch_assoc($select_post_query)) {

                    $post_title= $row['post_title'];
                    $post_author= $row['post_author'];
                    $post_date= $row['post_date'];
                    $post_tags= $row['post_tags'];
                    $post_image= $row['post_image'];
                    $post_content= $row['post_content'];
                    $post_title= $row['post_title'];

                    ?>
                    
               

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title;?></a>
                </h2>
                <p class="lead"> by <a href="index.php"><?php echo $post_author;  ?></a></p>
                <p><span class="glyphicon glyphicon-time"></span>  <?php echo $post_date; ?> </p>
                <p><span class="glyphicon glyphicon-tag"></span>  <?php echo $post_tags; ?> </p>
                <hr>
                <img class="img-responsive" src="img/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

                <hr>

                <!-- the end of the loop -->

                <?php  } }  ?>


                

                <!-- Blog Comments -->

                <?php
                 
                if (isset($_POST['create_comment'])) {
                    
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = mysqli_real_escape_string($connection,$_POST['comment_content']);
                    $comment_post_id = $post_id;
                    $comment_date = date('d-m-y');

                    $query = "INSERT INTO comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) VALUES ($comment_post_id,'$comment_author','$comment_email','$comment_content','unapproved',now())";
                    $create_comment = mysqli_query($connection,$query);

                    if (!$create_comment) {
                        die("QUERY FAILED !" .mysqli_error($connection));
                    }else{

                    $query="UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id = $comment_post_id";
                    $increasing_comments_count=mysqli_query($connection,$query);

                    if (!$increasing_comments_count) {
                        die("QUERY FAILED !" .mysqli_error($connection));
                    }

                    echo "<div class='alert alert-success' role='alert'> The comment has been submited!</div>";
                    }

                
                }

                ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method="POST" action="">
                    
                        <div class="form-group">
                           <input class="form-control" type="text" name="comment_author" placeholder="name">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="email" name="comment_email" placeholder="email">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="your comment..." name="comment_content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php

                $query="SELECT * FROM comments WHERE comment_post_id = $post_id ORDER BY comment_id DESC";
                $post_comments=mysqli_query($connection,$query);
                
                if (!$post_comments) {
        
                    die("QUERY FAILED !" .mysqli_error($connection));
                }
                
                
                while ($row= mysqli_fetch_assoc($post_comments)) {
                    
                  $comment_author = $row['comment_author'];
                  $comment_content = $row['comment_content'];
                  $comment_date =$row['comment_date'];
                  $comment_status=$row['comment_status'];
            
                if ($comment_status === 'approved') {
                   
                
                echo " <div class='media'>";
                echo " <a class='pull-left' href='#'>";
                echo " <img class='media-object' src='http://placehold.it/64x64' alt=''>";
                echo " </a>";
                echo " <div class='media-body'>";
                echo " <h4 class='media-heading'>$comment_author";
                echo " <small>$comment_date</small>";
                echo " </h4> ";
                echo $comment_content;
                echo " </div>";
                echo " </div>";
                
                 }  
                }
                ?>      

            </div>
        
    
            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php";?>
           
        </div>
        <hr>

<?php include "includes/footer.php";?>
