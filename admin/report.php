<?php include "includes/header.php"  ?>
    <div id="wrapper">
<?php
    
    
?>
        <!-- Navigation -->
       <?php include "includes/navigation.php"?>
        <div id="page-wrapper">
       <div class="container-fluid">
           
       </div><!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12"> 
                   <h1 class="page-header">
                            Welcome to Reports
                            <small><?php echo $_SESSION['username'];   ?></small>
                        </h1>
                        
                    <div class="col-xs-6">
                        <form action="" method="post" >
                           <label for="select date">Select Date:
                                   </label>
                            <div class="form-inline">
                                <div class="form-group">
                                    <input name="report_date" type=date>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-secondary" name="show">Show</button>
                                </div>
                            </div>
                        </form>
                    </div> 
                     
                        <div class="col-xs-6">
                          <table class="table table-bordered table-hover ">
                                  <thead>
                                      <tr>
                                          <th>Sell Id</th>
                                          <th>Sell Amount</th>
                                          <th>Purchase Amount</th>
                                          <th>Profit</th>
                                          <th>Profit %</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                
                      
                     
<?php                   
   $total_sell_amount=0;
   $total_purchase_amount=0;
 if (isset($_POST['show'])){
     $report_date=$_POST['report_date'];
     $query="SELECT * FROM report WHERE sell_date = '{$report_date}' ";
     $select_report_query=mysqli_query($connection,$query);
     if(!$select_report_query){
         die("Query Failed" .mysqli_error($connection));
     }
     while($row=mysqli_fetch_assoc($select_report_query)){
     $sell_id=$row['sell_id'];
     $sell_amount=$row['sell_amount'];
     $purchase_amount=$row['purchase_amount'];
     $profit=$sell_amount-$purchase_amount;
     $profit_percent=(($sell_amount*100)/$purchase_amount)-100;
       
       $total_sell_amount = $total_sell_amount + $sell_amount;
       $total_purchase_amount = $total_purchase_amount + $purchase_amount;
     
        echo "<tr>";
        echo"<td>{$sell_id}</td>";
        echo"<td>{$sell_amount}</td>";
        echo"<td>{$purchase_amount}</td>";
        echo"<td>{$profit}</td>";
        echo"<td>{$profit_percent}</td>";
         echo "</tr>";
         
         
         
     }
     $total_profit = $total_sell_amount - $total_purchase_amount;
     $total_profit_percent = (($total_sell_amount*100)/$total_purchase_amount)-100;
        echo "<tr>";
        echo"<td>Total</td>";
        echo"<td>{$total_sell_amount}</td>";
        echo"<td>{$total_purchase_amount}</td>";
        echo"<td>{$total_profit}</td>";
        echo"<td>{$total_profit_percent}</td>";
         echo "</tr>";     
     
     
     
     
 }                
                 
                
               
              
             
?>            
           
          
         
                   </tbody>
                    </table> 
                           
                        </div>
       
        </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
       <!-- /#page-wrapper -->
       <?php include "includes/footer.php" ?>