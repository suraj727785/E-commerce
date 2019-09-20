<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php if(isset($_SESSION['username'])){
 include "includes/navigation_user.php";
}else{
 include "includes/navigation.php";
}
?>
<?php
$query="SELECT * FROM users WHERE user_id = '{$_SESSION['user_id']}' ";
$selct_profile_query = mysqli_query($connection,$query);
while($row=mysqli_fetch_assoc($selct_profile_query)){
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_mobileno = $row['user_mobileno'];
}
    
?>

<section>
<div class="container">

     <h1 class="page-header">
    Welcome 
    <small><?php echo $_SESSION['username'];   ?></small>
</h1> 
                        

<div class="header">
 <label class="label" for="name">Name:</label>
  <h3><?php echo $user_firstname; echo " "; echo "$user_lastname";  ?></h3><br>
  <label class="label" for="email">Email:</label>
  <h3><?php echo $user_email; ?></h3><br>
  <label class="label" for="mobileno">Mobile No:</label>
  <h3><?php echo $user_mobileno; ?></h3><br>
  <a class="btn btn-secondary" href="edit_profile.php?u_id=<?php echo $user_id; ?>">Update Profile</a>
   
    
</div>

</div>
</section>
























<?php include "includes/footer.php" ?>