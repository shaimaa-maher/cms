<?php include "includes/admin_header.php";?>
<?php
    
    if (isset($_SESSION['username'])) {
        
       $username = $_SESSION['username'];

       $query="SELECT * FROM users WHERE username = '$username' ";
       $select_user_profile_query=mysqli_query($connection, $query);

        if (!$select_user_profile_query) {
            die("QUERY FAILED".mysqli_error($connection));
        }
    
    while ($row = mysqli_fetch_array($select_user_profile_query)) {

                $the_user_id=$row['user_id'];
                $username= $row['username'];
                $user_firstname= $row['user_firstname'];
                $user_lastname= $row['user_lastname'];
                $user_password= $row['user_password'];
                $user_email = $row['user_email'];
                $user_image= $row['user_image'];
                $user_role= $row['user_role'];
    }


    //Update the profile.
    if (isset($_POST['update_user'])) {

        $username= $_POST['username'];
        $user_firstname= $_POST['user_firstname'];
        $user_lastname= $_POST['user_lastname'];
        $user_password= $_POST['user_password'];
        $user_email = $_POST['user_email'];
        $user_image= $_FILES['user_image'] ['name'];
        $user_image_temp= $_FILES['user_image'] ['tmp_name'];

        $user_role= $_POST['user_role'];
    
    
        move_uploaded_file($user_image_temp, "../img/$user_image");

        // make sure that the image field doesn't empty.
        if (empty($user_image)) {
           $query ="SELECT * FROM users WHERE user_id = $the_user_id";
           $getting_image = mysqli_query($connection,$query);
           $result = mysqli_fetch_assoc($getting_image) ;
           $user_image = $result['user_image'];
        }

        if (empty($user_password)) {
            $query ="SELECT * FROM users WHERE user_id = $the_user_id";
            $getting_image = mysqli_query($connection,$query);
            $result = mysqli_fetch_assoc($getting_image) ;
            $user_password =
             $result['user_password'];
         }

         //Update the session data
        $_SESSION['username'] = $username;
        $_SESSION['firstname'] = $user_firstname;
        $_SESSION['lastname'] = $user_lastname;
        $_SESSION['user_role'] = $user_role; 

        //saving the updated data.
        $query = "UPDATE users SET";  
        $query.=" username = '$username', ";
        $query.=" user_firstname = '$user_firstname', ";
        $query.=" user_lastname = '$user_lastname', ";
        $query.=" user_password = '$user_password', ";
        $query.=" user_email = '$user_email', ";
        $query.=" user_image = '$user_image', ";
        $query.=" user_role = '$user_role' ";
        $query.=" WHERE user_id = $the_user_id ";
        
        $update_user_query = mysqli_query($connection, $query);
        ConfirmQuery($update_user_query);  
        echo "<div class='alert alert-success' role='alert'>
        The User Updated Successfully!
        </div>";


    }


    }

?>
    <div id="wrapper">

        <!-- Navigation ------------------------------------------------------------------------------>
        <?php include "includes/admin_navigation.php"; ?>
    
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -------------------------------------------------------------------->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            
                            Welcome To Admin
                            <small>Shaimaa</small>
                        </h1>



<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <img src="../img/<?php echo $user_image;?>" width="100" class="img-responsive img-circle  center-block">
        <h4 class=" text-center"><?php echo $username; ?></h4>  
    </div>
    

    <div class="form-group">
        <label for="user_firstname">First Name</label>
        <input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname; ?>">
    </div>

    <div class="form-group">
        <label for="user_lastname">Last Name</label>
        <input type="text" name="user_lastname" class="form-control" value="<?php echo $user_lastname; ?>">
    </div>

    <div class="form-group">
        <label for="user_role">Role</label>
        <!-- <input type="text" class="form-control" name="user_role"> -->
        <br>
        <select name="user_role" id="" class="form-select">

            <option value="<?php echo $user_role;  ?>"><?php echo $user_role; ?></option>

            <?php 
            
            if ($user_role == 'admin') {
                echo"<option value='subscriber'>subscriber</option>"; 
            }else {
                echo"<option value='admin'>admin</option>"; 
                
            }
            ?>
            
        </select>
    </div>

    <div class="form-group">
        <label for="username">username</label>
        <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" name="user_email" class="form-control" value="<?php echo $user_email; ?>">
    </div>  

    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" name="user_password" class="form-control" value="<?php echo $user_password; ?>">
    </div>

    
    <div class="form-group">
        <label for="user_image">User Image</label>
        <input type="file" name="user_image">
    </div>

   
    <div class="form-group">
        <input type="submit" name="update_user" class="btn btn-primary" value="Update Profile">
    </div>

</form>
                    </div>

                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


     
   
<?php include "includes/admin_footer.php";?>