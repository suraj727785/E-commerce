<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>

<?php
    
   if(isset($_GET['u_id'])){
       $edit_user_id=$_GET['u_id'];
       $db_user_password=$_SESSION['password'];
       
       $query = "SELECT * FROM users WHERE user_id ='{$edit_user_id}' " ;
       $select_user_profile_query = mysqli_query($connection,$query);
       
       
while($row=mysqli_fetch_assoc($select_user_profile_query)){
    
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_mobileno = $row['user_mobileno'];
    
    
  $user_password = crypt($db_user_password,$user_password);

       }
  
    }





if(isset($_POST['edit_user_profile'])){
$user_firstname=$_POST['user_firstname'];
$user_lastname=$_POST['user_lastname']; 
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
$user_new_password=$_POST['user_password'];
$new_mobileno = $_POST['new_mobileno'];

    
$username = mysqli_real_escape_string($connection,$username);
$user_email = mysqli_real_escape_string($connection,$user_email);
$user_password = mysqli_real_escape_string($connection,$user_password);
$query="SELECT user_randSalt FROM users ";
$select_randSalt_query= mysqli_query($connection,$query);

if(!$select_randSalt_query){
    die("Query Failed".mysqli_error($connection));
}

$row=mysqli_fetch_assoc($select_randSalt_query);

$randSalt=$row['user_randSalt'];
$user_new_password=crypt($user_new_password,$randSalt);

    
    
$query = "UPDATE users SET ";
$query .="username  = '{$username}', ";
$query .="user_firstname = '{$user_firstname}', "; 
$query .="user_lastname  = '{$user_lastname}', ";
$query .="user_email= '{$user_email}', ";
$query .="user_password  = '{$user_new_password}', ";
$query .="user_mobileno  = '{$new_mobileno}' ";  
$query .="WHERE user_id = {$edit_user_id} "; 
    
$update_user_query = mysqli_query($connection,$query);  
if(!$update_user_query){
    die("Query Failed".mysqli_error($connection));
}

    
    

}
   
   ?>
    <div id="wrapper">

        <!-- Navigation -->
       <?php include "includes/navigation_user.php"?>
        <div id="page-wrapper">
       <div class="container-fluid">
           
       </div><!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                            Welcome 
                            <small><?php echo $_SESSION['username'];   ?></small>
                        </h1> 
                        
                        
                        
    <form action="" method="post" enctype="multipart/form-data" >
    <div class="form-group">
    <lebel for="first Name">First Name</lebel>    
    <input value="<?php if(isset($user_firstname)){ echo $user_firstname;} ?>" type="text" class="form-control" name="user_firstname">   
    </div>
    
       <div class="form-group">
    <lebel for="Llast Name">Last Name</lebel>    
    <input value="<?php if(isset($user_lastname)){ echo $user_lastname;} ?>" type="text" class="form-control" name="user_lastname">   
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
    <lebel for="user_mobileno">Mobile No:</lebel>    
    <input value="<?php if(isset($user_mobileno)){ echo $user_mobileno;} ?>" type="number" class="form-control" name="new_mobileno" >   
    </div>
    
  
    
     <div class="form-group">
    <lebel for="password">Password</lebel>    
    <input value="" type="password" placeholder="Enter Password" class="form-control" name="user_password"  required>   
    </div>
 
     <div class="form-group">
    <input type="submit" class="btn btn-primary" name="edit_user_profile" value="Update Profile">    
     </div>
    
    
    
</form>
    
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
       <!-- /#page-wrapper -->
       <?php include "includes/footer.php" ?>