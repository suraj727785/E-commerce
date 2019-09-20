<?php

function confirmQuery($result){
  global  $connection;
    
    if(!$result){
            die("Query failed".mysqli_error($connection));
        }
   
 
}





function insert_categories(){
    global $connection;
    
    if(isset($_POST['submit'])){
$cat_title=$_POST['cat_title'];
    if($cat_title =="" || empty($cat_title)){
         echo " This field should not be empty";
    }
    else{
        $query = "INSERT INTO product_categories(categories_title) ";
        $query.= "VALUE('{$cat_title}') "; 
        
        $create_category_query = mysqli_query($connection,$query);
        
        if(!$create_category_query){
            die("Query failed" .mysqli_error($connection));
        } }}
    
    
}

function find_all_prodct_categories(){
     global $connection;
  $query ="SELECT * FROM product_categories";
$select_product_categories = mysqli_query($connection,$query);
                                      
while($row=mysqli_fetch_assoc($select_product_categories)){
$cat_title = $row['categories_title'];
$cat_id = $row['categories_id'];
echo"<tr>";
echo"<td>{$cat_id}</td>";
echo"<td>{$cat_title}</td>";
echo"<td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>";
echo"<td><a href='categories.php?edit={$cat_id}'>EDIT</a></td>";
echo"</tr>";

} }



function delete_categories(){
     global $connection;
    if(isset($_GET['delete'])){
     
$delete_cat_id=$_GET['delete'];
$query= "DELETE FROM product_categories WHERE categories_id = {$delete_cat_id}";
$delete_query = mysqli_query($connection,$query);
     
header("Location: categories.php");
 }                          
}



?>