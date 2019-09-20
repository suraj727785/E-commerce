<?php include "db.php"; ?>
<?php session_start(); ?>


<?php 
if(isset($_POST['login'])){
$username =$_POST['username']; 
$password =$_POST['password'];

$username =mysqli_real_escape_string($connection,$username);
$password =mysqli_real_escape_string($connection,$password);    
    
$query= "SELECT * FROM users WHERE username = '{$username}' " ;
$select_user_query = mysqli_query($connection,$query);
    if(!$select_user_query){
        die("Query Failed" .mysqli_error($connection));
    }
    
    
    while($row=mysqli_fetch_assoc($select_user_query)){
        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];
        $db_user_mobileno = $row['user_mobileno'];
    }
    
       $password = crypt($password,$db_user_password);
    
    if($username === $db_username && $password === $db_user_password){
        $_SESSION['user_id']=$db_user_id;
        $_SESSION['username']=$db_username;
        $_SESSION['password']=$password;
        $_SESSION['user_firstname']=$db_user_firstname;
        $_SESSION['user_lastname']=$db_user_lastname;
        $_SESSION['user_mobileno']=$db_user_mobileno;
        $_SESSION['user_role']=$db_user_role;

        
        header("Location: ../index_user.php");
    }
    else{
        header("Location: ../index.php");
    }
    
    
}




?>