<section class="header">
    <div class="side-menu" id="side-menu">
        <ul>
<?php


$query="SELECT * FROM product_categories ";
$categories_query=mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($categories_query)){
$categories_id = $row['categories_id'];
$categories_title = $row['categories_title'];

?>

            <a href="product.php?cat_id=<?php echo $categories_id ?>"><li><?php echo $categories_title ?><i class="fa fa-angle-right" aria-hidden="true"></i>
            
            </li></a>
            
<?php
   }
        
?>

        </ul>
    </div>
   
</section>