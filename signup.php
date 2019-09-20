<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 
 
 <?php
if(isset($_POST['register'])){
    
    $new_firstname = $_POST['firstname'];
    $new_lastname = $_POST['lastname'];
    $new_username = $_POST['username'];
    $new_user_email = $_POST['email'];
    $new_password = $_POST['password'];
    $new_user_mobno = $_POST['mobile_no'];
    
    $new_username = mysqli_real_escape_string($connection,$new_username);
    $new_user_email = mysqli_real_escape_string($connection,$new_user_email);
    $new_password = mysqli_real_escape_string($connection,$new_password);
            
    $query="SELECT user_randSalt FROM users ";
    $select_randSalt_query= mysqli_query($connection,$query);
    
    if(!$select_randSalt_query){
        die("Query Failed".mysqli_error($connection));
    }
    
  $row=mysqli_fetch_assoc($select_randSalt_query);
        
   $randSalt=$row['user_randSalt'];
    $new_password=crypt($new_password,$randSalt);
    
    
    
    if(!empty($new_firstname) && !empty($new_lastname) && !empty($new_username) && !empty($new_user_email) && !empty($new_password) ){
    
    $query= " INSERT INTO users(user_firstname,user_lastname,user_role,username,user_mobileno,user_email,user_password) ";

$query.= " VALUES('{$new_firstname}','{$new_lastname}','Subscriber','{$new_username}','{$new_user_mobno}','{$new_user_email}','{$new_password}') ";
    
    $register_new_user=mysqli_query($connection,$query);
    if(!$register_new_user){
       die("Query Failed".mysqli_error($connection) . ' ' .mysqli_errno($connection));
    }
        
    echo"<script>alert('Thank you. Please login to purchase.')</script>"; 
        

    

    }
    else{
 
    echo"<script>alert('Field Cannot Be Empty.')</script>";
    
    }

    
    
}





?>
 
 
 


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container ">
    
<section id="login">
    <div class="container ">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap signup">
                <h1>Register</h1>
                    <form role="form" action="signup.php" method="post" id="login-form" autocomplete="off">
                       
                       <div class="form-group">
                            <label for="firstname" class="sr-only">First Name</label>
                            <input type="text" name="firstname" id="username" class="form-control" placeholder="Enter Your First Name">
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="sr-only">Last Name</label>
                            <input type="text" name="lastname" id="username" class="form-control" placeholder="Enter Your Last Name">
                        </div>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                        <div class="form-group">
                            <label for="mobile no" class="sr-only">Mobile No</label>
                            <input type="text" name="mobile_no" id="mobile_no" class="form-control" placeholder="Enter Your Mobile No.">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="register" id="btn-login" class="btn btn-custom btn-primary btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>
</div>

        <hr>


 <?php  include "includes/footer.php"; ?>

