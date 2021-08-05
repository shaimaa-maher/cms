    <div class="col-md-4">
    
                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>

                    <form action="search.php" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit" name="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    <!-- /.input-group -->
                    </form>

                </div>
                        
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php 
                                    $query = "SELECT * FROM categories";
                                    $select_all_cat= mysqli_query($connection, $query);
                                    
                                    while ($row = mysqli_fetch_assoc($select_all_cat)) {
                                        $cat_title= $row['cat_title'];
                                ?> 
                                <li><a href="#"><?php echo $cat_title; ?></a></li>
                                <?php }?>
                            </ul>
                         </div><!-- /.col -->
                        
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                    <li><a href="#">Category Name</a></li>
                                    <li><a href="#">Category Name</a></li>
                                    <li><a href="#">Category Name</a></li>
                                    <li><a href="#">Category Name</a></li>
                            </ul>
                        </div>

                    </div><!-- /.row -->
                </div>

                <!-- Side Widget Well -->
               <?php include "widget.php"?>

    </div>