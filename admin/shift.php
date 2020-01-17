<?php include '../classes/Customer.php';  ?>
﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

<?php 
if(!isset($_GET['vieworderId'])|| $_GET['vieworderId']==NULL){
   echo "<script>window.location='inbox.php'</script>";
   
} else {
$id=  $_GET['vieworderId']; 
}


?>

       <div class="grid_10">
            <div class="box round first grid">
                <h2>Shipping Details</h2>
            
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
                                                               <th>Order</th>
							<th>Name</th>
                                                               <th>Address</th>
							<th>Phone</th>
                                                               <th>Email</th>
                                                               <th>City</th>
                                                              
                                                              
						</tr>
					</thead>
					<tbody>
                                                  <?php
             $custo = new Customer();
             $getShift=$custo-> viewShiftByOrder($id);
                     if($getShift){
                    
                        while ($result=$getShift->fetch_assoc()){
                          
                     
                ?>
						<tr class="odd gradeX">
							<td><?php echo $result['shipping_id'] ?></td>
                                                               <td><?php echo $result['order_id'] ?></td>
							<td><?php echo $result['shippingName'] ?></td>
                                                               <td><?php echo $result['phone'] ?></td>
                                                               <td><?php echo $result['email'] ?></td>
							<td><?php echo $result['address'] ?></td>
                                                               <td><?php echo $result['city'] ?></td>
                                                              
                                                              
						</tr>
					<?php    }
                        
                     }
                ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>