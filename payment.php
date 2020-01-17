<?php include 'inc/header.php'; ?>
 <?php 
     
      if(isset($_GET['delproduct'])){
      $id=  $_GET['delproduct'];
      $delCart=$ct->delCartById($id);
 
}?>
<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
   $cartId = $_POST['cartId'];
   $quantity = $_POST['quantity'];
 
    $updateCart = $ct->cartUpdate($quantity,$cartId);
    
}
?>
<?php
if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
   $cmrId = Session::get('customerId');
   $insertOrder= $ct->orderProduct($cmrId);
    $deldata= $ct->delCartData();
    header("Location:shipping.php");
   
}
?>

<?php
if(!isset($_GET['id'])){
  
echo "<meta http-equiv='refresh' content='0;URL=?id=live'/>";
 
}
?>
  

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Payment</h2>
                                                                                <?php if (isset($delCart)){
                          echo   $delCart ;
                           }
                            ?>
						<table class="tblone">
							<tr>
                                                                        <th width="5%">slID</th>
								<th width="15%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="15%">Quantity
                                                                        <br>
                                                                        <?php if (isset($updateCart)){
                          echo  $updateCart ;
                           }
                            ?>
                                                                        </th>
                                                                        
								<th width="15%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
                                                               
                                                               <?php
                                                               $getCart=$ct->getCartProduct();
                                                               if($getCart){
                                                                  $i=0;
                                                                  while($result=$getCart->fetch_assoc()){
                                                                     $i++;
                                                              
                                                               
                                                               ?>
							<tr>
                                                                  <td><?php echo $result['sId'];?></td>
                                                                  <td><?php echo $result['productName'];?></td>
                                                                  <td><img src="admin/<?php echo $result['image'];?>" alt=""/></td>
                                                                  <td><?php echo $result['price'];?></td>
                                                                  <td>
                                                                     
                                                                     <form action="" method="post">
                                                                         
                                                                        <input type="hidden" name="cartId" value="<?php echo $result['cartId'];?>"/>
                                                                     <input type="number" name="quantity" value="<?php echo $result['quantity'];?>"/>
                                                                     <input type="submit" name="submit" value="Update"/>
                                                                     </form>
                                                                  </td>
                                                                  <td><?php 
                                                                  $subtotal=$result['quantity']*$result['price'];
                                                                  echo $subtotal;?></td>
                                                                  <td><a onclick="return confirm('Are you sure to delete?')" href="?delproduct=<?php echo $result['cartId']; ?>">Delete</a></td>
							</tr>
							<?php     }
                                                               }?>
							
					   </table>
                                    
                                 
                                     <?php
                                                               $getCart1=$ct->getCartProduct();
                                                               if($getCart1){
                                                                 
                                                                    $total = 0;
                                                                   $subtotal1=0;
                                                                  while($result1=$getCart1->fetch_assoc()){
                                                                     $subtotal1=$result1['quantity']*$result1['price'];
                                                                           $total = $total + $subtotal1;
                                                                   
                                                              
                                                               }} ?>
                                                             
                                    <table id="aaaa" style="float:right;text-align:left;" width="45%">
							<tr>
								<th>Sub Total : </th>
                                                                   
                                                                        <td>
                                                                           
                                                                           <?php 
                                                                  echo $total; 
                                                                  Session::set("sum", $total);
                                                                           
                                                                           ?>
                                                                           TK.
                                                                        </td>
                                                             
							</tr>
							<tr>
								<th>VAT : </th>
								<td>0 TK. </td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>  
                                                                           <?php 
                                                                  echo $total; 
                                                                           
                                                                           ?>
                                                                           TK. </td>
							</tr>
					   </table>
                                   
                                  </div>
            
            
            
            
            
					<div class="shopping">
						<div class="shopleft">
                                                         <label>Offline Payment</label><br>
                                                         <a href="?orderid=order"> <img style=" height: 100px" src="images/onlinePayment.jpg" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="online.php"> <img src="images/onlinePayment.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
  <?php include 'inc/header.php'; 