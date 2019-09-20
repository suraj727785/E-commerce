<?php include "includes/header.php"  ?>
    <div id="wrapper">

        <!-- Navigation -->
       <?php include "includes/navigation.php"?>
        <div id="page-wrapper">
       <div class="container-fluid">
           
       </div><!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                            Welcome to Sales
                            <small><?php echo $_SESSION['username'];   ?></small>
                        </h1> 


<form action="search.php" method="post">
         <table class="table table-bordered table-hover">

             <div id="bulkOptionContainer" class="col-xs-4">
         <a href="product.php?source=view_all_products" class="btn btn-primary">Back</a>
        
    </div> 
                           
                            <thead>
                                    <tr>
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


if(isset($_POST['new_search_product'])){
  $search_product = $_POST['product_search'];   
  $query="SELECT * FROM products WHERE product_name LIKE '%$search_product%' || product_barcode ='{$search_product}'  ";  
  $sarch_product_query=mysqli_query($connection,$query);
  while($row=mysqli_fetch_assoc($sarch_product_query)){
    $product_id = $row['product_id'];
    $product_category_id = $row['product_category_id'];
    $product_name = $row['product_name'];
    $product_quantities = $row['product_quantities'];
    $product_purchase_rate = $row['net_purchase_rate'];
    $product_sale_rate = $row['product_sale_rate'];
    $product_mrp = $row['product_mrp'];
    $product_image = $row['product_image'];
      
    
    echo "<tr>";

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
 