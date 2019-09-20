<?php

if(isset($_GET['p_id'])){
$edit_product_id = $_GET['p_id'];

}
$query ="SELECT * FROM products WHERE product_id = $edit_product_id ";
$select_product_update = mysqli_query($connection,$query);

while($row=mysqli_fetch_assoc($select_product_update)){
$product_id=$row['product_id'];  
$product_name=$row['product_name'];
$company=$row['product_manufacturer'];
$agency=$row['product_distributor'];
$product_category=$row['product_category_id'];
$purchase_rate=$row['product_purchase_rate'];
$sale_rate=$row['product_sale_rate'];
$mrp=$row['product_mrp'];
$cgst=$row['c_gst'];
$sgst=$row['s_gst'];
$product_quantity=$row['product_quantities'];
$mfg=$row['product_mfg'];
$exp=$row['product_exp'];
$barcode=$row['product_barcode'];
$product_image=$row['product_image'];
   

}


 if(isset($_POST['edit_product'])){

$product_name=$_POST['product_name'];
$product_manufacturer=$_POST['company'];
$product_distributor=$_POST['agency'];
$product_category_id=$_POST['product_category'];
$product_purchase_rate=$_POST['purchase_rate'];
$product_sale_rate=$_POST['sale_rate'];
$product_mrp=$_POST['mrp'];
$product_cgst=$_POST['cgst'];
$product_sgst=$_POST['sgst'];
$product_quantities=$_POST['product_quantity'];
$product_mfg=$_POST['mfg'];
$product_exp=$_POST['exp'];
$product_barcode=$_POST['barcode']; 
$net_purchase_rate = $product_purchase_rate + ($product_purchase_rate*($product_cgst/100)) + ($product_purchase_rate*($product_sgst/100));
     
if(!empty($_FILES['product_image']['name'])){    
$new_product_image = $_FILES['product_image']['name'];
$target = "../images/".basename($new_product_image);
     

move_uploaded_file($_FILES['product_image']['tmp_name'], $target);
}
else{
  $new_product_image = $product_image; 
}
     
$query = "UPDATE products SET ";
$query .="product_name = '{$product_name}', "; 
$query .="product_manufacturer  = '{$product_manufacturer}', ";
$query .="product_category_id = '{$product_category_id}', "; 
$query .="product_purchase_rate = '{$product_purchase_rate}', ";
$query .="net_purchase_rate = '{$net_purchase_rate}', ";
$query .="product_sale_rate  = '{$product_sale_rate}', ";
$query .="product_mrp = '{$product_mrp}', "; 
$query .="c_gst  = '{$product_cgst}', ";
$query .="s_gst= '{$product_sgst}', ";
$query .="product_quantities  = '{$product_quantities}', ";
$query .="product_mfg  = '{$product_mfg}', ";
$query .="product_exp= '{$product_exp}', ";
$query .="product_barcode  = '{$product_barcode}', ";
$query .="product_image  = '{$new_product_image}' "; 
$query .="WHERE product_id = {$product_id} ";
 
     
$update_query= mysqli_query($connection,$query);
confirmQuery($update_query);
     
echo "<p class='bg-success'>Products Update.. <a href='./product.php'> Edit More Products</a><p>";

 }

   
  ?> 
   <form action="" method="post" enctype="multipart/form-data" >
    <div class="form-inline">
    <div class="form-group">
    <lebel for="product name">Product Name</lebel>    
    <input value="<?php if(isset($product_name)){ echo $product_name;} ?>" type="text" class="form-control" name="product_name">   
    </div>
    
    <div class="form-group">
    <lebel for="manufacturer">Company</lebel>    
    <input value="<?php if(isset($company)){ echo $company;} ?>" type="text" class="form-control" name="company">   
    </div>
    
    <div class="form-group">
    <lebel for="distributor">Agency</lebel>    
    <input value="<?php if(isset($agency)){ echo $agency;} ?>" type="text" class="form-control" name="agency">   
    </div>
    </div>
    
     <div class="form-group">
     <lebel for="product category">Product Category:</lebel><br> 
    <select name="product_category" id="">
    <?php    
$query ="SELECT * FROM product_categories WHERE categories_id = {$product_category} ";
$select_categories_query = mysqli_query($connection,$query);
confirmQuery($select_categories_query);

while($row=mysqli_fetch_assoc($select_categories_query)){
$old_cat_title = $row['categories_title'];
$old_cat_id = $row['categories_id'];
  
echo "<option value='{$old_cat_id}'>{$old_cat_title}</option>";

}
        
$query ="SELECT * FROM product_categories ";
$select_categories = mysqli_query($connection,$query);
confirmQuery($select_categories);

while($row=mysqli_fetch_assoc($select_categories)){
$cat_title = $row['categories_title'];
$cat_id = $row['categories_id'];
  
echo "<option value='{$cat_id}'>{$cat_title}</option>";

}
        
  ?>  
       
    </select>
        
    </div>
    
    <div class="form-inline">
     <div class="form-group">
    <lebel for="purchase rate">Purchase Rate</lebel>    
    <input value="<?php if(isset($purchase_rate)){ echo $purchase_rate;} ?>" type="number" class="form-control" name="purchase_rate">   
    </div>
    
    <div class="form-group">
    <lebel for="sale rate">Sale Rate</lebel>    
    <input value="<?php if(isset($sale_rate)){ echo $sale_rate;} ?>" type="number" class="form-control" name="sale_rate">   
    </div>
    
    <div class="form-group">
    <lebel for="mrp">MRP</lebel>    
    <input value="<?php if(isset($mrp)){ echo $mrp;} ?>" type="number" class="form-control" name="mrp"> 
     </div>
     
                   
    <div class="form-group">
    <lebel for="quantity">Quantity</lebel>    
    <input value="<?php if(isset($product_quantity)){ echo $product_quantity;} ?>" type="number" class="form-control" name="product_quantity">   
    </div>
    
    </div>
      
   <div class="form-inline pl-4">
    <div class="form-group">
    <lebel for="cgst">CGST</lebel>    
   <select name="cgst" id="">
   <option value="<?php if(isset($cgst)){ echo $cgst;} ?>"><?php if(isset($cgst)){ echo $cgst;} ?>%</option>
   <option value="0">Non</option>
   <option value="3">3%</option>
   <option value="5">5%</option>
   <option value="9">9%</option>
   <option value="12">12%</option>
   <option value="18">18%</option> 
   </select>  
    </div>
    
    <div class="form-group">
    <lebel for="sgst">SGST</lebel>    
   <select name="sgst" id="">
   <option  value="<?php if(isset($sgst)){ echo $sgst;} ?>"><?php if(isset($sgst)){ echo $sgst;} ?>%</option>
   <option value="0">Non</option>
   <option value="3">3%</option>
   <option value="5">5%</option>
   <option value="9">9%</option>
   <option value="12">12%</option>
   <option value="18">18%</option> 
   </select>  
    </div>
    
    </div>        
          

    
    <div class="form-inline">
    <div class="form-group">
    <lebel for="mfg">MFG</lebel>    
    <input value="<?php if(isset($mfg)){ echo $mfg;} ?>" type=date class="form-control" name="mfg">   
    </div>

    <div class="form-group">
    <lebel for="exp">EXP</lebel>    
    <input value="<?php if(isset($exp)){ echo $exp;} ?>" type=date class="form-control" name="exp">   
    </div>
    </div>
 
     <div class="form-inline">
     <div class="form-group">
    <lebel for="product image">Product Image</lebel><br>
    <img width='100'  src="../images/<?php echo $product_image; ?>" alt="image">   
    <input value="<?php  echo $product_image; ?>" type="file" name="product_image">   
    </div>
    
    <div class="form-group">
    <lebel for="barcode">Barcode</lebel>    
    <input value="<?php if(isset($barcode)){ echo $barcode;} ?>" type="number" class="form-control" name="barcode">   
    </div>
    </div>
    

     <div class="form-group">
    <input type="submit" class="btn btn-primary" name="edit_product" value="Edit Product">    
     </div>
    
    
    
</form>
