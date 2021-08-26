<?php

 if (isset($_GET['delete'])) {
     $comment_id = $_GET['delete'];
    // echo $comment_id;
     $query = "DELETE FROM comments WHERE comment_id = $comment_id";
     $delete_comment_query = mysqli_query($connection, $query);
     ConfirmQuery($delete_comment_query);
     header("Location:comments.php"); 
     
 }

 if (isset($_GET['approve'])) {
    $comment_id = $_GET['approve'];
   // echo $comment_id;
    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $comment_id";
    $approve_comment_query = mysqli_query($connection, $query);
    ConfirmQuery($approve_comment_query);
    header("Location:comments.php"); 
    
}

if (isset($_GET['unapprove'])) {
    $comment_id = $_GET['unapprove'];
   // echo $comment_id;
    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $comment_id";
    $unapprove_comment_query = mysqli_query($connection, $query);
    ConfirmQuery($unapprove_comment_query);
    header("Location:comments.php"); 
    
}

?>

<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response To</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Edit</th>
            <th>Delete</th>
            
        </tr>
    </thead>
    <tbody> 
            <?php
            $query = "SELECT * FROM comments";
            $select_all_comments_query = mysqli_query($connection, $query);
            ConfirmQuery($select_all_comments_query);
            
            while ($row = mysqli_fetch_assoc($select_all_comments_query)) {
                $comment_id = $row['comment_id'];
                $comment_post_id= $row['comment_post_id'];
                $comment_author= $row['comment_author'];
                $comment_email= $row['comment_email'];
                $comment_content= $row['comment_content'];
                $comment_status= $row['comment_status'];
                $comment_date= $row['comment_date'];

                 
                

                echo"<tr>";
                echo "<td>$comment_id</td>";
                echo "<td>$comment_author</td>";
                echo "<td>$comment_content</td>";

                //getting the cat_title and displaying the category title instead of its id.
                // $query = "SELECT * FROM comments WHERE comment_post_id = $comment_post_id ";
                // $select_cat= mysqli_query($connection, $query);
                // while($row = mysqli_fetch_assoc($select_cat)){ 
                // $post_category= $row['cat_title'];
                // echo "<td>$post_category</td>";
                // }
                
                echo "<td>$comment_email</td>";
                echo "<td>$comment_status</td>";


                //Query to get the title of the related post.
                $query = "SELECT * FROM posts WHERE post_id=$comment_post_id";
                $comment_post=mysqli_query($connection,$query);
                $result = mysqli_fetch_assoc($comment_post);
                $comment_post_title = $result['post_title'];


                echo"<td> <a href='../post.php?p_id=$comment_post_id'>$comment_post_title </a></td>";
                echo "<td> $comment_date</td>";
                echo "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
                echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
                echo "<td><a href='comments.php?edit=$comment_id'>Edit</a></td>";
                echo "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
                echo "</tr>";                                    
            } 
                                            
            ?>

    </tbody>
</table>

