<form action="" method="POST">

<div class="col-xs-3">
        <div class="form-group col-xs-12"> 
            
            <label for="cat-title">Edit Catergory</label>
            <?php    
                
                if (isset($_GET['edit'])) {

                    $cat_id = $_GET['edit'];
                    $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
                    $select_cat= mysqli_query($connection, $query);
            
                while ($row = mysqli_fetch_assoc($select_cat)) {
                    $cat_id = $row['cat_id'];
                    $cat_title= $row['cat_title'];
            ?>

            <input class="form-control" type ="text" name ="cat_title" value="<?php if(isset($cat_title)){echo $cat_title;}?>">
                    
            <?php }} ?>

           
            <?php //.............................................UPDATE QUERY..............................................
                
                if (isset($_POST['update'])) {

                    $the_cat_title= $_POST['cat_title'];
                    
                    $query = " UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$cat_id} ";

                    $update_cat_query = mysqli_query($connection, $query);

                    if (!$update_cat_query) {
                            die("QUERY FAILD!".mysqli_error($connection));
                        }else{
                        echo "The Category Has Been Updated Successfully!";}
                }
                
                
            ?>
        </div>

        <div class="form-group col-xs-12">
        <input class="btn btn-primary" type="submit" name="update" value="Update" >
        </div>
</div>      
        
</form>