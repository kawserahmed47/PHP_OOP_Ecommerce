<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/Cart.php';  ?>
<?php include '../classes/Customer.php';  ?>
<?php 
 $cta= new Cart();
 $getOrder=$cta->getAllOrder();

?>

 <?php 
     
      if(isset($_GET['delorderId'])){
      $id=  $_GET['delorderId'];
      $delOrder=$cta->delOrderById($id);
 
}?>
 <?php 
     
      if(isset($_GET['changeId'])){
      $id=  $_GET['changeId'];
      $change=$cta->changeStatus($id);
 
}?>



        <div class="grid_10">
            <div class="box round first grid">
                <h2>Order Details</h2>
                <?php
                if(isset($delOrder)){
                   echo $delOrder;
                   
                }
                ?>
                  <?php
                if(isset($change)){
                   echo $change;
                   
                }
                ?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>ID</th>
							<th>CUSTOMER</th>
                                                               <th>PHONE</th>
							<th>PRODUCT</th>
                                                               <th>QUANTITY</th>
                                                               <th>PRICE</th>
                                                               <th>IMAGE</th>
                                                                <th>STATUS</th>
                                                               <th>ACTION</th>
						</tr>
					</thead>
					<tbody>
                                                <?php 
                                                if($getOrder){
                                                   while ($result=$getOrder->fetch_assoc()){
                                                      
                                                 
                                                ?>
						<tr class="odd gradeX">
							<td><?php echo $result['id'] ?></td>
							<td><?php echo $result['customerName'] ?></td>
                                                               <td><?php echo $result['phone'] ?></td>
                                                               <td><?php echo $result['productName'] ?></td>
							<td><?php echo $result['quantity'] ?></td>
                                                               <td><?php echo $result['price'] ?></td>
                                                                <td><img style="height: 80px; width: 80px" src="<?php echo $result['image']; ?>"></td>
                                                               <td>
                                                                  <?php
                                                                  if($result['status']==0){
                                                                     echo "<span style='color:red'>Pending</span>";
                                                                  } else {
                                                                     echo "<span style='color:green'>Successful</span>";   
                                                                  }
                                                                  
                                                                  
                                                                  ?>
                                                                  
                                                               </td>
                                                              
                                                               <td><a href="shift.php?vieworderId=<?php echo $result['id'] ?>">VIEW</a> || <a href="?changeId=<?php echo $result['id'] ?>">Success?</a> || <a href="?delorderId=<?php echo $result['id'] ?>">Delete</a></td>
						</tr>
						<?php   }
                                                } ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
