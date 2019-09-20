<div class="top-nav-bar">
<div class="search-box">
   <i class="fa fa-bars" aria-hidden="true" id="menu-btn" onclick="openmenu()"></i>
   <i class="fa fa-times" aria-hidden="true" id="close-btn" onclick="closemenu()"></i>
    <a href="index.php"><img  class="logo"src="images/easy1.png" alt=""></a>
      <form class="form-inline" method="get" action="search.php">
            <input class="form-control mr-2" name="search" type="text"  placeholder="Search Products">
            <button class="btn btn-light" name="search_product" type="submit">Search</button>
        </form>

</div>
<div class="menu-bar">
    <ul>
        <li><a href="index.php">Home</a></li>
        
<?php 
        if(isset($_SESSION['user_role'])){
        $user_role=$_SESSION['user_role'];
        if($user_role==='Admin'){
          echo  "<li><a href='admin'>Admin</a></li>";
        }
        elseif($user_role==='Salesman'){
          echo  "<li><a href='sales'>Sale</a></li>";
        }
        else{
            echo "<li><a href='profile.php'>Profile</a></li>" ;
        }
        }
?>
         <li><a href='includes/logout.php'>Logout</a></li>
        <li><a href="cart.php?p_cart=<?php echo $_SESSION['username'] ?>" ><i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart</a></li>
    </ul>
</div>
</div>

