<?php

 if (isset($_GET['delete'])) {
     $user_id = $_GET['delete'];
    // echo $user_id;
     $query = "DELETE FROM users WHERE user_id = $user_id";
     $delete_user_query = mysqli_query($connection, $query);
     ConfirmQuery($delete_user_query);
     header("Location:users.php"); 
     
 }

 if (isset($_GET['change_to_admin'])) {
    $user_id = $_GET['change_to_admin'];
   // echo $user_id;
    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $user_id";
    $admin_user_query = mysqli_query($connection, $query);
    ConfirmQuery($admin_user_query);
    header("Location:users.php"); 
    
}

if (isset($_GET['change_to_subscriber'])) {
    $user_id = $_GET['change_to_subscriber'];
   // echo $user_id;
    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $user_id";
    $subscriber_user_query = mysqli_query($connection, $query);
    ConfirmQuery($subscriber_user_query);
    header("Location:users.php"); 
    
}

?>

<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>User Image</th>
            <th>Role</th>
            <th>Admin</th>
            <th>Subscriber</th>
            <th>Edit</th>
            <th>Delete</th>
            
        </tr>
    </thead>
    <tbody> 
            <?php
            $query = "SELECT * FROM users";
            $select_all_users_query = mysqli_query($connection, $query);
            ConfirmQuery($select_all_users_query);
            
            while ($row = mysqli_fetch_assoc($select_all_users_query)) {
                $user_id = $row['user_id'];
                $username= $row['username'];
                $user_firstname= $row['user_firstname'];
                $user_lastname= $row['user_lastname'];
                $user_email= $row['user_email'];
                $user_image =$row['user_image'];
                $user_role= $row['user_role'];
               

                  
                

                echo"<tr>";
                echo "<td>$user_id</td>";
                echo "<td>$username</td>";
                echo "<td>$user_firstname</td>"; 
                echo "<td>$user_lastname</td>";
                echo "<td>$user_email</td>";
                echo"<td><img src='../img/$user_image' width ='100' class='img-responsive'></td>";
                echo "<td>$user_role</td>";
                echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
                echo "<td><a href='users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";
                echo "<td><a href='users.php?source=edit_user&u_id={$user_id}'>Edit</a></td>";
                echo "<td><a href='users.php?delete={$user_id}'>Delete</a></td>";
                echo "</tr>";                                    
            } 
                                            
            ?>

    </tbody>
</table>

