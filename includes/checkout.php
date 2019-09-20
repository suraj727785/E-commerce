<?php
if(isset($_POST['order'])){
$full_address = $_POST['full_address'];
$new_mobile_no= $_POST['new_mobno'];
$new_name= $_POST['new_name'];
if(!empty($full_address) && !empty($new_mobile_no) && !empty($new_name)  ){
    
$query ="SELECT * FROM carts WHERE user_id = '{$_SESSION['user_id']}' " ;
$placed_order_query=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($placed_order_query)){
$placed_user_id=$row['user_id'];
$placed_item=$row['order_name'];
$placed_product_id=$row['order_product_id'];
$order_price=$row['order_rate'];
$order_quantity=$row['order_quantity'];
$order_date= date('d-m-y');

$query= " INSERT INTO checkout(username,order_user_id,placed_product_id,full_name,mob_no,order_name,order_rate,order_quantity,order_date,full_address) ";

$query.= " VALUES('{$_SESSION['username']}','{$placed_user_id}','{$placed_product_id}','{$new_name}','{$new_mobile_no}','{$placed_item}','{$order_price}','{$order_quantity}', now() ,'{$full_address}' ) ";
$checkout_product_query=mysqli_query($connection,$query);
    
$query ="SELECT * FROM products WHERE product_id = '{$placed_product_id}' ";
$select_order_product_query=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($select_order_product_query)){
$order_product_id = $row['product_id'];
$available_quantity = $row['product_quantities'];
$new_available_quantities = $available_quantity - $order_quantity; 


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

$query="DELETE FROM carts WHERE user_id = '{$_SESSION['user_id']}' " ;
$placed_delete_order_query=mysqli_query($connection,$query);


$query = "SELECT * FROM checkout WHERE order_user_id = '{$_SESSION['user_id']}' ";
$insert_orders =mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($insert_orders)){
$order_user_id  = $row['order_user_id'];
      
$query = "INSERT INTO orders(order_user_id) ";
$query.= "VALUES('{$order_user_id }') ";
$confirm_order = mysqli_query($connection,$query);   
 break;
}


  header("Location: confirm_order.php");

}
else{
    echo"<script>alert('Field Cannot Be Empty.')</script>";
    
    }

}



?>