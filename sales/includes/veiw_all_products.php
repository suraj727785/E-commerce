<?php
if(isset($_POST['checkBoxArray'])){
   
    foreach($_POST['checkBoxArray'] as $product_value_id){
        
    $bulk_options=$_POST['bulk_options'];
        
        
        switch($bulk_options){
                
            case 'delete': 
                
                $query="DELETE FROM products WHERE product_id='{$product_value_id}' ";
                $update_to_delete=mysqli_query($connection,$query);
                confirmQuery($update_to_delete);
                
                break;
                

                
                
           
            
                
        }
        
       
        
        
    }



}
    
?>

<form action="search.php" method="post">
         <table class="table table-bordered table-hover">
         <div id="bulkOptionContainer" class="col-xs-4">
            <form class="" method="post" action="">
            <input class="form-control mr-2" name="product_search" type="text"  placeholder="Search Products">
            <button class="btn btn-light" name="new_search_product" type="submit">Search</button>
        </form>
             </div>
         <div id="bulkOptionContainer" class="col-xs-4">
              
             <select class="form-control" name="bulk_options" id="">
                 
                <option value="">Select Options</option>

                <option value="delete">Delete Multiples</option>

             </select>      
             </div>
             <div id="bulkOptionContainer" class="col-xs-4">
         <input type="submit" name="submit" class="btn btn-success" value="Delete"> <a href="product.php?source=add_product" class="btn btn-primary">Add new Product</a>
        
    </div> 
                           
                            <thead>
                                    <tr>
                                       <th><input id="selectAllBoxes" type="checkbox"></th>
                                        <th>Product Name</th>
                                        <th>Image</th>
                                        <th>Quantity</th>
                                        <th>Purchase Rate</th>
                                        <th>Sale Rate</th>
                                        <th>MRP</th>
                                        <th>Product Category</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
<?php

     $query ="SELECT * FROM products ORDER BY product_id DESC ";
    $select_products_query = mysqli_query($connection,$query);

    while($row=mysqli_fetch_assoc($select_products_query)){
    $product_id = $row['product_id'];
    $product_category_id = $row['product_category_id'];
    $product_name = $row['product_name'];
    $product_quantities = $row['product_quantities'];
    $product_purchase_rate = $row['net_purchase_rate'];
    $product_sale_rate = $row['product_sale_rate'];
    $product_mrp = $row['product_mrp'];
    $product_image = $row['product_image'];

        
    echo "<tr>";
    ?>
    
   <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]"value='<?php echo $product_id ; ?>' ></td>
    
    <?php
    echo "<td>{$product_name}</td>";
    echo "<td><img width='100' src = '../images/$product_image' alt='images'></td>";
    echo "<td>{$product_quantities}</td>";
    echo "<td>{$product_purchase_rate}</td>";
    echo "<td>{$product_sale_rate}</td>";
    echo "<td>{$product_mrp}</td>";
        
    $query ="SELECT * FROM product_categories WHERE categories_id = $product_category_id";
    $select_product_categories_id = mysqli_query($connection,$query);

    while($row=mysqli_fetch_assoc($select_product_categories_id)){
    $cat_title = $row['categories_title'];
    $cat_id = $row['categories_id'];
        
    echo "<td>{$cat_title}</td>";
        
    }
   
    echo "<td><a href='product.php?source=edit_product&p_id={$product_id}'>Edit</a></td>"; 
    echo "<td><a  onClick= \"javascript: return confirm('Are you sure want to delete'); \"  href='product.php?delete={$product_id}'>Delete</a></td>";
        
        
    echo "</tr>";    
    
    
    
    
    }
     
    
    
    
?>                               
                                </tbody>
                            </table>
                            </form>
                            
<?php
    if(isset($_GET['delete'])){
     
$delete_product_id=$_GET['delete'];
$query= "DELETE FROM products WHERE product_id = {$delete_product_id}";
$delete_query = mysqli_query($connection,$query);
     
header("Location: product.php");
 }          



?>
 