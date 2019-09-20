 <?php
if(isset($_POST['create_product'])){

$product_name=$_POST['product_name'];
$company=$_POST['company'];
$agency=$_POST['agency'];
$product_category=$_POST['product_category'];
$purchase_rate=$_POST['purchase_rate'];
$sale_rate=$_POST['sale_rate'];
$mrp=$_POST['mrp'];
$cgst=$_POST['cgst'];
$sgst=$_POST['sgst'];
$product_quantity=$_POST['product_quantity'];
$mfg=$_POST['mfg'];
$exp=$_POST['exp'];
$barcode=$_POST['barcode'];
    
$net_purchase_rate = $purchase_rate + ($purchase_rate*($cgst/100)) + ($purchase_rate*($sgst/100));


// Get image name
$product_image = $_FILES['product_image']['name'];

// image file directory
$target = "../images/".basename($product_image);

move_uploaded_file($_FILES['product_image']['tmp_name'], $target);
        

$mfg= date('d-m-y');
$exp= date('d-m-y');
    
    
    
$query= " INSERT INTO products(product_category_id,product_name,product_purchase_rate,net_purchase_rate,product_sale_rate,product_mrp,product_quantities,c_gst,s_gst,product_barcode,product_mfg,product_exp,product_manufacturer,product_distributor,product_image)" ;

$query.= "VALUES('{$product_category}','{$product_name}','{$purchase_rate}','{$net_purchase_rate}','{$sale_rate}','{$mrp}','{$product_quantity}','{$cgst}','{$sgst}','{$barcode}','{$mfg}','{$exp}','{$company}','{$agency}','{$product_image}' ) " ;
    
    
$create_product_query = mysqli_query($connection,$query);  
    
 if(!$create_product_query){
    die("Query failed".mysqli_error($connection));
        }



echo "Product Created";

 }



  ?> 
   <form action="" method="post" enctype="multipart/form-data" >
    <div class="form-inline">
    <div class="form-group">
    <lebel for="product name">Product Name</lebel>    
    <input type="text" class="form-control" name="product_name">   
    </div>
    
    <div class="form-group">
    <lebel for="manufacturer">Company</lebel>    
    <input type="text" class="form-control" name="company">   
    </div>
    
    <div class="form-group">
    <lebel for="distributor">Agency</lebel>    
    <input type="text" class="form-control" name="agency">   
    </div>
    </div>
    
     <div class="form-group">
     <lebel for="product category">Product Category:</lebel><br> 
    <select name="product_category" id="">
    <?php    

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
    <input type="number" class="form-control" name="purchase_rate">   
    </div>
    
    <div class="form-group">
    <lebel for="sale rate">Sale Rate</lebel>    
    <input type="number" class="form-control" name="sale_rate">   
    </div>
    
    <div class="form-group">
    <lebel for="mrp">MRP</lebel>    
    <input type="number" class="form-control" name="mrp"> 
     </div>
     
                   
    <div class="form-group">
    <lebel for="quantity">Quantity</lebel>    
    <input type="number" class="form-control" name="product_quantity">   
    </div>
    
    </div>
      
   <div class="form-inline pl-4">
    <div class="form-group">
    <lebel for="cgst">CGST</lebel>    
   <select name="cgst" id="">
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
    <input type=date class="form-control" name="mfg">   
    </div>

    <div class="form-group">
    <lebel for="exp">EXP</lebel>    
    <input type=date class="form-control" name="exp">   
    </div>
    </div>
 
     <div class="form-inline">
     <div class="form-group">
    <lebel for="product image">Product Image</lebel><br>   
    <input type="file" name="product_image">   
    </div>
    
    <div class="form-group">
    <lebel for="barcode">Barcode</lebel>    
    <input type="number" class="form-control" name="barcode">   
    </div>
    </div>
    

     <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_product" value="Create Product">    
     </div>
    
    
    
</form>