                    
                           
                           
                                                           
              <form action="" method="post">
                            <div class="form-group">
                              <lebel class="cat-title">Edit Categories</lebel>
                            <?php   
                    if(isset($_GET['edit'])){
                        $cat_id = $_GET['edit'];
                    
                                
                    $query ="SELECT * FROM product_categories WHERE categories_id = $cat_id";
                    $select_categories_update = mysqli_query($connection,$query);

                    while($row=mysqli_fetch_assoc($select_categories_update)){
                    $cat_title = $row['categories_title'];
                    $cat_id = $row['categories_id'];  
                     ?>   


                   <input value="<?php if(isset($cat_title)){ echo $cat_title;} ?>" type="text" class="form-control" name="cat_title">             
                               
                               
                    <?php           
                    
                    } }
                       ?> 
                            
                                
                    <?php
                                
                if(isset($_POST['update'])){

                $edit_cat_title=$_POST['cat_title'];
                $query = " UPDATE product_categories SET categories_title = '{$edit_cat_title}'  WHERE categories_id = {$cat_id} ";
                $edit_query = mysqli_query($connection,$query);
                    if(!$edit_query){
                        
                        die("QUERY FAILED" .mysqli_error($connection));
                    }
                    
                }
                                
                                
                                ?>
                               

                        </div>
                       <div class="form-group">
                     <input type="submit" class="btn btn-primary" name="update" value="Update Catagory">    
                    </div>

                   </form>  