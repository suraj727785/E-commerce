<div class="top-nav-bar">
<div class="search-box">
   <i class="fa fa-bars" aria-hidden="true" id="menu-btn" onclick="openmenu()"></i>
   <i class="fa fa-times" aria-hidden="true" id="close-btn" onclick="closemenu()"></i>
    <a href="index.php"><img  class="logo"src="images/easy1.png" alt=""></a>
      <form class="form-inline" id="search" method="post" action="search.php">
            <input class="form-control mr-2" name="search" type="text"  placeholder="Search Products">
            <button class="btn btn-light" name="search_product" type="submit">Search</button>
        </form>

</div>
<div class="menu-bar">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="signup.php">Sign Up</a></li>
        <li><a href="" data-toggle="modal" data-target="#loginModal">Login</a></li>
        <li><a href="cart.php?p_cart=<?php echo $_SESSION['username'] ?>" ><i class="fa fa-shopping-cart" aria-hidden="true"></i>Cart</a></li>
    </ul>
</div>
</div>


<!-------Login Modal-------->
<div class="modal" id="loginModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Login</h5>
            <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <form method="post" action="includes/login.php">
              <div class="form-group">
                <label for="username">Username</label>
                <input name="username" type="text" placeholder="Username" class="form-control">
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" placeholder="Password" class="form-control">
              </div>
            
          
          <div class="modal-footer">
            <button name="login" type="submit" class="btn btn-primary" >Login</button>
          </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    
