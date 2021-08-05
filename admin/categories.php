<?php include "includes/admin_header.php";?>

    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>
    
        <div id="page-wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Welcome To Admin
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">

                            <form action="">
                                <div class="form-group">
                                    <label for="cat-title">Add Catergory</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
                        </div>

                        <div class="col-x-6">

                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>goods</td>
                                </tr>
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