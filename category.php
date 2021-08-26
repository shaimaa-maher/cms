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

            if (isset($_GET['category'])) {
                $cat_id = $_GET['category'];
            
                $query = "SELECT * FROM posts WHERE post_category_id=$cat_id";

                $select_all_posts_query = mysqli_query($connection, $query);

                $count =mysqli_num_rows($select_all_posts_query);

                if ($count==0) {
                    echo "<div class='alert alert-info' role='alert'>
                                NO RESULT FOUND!
                                </div>";
                }
                
                while ($row = mysqli_fetch_assoc($select_all_posts_query)) {
                    $post_id = $row['post_id'];
                    $post_title= $row['post_title'];
                    $post_author= $row['post_author'];
                    $post_date= $row['post_date'];
                    $post_tags= $row['post_tags'];
                    $post_image= $row['post_image'];
                    $post_content= substr($row['post_content'],0,40);
                    $post_title= $row['post_title'];

                    ?>
                    
               

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id;?>"><?php echo $post_title;?></a>
                </h2>
                <p class="lead"> by <a href="index.php"><?php echo $post_author;  ?></a></p>
                <p><span class="glyphicon glyphicon-time"></span>  <?php echo $post_date; ?> </p>
                <p><span class="glyphicon glyphicon-tag"></span>  <?php echo $post_tags; ?> </p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id;?>">
                <img class="img-responsive" src="img/<?php echo $post_image;?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>

                <!-- the end of the loop -->

                <?php  } } ?>


               


                <!-- Pager -->
                <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php";?>
            


<?php include "includes/footer.php";?>
