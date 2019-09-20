 <?php

if(isset($_POST['create_user'])){
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
$user_email=$_POST['user_email'];    
$user_password=$_POST['user_password']; 
    
    
  
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
    
    
    
$query= " INSERT INTO    users(user_firstname,user_lastname,user_role,username,user_email,user_password) ";

$query.= " VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$crypt_password}') ";
    
    
$create_user_query = mysqli_query($connection,$query);  
    
confirmQuery($create_user_query);
    
echo "User Created:"." "."<a href='users.php'>View Users</a>";
    


}
  ?> 
   <form action="" method="post" enctype="multipart/form-data" >
    <div class="form-group">
    <lebel for="first Name">First Name</lebel>    
    <input type="text" class="form-control" name="user_firstname">   
    </div>
    
       <div class="form-group">
    <lebel for="Llast Name">Last Name</lebel>    
    <input type="text" class="form-control" name="user_lastname">   
    </div>
    
    
     <div class="form-group"> 
    <select name="user_role" id="">
    <option value="Subscriber">Select Option</option>
    <option value="Admin">Admin</option>
    <option value="Subscriber">Subscriber</option>
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
    <input type="text" class="form-control" name="username">   
    </div>
    
     <div class="form-group">
    <lebel for="user_email">Email</lebel>    
    <input type="email" class="form-control" name="user_email">   
    </div>
    
  
    
     <div class="form-group">
    <lebel for="password">Password</lebel>    
    <input type="password" class="form-control" name="user_password">   
    </div>
 
     <div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_user" value="Submit">    
     </div>
    
    
    
</form>