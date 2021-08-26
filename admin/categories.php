<?php include "includes/admin_header.php";?>

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

                        <!-------------------------------------------- Add Query ---------------------------------------->
                        <div class="col-xs-12">
                          <?php AddCategory(); ?>
                        </div>

                        <!-- Add Category Form ---------------------------------------------------------------------------->
                        <div class="col-xs-3">

                            <form action="categories.php" method="POST">
                                <div class="form-group">
                                    <label for="cat-title">Add Catergory</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
                        </div>

                        <?php
                         //..................................Edit Form.......................................................
                          updateCategory();

                        ?>

                        <!--The table of categories ------------------------------------------------------------------------->
                        <div class="col-xs-6">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                    <th colspan="2">Actions</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                                <form action="categories.php" method="GET">
                                <?php 
                                //Find query
                                  findCategories();
                                ?>

                                <?php
                                   //.....................................Delete query...................................
                                   deleteCategory();
                                ?>

                                </form>
                            </tbody>

                        </table>

                        </div>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->


     
   
<?php include "includes/admin_footer.php";?>