<?php include "includes/db.php" ?>
<?php include "includes/header.php" ?>
<?php if(isset($_SESSION['username'])){
 include "includes/navigation_user.php";
}else{
 include "includes/navigation.php";
}
?>

<div class="container">
    <h2 class="text-center"><b>Your Order Has Been Placed</b></h2><br>
    <h4 class="text-center">Thank you</h4>
    <h5 class="text-muted text-center">Your product will be deliver between 9 to 11 AM <br>if any querries please <a href="">contact us</a></h5>
</div>















<?php include "includes/footer.php" ?>