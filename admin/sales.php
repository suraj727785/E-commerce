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
                            Welcome to Admin
                            <small><?php echo $_SESSION['username'];   ?></small>
                        </h1> 
              <form class="" action="" method="post" enctype="multipart/form-data" >      
                          <div class="form-inline">
                            <div class="form-group">
                            <lebel for="name">Customer Name:</lebel>    
                            <input type="text" class="form-control" name="customer_name">   
                            </div>
                            <div class="form-group">
                            <lebel for="mobile no">Mobile No:</lebel>    
                            <input type="text" class="form-control" name="mobile_no">   
                            </div>
                            
                            <div class="form-group">
                            <lebel for="address">Address:</lebel>    
                            <input type="text" class="form-control" name="address">   
                            </div>
                            </div>
                      
                        
                        <div class="sale"> 
              <form  action="" method="post" enctype="multipart/form-data" >      
                          <div class="form-inline">
                            <div class="form-group">
                            <lebel for="product_name">Product Name:</lebel>    
                            <input type="text" class="form-control" name="product_name">   
                            </div>
                            <div class="form-group">
                              
                            </div>
                           <button class="btn btn-secondary" name="sale_product">Submit</button>

                            </div>
                      
                        </form>
                        </div>
                        
                        
                        <table class="table table-bordered table-hover">


                           
                            <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>MRP</th>
                                        <th>Sale Rate</th>
                                        <th>Quantity</th>
                                        <th>Discount %</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                
<?php
$total_purchase_amount=0;
$total_amount=0;
if(isset($_POST['sale_product'])){
  $select_product = $_POST['product_name'];   


  $query="SELECT * FROM products WHERE product_name= '{$select_product}' || product_barcode ='{$select_product}'  ";  
  $select_product_query=mysqli_query($connection,$query);
  while($row=mysqli_fetch_assoc($select_product_query)){
    $product_id = $row['product_id'];
    $product_name = $row['product_name'];
    $product_purchase_rate = $row['net_purchase_rate'];
    $product_sale_rate = $row['product_sale_rate'];
    $product_mrp = $row['product_mrp'];

      
$query= " INSERT INTO checkout(username,placed_product_id,order_name,order_rate,order_mrp,order_date) ";

$query.= " VALUES('current_order','{$product_id}','{$product_name}','{$product_sale_rate}','{$product_mrp}', now()  ) ";
$checkout_product_query=mysqli_query($connection,$query);
    
  }
}
    
$query = "SELECT * FROM checkout WHERE username = 'current_order' ";
$select_all_query=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($select_all_query)){
    $order_id = $row['placed_order_id'];
    $product_id = $row['placed_product_id'];
    $product_name = $row['order_name'];
    $product_sale_rate = $row['order_rate'];
    $product_mrp = $row['order_mrp'];
    
    
$query="SELECT * FROM products WHERE product_id = {$product_id} ";
$profit_count_query = mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($profit_count_query)){
$purchase_rate=$row['product_purchase_rate'];
     $total_purchase_amount = $total_purchase_amount + $purchase_rate ;

}
    
    $total_amount=$total_amount+$product_sale_rate-($product_sale_rate*(5/100));
      

  ?>    
     
         <tr>
          <form action="" method="post">
         <td><?php echo $product_name ?></td>
         <td><?php echo $product_mrp  ?></td>
         <td><?php echo $product_sale_rate ?></td>
         <td>1</td>
         <td>5%</td>
         <td><button value="<?php echo $order_id  ?>" name="delete_sale">Delete</button></td>
         </form>
         </tr>
    
    
<?php  
    
 $query ="SELECT * FROM products WHERE product_id = '{$product_id}' ";
$select_order_product_query=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($select_order_product_query)){
$order_product_id = $row['product_id'];
$available_quantity = $row['product_quantities'];
$new_available_quantities = $available_quantity - 1; 


$query = "UPDATE products SET ";
$query.= "product_quantities = '{$new_available_quantities}' ";
$query .="WHERE product_id = {$order_product_id} ";
$update_product_query=mysqli_query($connection,$query);
    
}

$order_placed_query=mysqli_query($connection,$query);
    if(!$order_placed_query){
        die("Connection failed" .mysqli_error($connection));
    }      
         
}
                                

    
if(isset($_POST['delete_sale'])){
     
$delete_product_id=$_POST['delete_sale'];
$query= "DELETE FROM checkout WHERE placed_order_id = {$delete_product_id}";
$delete_query = mysqli_query($connection,$query);
    
    
 $query ="SELECT * FROM products WHERE product_id = '{$delete_product_id}' ";
$select_order_product_query=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($select_order_product_query)){
$order_product_id = $row['product_id'];
$delete_product_purchase_rate = $row['product_purchase_rate'];
$delete_product_sale_rate = $row['product_sale_rate'];
$available_quantity = $row['product_quantities'];
$new_available_quantities = $available_quantity + 1;
$total_purchase_amount = $total_purchase_amount - $delete_product_purchase_rate  ;
$total_amount=$total_amount - $delete_product_sale_rate;


$query = "UPDATE products SET ";
$query.= "product_quantities = '{$new_available_quantities}' ";
$query .="WHERE product_id = {$order_product_id} ";
$update_product_query=mysqli_query($connection,$query);
    
}

$order_placed_query=mysqli_query($connection,$query);
    if(!$order_placed_query){
        die("Connection failed" .mysqli_error($connection));
    }
    
     header("Location: sales.php");

 }                                    
?>

                             
                                </tbody>
                            </table>
                             <div class="form-inline">
                            <div class="form-group">
                         <label for="net amount"> Total Amount: </label>   
                        <input class="form-group" value="<?php echo $total_amount; ?>" type="text" disabled>
                        </div>
                        
                        <div class="form-group"> 
                        <form action="" method="post">
                        <button value="current_order" name="place_order" class="btn btn-success">Place Order</button>
                       
                         </form> 
                          </div>
                        </div> 
                                       
                        
                        </form>
                         
<?php
    if(isset($_POST['place_order'])){
    $user_id = $_POST['place_order'];
    $query = "INSERT INTO report(sell_amount,sell_date,purchase_amount) ";
    $query.="VALUES('{$total_amount}',now(),'{$total_purchase_amount}') ";
    $report_query=mysqli_query($connection,$query);
    
    $query = "DELETE FROM checkout WHERE order_user_id = 'current_order' ";
    $delete_checkout = mysqli_query($connection,$query); 
        header("Location: sales.php");
        

    

}                       
      



?>                          
                         
                         
                         
                          
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
       <!-- /#page-wrapper -->
       <?php include "includes/footer.php" ?>