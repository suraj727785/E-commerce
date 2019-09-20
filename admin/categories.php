<?php include "includes/header.php"  ?>
    <div id="wrapper">
<?php
    
    
?>
        <!-- Navigation -->
       <?php include "includes/navigation.php"?>
        <div id="page-wrapper">
       <div class="container-fluid">
           
       </div><!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12"> 
                   <h1 class="page-header">
                            Welcome to Admin
                            <small><?php echo $_SESSION['username'];   ?></small>
                        </h1>
                        
                        
                       
                        <div class="col-xs-6">
                    <?php insert_categories(); ?>
                         
                           <form action="categories.php" method="post">
                            <div class="form-group">
                              <lebel class="cat-title">Add Product Category</lebel>
                                <input type="text" class="form-control" name="cat_title">
                                </div>
                               <div class="form-group">
                             <input type="submit" class="btn btn-primary" name="submit" value="Add Category">    
                            </div>
                          </form>  
                          
                          
                         <?php
                        if(isset($_GET['edit'])){
                            $cat_id = $_GET['edit'];
                            include "includes/edit_categories.php";
                        }  ?>
                      </div> <!--  add category form        -->                                     
                
   
                    
                         <div class="col-xs-6">
                          <table class="table table-bordered table-hover ">
                                  <thead>
                                      <tr>
                                          <th>Id</th>
                                          <th>Product Categories</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  
<?php find_all_prodct_categories(); ?>


<?php delete_categories(); ?>
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
       <?php include "includes/footer.php" ?>