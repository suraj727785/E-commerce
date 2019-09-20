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
                            Welcome to Admin
                            <small><?php echo $_SESSION['username'];   ?></small>
                        </h1>
                        
                         
                       
    
<div class="col-lg-4">
<table class="table table-bordered table-hover">
 <thead>
                                    <tr>
                                       
                                        <th>Order No:</th>
                                        <th>View order</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
<?php

     $query ="SELECT * FROM orders ";
    $select_products_query = mysqli_query($connection,$query);

    while($row=mysqli_fetch_assoc($select_products_query)){
    $order_id = $row['order_id'];
    $order_user_id = $row['order_user_id'];

        
    echo "<tr>";

    echo "<td>{$order_user_id}</td>";
    echo "<td><a href='order_sale.php?&order_id={$order_user_id}'>View</a></td>"; 

        
    echo "</tr>";    
    
    
    
    
    }
     
    
    
    
?>                               
                                </tbody>
                            </table>
                                                  
                        </div>
                        
                        
                        
                        
    
       
                    
                      
                      
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
       <!-- /#page-wrapper -->
       <?php include "includes/footer.php" ?>