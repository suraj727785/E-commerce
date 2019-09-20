 <?php


if(isset($_GET['edit_user'])){
$edit_user_id = $_GET['edit_user'];
}

$query ="SELECT * FROM users WHERE user_id = $edit_user_id ";
$select_users_update = mysqli_query($connection,$query);

while($row=mysqli_fetch_assoc($select_users_update)){
    
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_password = $row['user_password'];
    $user_role = $row['user_role'];
//    $user_image = $row['user_image'];

   
   
}

//  $user_password = crypt($user_password,$db_user_password);




if(isset($_POST['edit_user'])){
$user_firstname=$_POST['user_firstname'];
$user_lastname=$_POST['user_lastname'];  
$user_role=$_POST['user_role'];
$username=$_POST['username'];  

//// Get image name
//$post_image = $_FILES['post_image']['name'];
//
//// image file directory
//$target = "../images/".basename($post_image);
//
//move_uploaded_file($_FILES['post_image']['tmp_name'], $target);
//   
    
$query="SELECT user_randSalt FROM users ";
$select_randSalt_query=mysqli_query($connection,$query);

if(!$select_randSalt_query){
    die("Query Failed" . mysqli_error($connection));
}

$row=mysqli_fetch_assoc($select_randSalt_query);
$randSalt=$row['user_randSalt'];


$user_email=$_POST['user_email'];    
$user_password=$_POST['user_password']; 

$crypt_password=crypt($randSalt,$user_password);
    
    
$query = "UPDATE users SET ";
$query .="user_id = '{$user_id}', "; 
$query .="username  = '{$username}', ";
$query .="user_firstname = '{$user_firstname}', "; 
$query .="user_lastname  = '{$user_lastname}', ";
$query .="user_email= '{$user_email}', ";
$query .="user_password  = '{$crypt_password}', ";
$query .="user_role  = '{$user_role}' ";  
$query .="WHERE user_id = {$edit_user_id } "; 
    
$update_user_query = mysqli_query($connection,$query);  
    
confirmQuery($update_user_query);
    

}
  ?> 
   <form action="" method="post" enctype="multipart/form-data" >
    <div class="form-group">
    <lebel for="first Name">First Name</lebel>    
    <input value="<?php if(isset($user_firstname)){ echo $user_firstname;} ?>" type="text" class="form-control" name="user_firstname">   
    </div>
    
       <div class="form-group">
    <lebel for="Llast Name">Last Name</lebel>    
    <input value="<?php if(isset($user_lastname)){ echo $user_lastname;} ?>" type="text" class="form-control" name="user_lastname">   
    </div>
    
    
     <div class="form-group"> 
    <select name="user_role" id="">
    <option  value='<?php echo $user_role ?>'><?php echo $user_role ?></option>
    <?php
    if($user_role == 'Admin'){
        echo "<option value='Subscriber'>Subscriber</option>";
    }else{
        echo "<option value='Admin''>Admin</option>";
        
    }
    
    ?>
    </select>
        
    </div>
      
<!--
       <div class="form-group">
    <lebel for="post_image">Post Image</lebel>    
    <input type="file" name="post_image">   
    </div>
-->
    
    
     <div class="form-group">
    <lebel for="username">Username</lebel>    
    <input value="<?php if(isset($username)){ echo $username;} ?>" type="text" class="form-control" name="username">   
    </div>
    
     <div class="form-group">
    <lebel for="user_email">Email</lebel>    
    <input value="<?php if(isset($user_email)){ echo $user_email;} ?>" type="email" class="form-control" name="user_email">   
    </div>
    
  
    
     <div class="form-group">
    <lebel for="password">Password</lebel>    
    <input value="<?php if(isset($user_password)){ echo $user_password;} ?>" type="password" class="form-control" name="user_password">   
    </div>
 
     <div class="form-group">
    <input type="submit" class="btn btn-primary" name="edit_user" value="Update User">    
     </div>
    
    
    
</form>