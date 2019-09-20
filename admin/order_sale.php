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
                         
<?php


if(isset($_GET['order_id'])){
$select_id = $_GET['order_id'];
    
    
$query="SELECT * FROM checkout WHERE order_user_id = {$select_id} ";
$sell_products_query = mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($sell_products_query)){
  

    $full_name = $row['full_name'];
    $mob_no = $row['mob_no'];
    $full_address = $row['full_address'];      

?>
               
                                           
                          <div class="form-inline">
                            <div class="form-group">
                            <lebel for="name">Customer Name:</lebel>    
                            <input value="<?php  echo $full_name;  ?>" type="text" class="form-control" name="customer_name">   
                            </div>
                            <div class="form-group">
                            <lebel for="mobile no">Mobile No:</lebel>    
                            <input value="<?php  echo $mob_no;  ?>" type="text" class="form-control" name="mobile_no">   
                            </div>
                            
                            <div class="form-group">
                            <lebel for="address">Address:</lebel>    
                            <input value="<?php  echo $full_address;  ?>" type="text" class="form-control" name="address">   
                            </div>
                            </div>
<?php
break;
    
}
    ?>

                        
                        
                        <table class="table table-bordered table-hover">


                           
                            <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>MRP</th>
                                        <th>Quantity</th>
                                        <th>Discount %</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
$query="SELECT * FROM checkout WHERE order_user_id = {$select_id} ";
$sell_products_query = mysqli_query($connection,$query);
$total_amount=0;
$total_purchase_amount=0;
while($row=mysqli_fetch_assoc($sell_products_query)){
  
    $placed_order_id = $row['placed_order_id'];
    $order_user_id = $row['order_user_id'];
    $placed_product_id = $row['placed_product_id'];
    $order_name = $row['order_name'];
    $order_rate = $row['order_rate'];
    $order_quantity = $row['order_quantity'];    

?>   
    
    

                                
                                
                                
                                <tr>
                                <td><?php echo $order_name ?></td>
                                <td><?php echo $order_rate ?></td>
                                <td><?php echo $order_quantity ?></td>
                                <td><input type='text' value='5'> </td>
                                <td><button name="delete_product" class="btn btn-danger" value="<?php echo $placed_order_id ?>">Delete</button></td>
                                </tr>
                                
                                

    
 <?php

$query="SELECT * FROM products WHERE product_id = {$placed_product_id} ";
$profit_count_query = mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($profit_count_query)){
$purchase_rate=$row['product_purchase_rate'];
     $total_purchase_amount = $total_purchase_amount + ($purchase_rate * $order_quantity) ;

}
        
    $total_amount=$total_amount + $order_rate;
    
    }



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
                        <button value="<?php echo $order_user_id ?>" name="place_order" class="btn btn-success">Place Order</button>
                        </div>
                        </div>
                        </form>
                        
                         
<?php
    if(isset($_POST['delete_product'])){
     
$delete_product_id=$_POST['delete_product'];
$query= "DELETE FROM checkout WHERE placed_order_id = {$delete_product_id}";
$delete_query = mysqli_query($connection,$query);
     

 }          



    if(isset($_POST['place_order'])){
    $user_id = $_POST['place_order'];
    $query = "INSERT INTO report(sell_amount,sell_date,purchase_amount) ";
    $query.="VALUES('{$total_amount}',now(),'{$total_purchase_amount}') ";
    $report_query=mysqli_query($connection,$query);
    
    $query = "DELETE FROM checkout WHERE order_user_id = {$user_id} ";
    $delete_checkout = mysqli_query($connection,$query); 
    
    $query = "DELETE FROM orders WHERE order_user_id = {$user_id} ";
    $delete_order = mysqli_query($connection,$query);
    header("Location: orders.php");
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