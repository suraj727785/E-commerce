<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php if(isset($_SESSION['username'])){
 include "includes/navigation_user.php";
}else{
 include "includes/navigation.php";
}
?>
<?php include "includes/sidebar.php" ?>

<?php
    
    if(isset($_GET['cat_id'])){
        $the_cat_id=$_GET['cat_id'];
    
   
   $query="SELECT * FROM product_categories WHERE categories_id= $the_cat_id ";
   $categories_query=mysqli_query($connection,$query);
   while($row=mysqli_fetch_assoc($categories_query)){
    $categories_id = $row['categories_id'];
    $categories_title = $row['categories_title'];

?>

<section class="on-sale">
  <div class="container">
      <div class="title-box">
          <h2><?php echo $categories_title ?></h2>
<!--          <p><a href="product.php?cat_id=<?php echo $categories_id ?>"></a></p>-->
      </div>
      <div class="row">

  <?php
    $query="SELECT * FROM products WHERE product_category_id=$categories_id ";
    $results=mysqli_query($connection,$query);


while($row=mysqli_fetch_assoc($results)){
    $product_id = $row['product_id'];
    $product_category_id = $row['product_category_id'];
    $product_name = $row['product_name'];
    $product_sale_rate = $row['product_sale_rate'];
    $product_mrp = $row['product_mrp'];
    $product_image = $row['product_image'];
  

     ?>
         
           <div class="col-md-2">
              <div class="product-top">
                  <img src="https://source.unsplash.com/4yta6mU66dE/700x400" alt="">
              </div>
              <div class="product-bottom ">
                      <h3><?php echo $product_name ?></h3>
                      <h5><b>MRP:  </b><?php echo $product_mrp ?></h5>
                      <form action="" method="post">
                      <label for="quantity">Quantity:</label>
                      <input name="quantity" class="form-control " type="number" id="number" value="1" >
                       <button id="add" name="add" class="btn btn-success bg-light text-dark " value="<?php echo $product_id ?>">Add to Cart</button> 
                      </form>
              </div>
          </div>
         <?php
}
           ?>
 



   </div>
        <?php
}
           ?>      
      
  </div>  
</section>

       <?php
}
           ?>    



<!--------Add To Cart -------------->
<?php include "includes/add_cart.php"?>






























<?php include "includes/footer.php" ?>