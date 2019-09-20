<?php include "includes/header.php"  ?>
    <div id="wrapper">

        <!-- Navigation -->
       <?php include "includes/navigation.php"?>
        <div id="page-wrapper">
       <div class="container-fluid">
           
       </div><!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                            Welcome to Sales
                            <small><?php echo $_SESSION['username'];   ?></small>
                        </h1> 
                        <?php
    
if(isset($_GET['source'])){
    $source = $_GET['source'];
}
else{
    $source = " ";
}
switch($source ){
   
        case 'add_product';
        include "includes/add_product.php"; 
        break;
        
        case 'edit_product';
        
        include "includes/edit_product.php";
        break;
        
       default:
            
           include "includes/veiw_all_products.php"; 
        
           break;
        
        
        
        
}
    
    
?>
           
                      
                      
                      
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
       <!-- /#page-wrapper -->
       <?php include "includes/footer.php" ?>