<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php if(isset($_SESSION['username'])){
 include "includes/navigation_user.php";
}else{
 include "includes/navigation.php";
}
?>



<div class="container">
  <h1>Your Order</h1>
   <div class="table-responsive">
    <table class="table">
            <thead>
               
                <tr>
                    
                    <th>Items</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Sub Total</th>
                   
                </tr>
            </thead>
            <tbody>
             
             
  <?php
    $total_price=0;
if(isset($_GET['p_cart'])){

$query = "SELECT * FROM carts WHERE user_id = '{$_SESSION['user_id']}' ";
$enter_cart_query=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($enter_cart_query)){
$order_id=$row['order_id'];
$order_product_id=$row['order_product_id'];
$item=$row['order_name'];
$unit_price=$row['order_rate'];
$unit_quantity=$row['order_quantity'];
$sub_total= $unit_price * $unit_quantity;
$total_price=$total_price + $sub_total;
?>
               
               
                <tr>
                   <div>
                    <td><?php echo $item ?></td>
                    <td><?php echo $unit_price ?></td>
                    <td><?php echo $unit_quantity ?></td>
                    <td><?php echo $sub_total ?></td>
                    <td><a href="cart.php?delete_item=<?php echo $order_id ?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                    </div>
                </tr>
<?php
    
}
?>
               
            </tbody>
        </table>
        </div>
</div>
<section class="checkout">
    <div class="container">
            <form action="" method= "post">
<?php
$query= "SELECT * FROM users WHERE user_id = '{$_SESSION['user_id']}'  " ;
$select_user_query = mysqli_query($connection,$query);

while($row=mysqli_fetch_assoc($select_user_query)){
$cart_user_id = $row['user_id'];
$cart_user_firstname = $row['user_firstname'];
$cart_user_lastname = $row['user_lastname'];
$cart_user_mobileno = $row['user_mobileno'];
 
?>
                <div class="form-inline">
                <div class="form-input">
                <label for="full name"><b>Your Name:</b></label>
                <input name="new_name" type="text" class="form-control" value="<?php echo $cart_user_firstname; echo " "; echo  $cart_user_lastname;  ?>">
                </div>
                <div class="form-input">
                <label for="full name"><b>Mobile no.</b></label>
                <input name="new_mobno" type="text" class="form-control" value="<?php echo $cart_user_mobileno ?>">
                </div>
                <div class="form-input">
                <label for="full name"><b>Full Address</b></label>
                <input name="full_address" type="text" class="form-control" placeholder="Please Enter full Adderess">
                </div>
                <div class="form-input">
                <label for="full name"><b>Total Price</b></label>
                <input type="text" name="total_price" value="<?php echo $total_price ?>" class="form-control" disabled>
                </div>
                <div class="form-input" id="btn-order">
                <button  name="order" class="btn btn-secondary btn-lg">Place Order</button>
                </div>
                 <h5 class="text-muted">Your product will be deliver between 9 to 11 AM <br>if any querries please <a href="">contact us</a></h5>
               </div>
               
    <?php
}
     ?>
              </form>
        </div>
  
</section>


<?php
}
?>

<?php
if(isset($_GET['delete_item'])){
    $delete_order_id=$_GET['delete_item'];
    $query ="DELETE FROM carts WHERE order_id = '{$delete_order_id}' ";
    $delete_row_query=mysqli_query($connection,$query);
    $x=$_SESSION['username'];
    header("Location: cart.php?p_cart=$x");
}



?>

<?php include "includes/checkout.php" ?>
<?php include "includes/footer.php" ?>