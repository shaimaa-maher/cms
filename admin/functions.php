<?php

//Confirm Query

function ConfirmQuery($query)
{
    global $connection;
    if (!$query) {
        
        die("QUERY FAILED !" .mysqli_error($connection));
    }
}

function bind_param($content)
{

    
}

/// Insert Query
function AddCategory()
{
    global $connection;
    
    if (isset($_POST['submit']))
     { 
        // getting the cat title
        $cat_title = $_POST['cat_title'];
        echo $cat_title;
        
        // validation
        if ($cat_title == "" || empty(trim($cat_title))) 
        {
            
            echo "Please fill this field !";

        }
        else 
        {
            // adding query
                $add_query = "INSERT INTO categories (cat_title) VALUES ('$cat_title')";

                $create_add_query = mysqli_query($connection, $add_query );

                if (!$create_add_query) 
                {

                    die("QUERY FAILED !" .mysqli_error($connection));
                }
                else 
                {
                    echo "Added Successfully !";
                }
        }
    }
}

/// Find Query
function findCategories()
{
    global $connection;

    $query = "SELECT * FROM categories";
    $select_all_cat= mysqli_query($connection, $query);
    
    while ($row = mysqli_fetch_assoc($select_all_cat)) {
        $cat_id = $row['cat_id'];
        $cat_title= $row['cat_title'];
?> 
<tr>
    <td><?php echo $cat_id;  ?></td>
    <td><?php echo $cat_title; ?></td>
    <td><?php echo "<a href='categories.php?delete={$cat_id}'>Delete</a>"; ?></td>
    <td><?php echo "<a href='categories.php?edit={$cat_id}'>Edit</a>"; ?></td>
</tr>
<?php  
}}
?>
<?php
 /// Edit Query

 function updateCategory()
 {
    global $connection;

    if (isset($_GET['edit'])) {

        $cat_id = $_GET['edit'];
        include "includes/admin_edit_categories.php";
    }
 }

/// Delete Query
  function deleteCategory()
  {
    global $connection;

    if (isset($_GET['delete'])) {
                                       
        $the_cat_id= $_GET['delete']; //we got the id from the href of the delete button
        $query = "DELETE FROM categories WHERE cat_id = $the_cat_id";
        $delete_cat_query = mysqli_query($connection, $query);
        header("location:categories.php"); 
       }
  }
?>