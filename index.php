<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php if(isset($_SESSION['username'])){
 include "includes/navigation_user.php";
}else{
 include "includes/navigation.php";
}
?>
<?php include "includes/sidebar.php" ?>
<?php include "includes/slider.php" ?>

<!----ON sale products------->

<?php
   
   $query="SELECT * FROM product_categories ";
   $categories_query = mysqli_query($connection,$query);
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
      <div class="row products">
         
         
    <?php
    $query="SELECT * FROM products WHERE product_category_id=$categories_id LIMIT 5";
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
                      <form method="post">
                      <label for="quantity">Quantity:</label>
                      <input name="quantity"  class="form-control " type="number" id="number" value="1" >
                     <button name="add" class="btn btn-success bg-light text-dark " value="<?php echo $product_id ?>">Add to Cart</button> 
                      </form>
              </div>
          </div>
         <?php
}
           ?>
           <div class="col-md-2">
              <div class="product-top">
                 <a href="product.php?cat_id=<?php echo $categories_id ?>">
                  <img src="images/view_all.jpg" alt="">
                  </a>
          </div> 
          </div>
    

      </div>
       </div> 
        <?php
}
           ?>      
      
   
</section>
<!--------Add To Cart -------------->
<?php include "includes/add_cart.php"?>



<!-------------Website Features------------------>
  <section class="website-features">
      <div class="container">
        <div class="row">
            <div class="col-md-3 feature-box">
                <img src="images/feature1.jpg" alt="">
                <div class="feature-text">
                    <p><b>100% Original items </b><br>are available here.</p>
                </div>
            </div>
            <div class="col-md-3 feature-box">
                <img src="images/delivery.jpg" alt="">
                <div class="feature-text">
                    <p><b>Get free delivery </b><br>for every order on more than 1000.</p>
                </div>
            </div>
            <div class="col-md-3 feature-box">
                <img src="images/replace.jfif" alt="">
                <div class="feature-text">
                    <p><b>Replacement of products</b><br>if packets are not opened.</p>
                </div>
            </div>
            <div class="col-md-3 feature-box">
                <img src="images/pay.jfif" alt="">
                <div class="feature-text">
                    <p><b>Pay Online through multiple </b><br>through multiple payment options.</p>
                </div>
            </div>
        </div>  
      </div>
  </section>      

<!----------Footer--------->
<?php include "includes/footer.php" ?>