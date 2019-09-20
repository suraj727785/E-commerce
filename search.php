<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php if(isset($_SESSION['username'])){
 include "includes/navigation_user.php";
}else{
 include "includes/navigation.php";
}
?>



<section class="on-sale">
  <div class="container">
      <div class="title-box">
          <h2>Search Results</h2>
      </div>
      <div class="row">

  <?php
       
    if(isset($_GET['search_product'])){
     $search = $_GET['search'];
    
    
    $query = "SELECT * FROM products WHERE product_name LIKE '%$search%' ";
    $search_query = mysqli_query($connection,$query);
    if(!$search_query){
    die("query failed" . mysqli_error($connection));
 }
    $count = mysqli_num_rows($search_query);
    if($count == 0) {
       echo " <h1> NO RESULTS </h1>";
    }else{  

while($row=mysqli_fetch_assoc($search_query)){
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
                       <button name="add" class="btn btn-success bg-light text-dark " value="<?php echo $product_id ?>">Add to Cart</button> 
                      </form>
              </div>
          </div>
         <?php
}
           ?>
 



   </div>
        <?php
}}
           ?>      
      
  </div>  
</section>


<!--------Add To Cart -------------->
<?php include "includes/add_cart.php"?>






<?php include "includes/footer.php" ?>