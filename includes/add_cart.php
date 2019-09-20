<?php
if(isset($_POST['add'])){
    $purchase_product_id = $_POST['add'];
    $product_quantity = $_POST['quantity'];
    
    if(!$_SESSION['username']){
       echo"<script>alert('Please login/register to add items in your cart.')</script>";   
    }
    else{
  if($product_quantity <= 0){
       echo"<script>alert('Please Add Quantity.')</script>";
  }
    else{
      $query= "SELECT * FROM products WHERE product_id = '{$purchase_product_id}' " ;
      $purchase_product_query = mysqli_query($connection,$query);
      while($row = mysqli_fetch_assoc($purchase_product_query)){
        $purchase_product_id = $row['product_id'];
        $purchase_product_name = $row['product_name'];  
        $purchase_product_image = $row['product_image']; 
        $purchase_product_sale_rate = $row['product_sale_rate'];
        $purchase_product_quantities = $row['product_quantities']; 
      
          
      }
      
        if($purchase_product_quantities < $product_quantity){
          echo"<script>alert('Please select less quantity.')</script>";  
           }else{
             $query= " INSERT INTO carts(username,user_id,mob_no,order_product_id,order_name,order_rate,order_quantity) ";

            $query.= " VALUES('{$_SESSION['username']}','{$_SESSION['user_id']}','{$_SESSION['user_mobileno']}','{$purchase_product_id}','{$purchase_product_name}','{$purchase_product_sale_rate}','{$product_quantity}' ) ";
            
            $insert_order_query=mysqli_query($connection,$query);
            
        }
            
     
    }
      
      
  }
}






?>
