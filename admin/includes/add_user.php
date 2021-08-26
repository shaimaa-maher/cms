<?php
   if (isset($_POST['create_user'])) {
      
        $username= $_POST['username'];
        $user_firstname= $_POST['user_firstname'];
        $user_lastname= $_POST['user_lastname'];
        $user_password= $_POST['user_password'];
        $user_email = $_POST['user_email'];
        $user_image= $_FILES['user_image'] ['name'];
        $user_image_temp= $_FILES['user_image'] ['tmp_name'];

        $user_role= $_POST['user_role'];
       
        // $post_content= mysqli_real_escape_string($connection, $_POST['post_content']);
        

        move_uploaded_file($user_image_temp, "../img/$user_image");


        $query = "INSERT INTO users (username, user_firstname, user_lastname, user_password,user_email, user_image, user_role) VALUES ('$username','$user_firstname','$user_lastname','$user_password','$user_email','$user_image','$user_role')";
        
        $create_user_query = mysqli_query($connection, $query);

        ConfirmQuery($create_user_query);
       
        echo "<div class='alert alert-success' role='alert'> User Added Successfully! <a href='users.php'>View Users</a></div>";
                
   }
?>

<form action="" method="POST" enctype="multipart/form-data">

    
    <div class="form-group">
        <label for="post_author">username</label>
        <input type="text" name="username" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="email" name="user_email" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_status">First Name</label>
        <input type="text" name="user_firstname" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_image">Last Name</label>
        <input type="text" name="user_lastname" class="form-control">
    </div>

    <div class="form-group">
        <label for="post_image">Password</label>
        <input type="password" name="user_password" class="form-control">
    </div>

    <div class="form-group">
        <label for="title">User Image</label>
        <input type="file" name="user_image">
    </div>
    <div class="form-group">
        <label for="user_role">Role</label>
        <!-- <input type="text" class="form-control" name="user_role"> -->
        <br>
        <select name="user_role" id="" class="form-select">
        <option value="subscriber">Select Option</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" name="create_user" class="btn btn-primary" value="create user">
    </div>

</form>