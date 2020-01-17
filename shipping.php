<?php include 'inc/header.php'; ?>
<?php
$loginck = Session::get("cuslogin");
        if($loginck == FALSE){
          header("Location:login.php");
        }

?>
       <?php


if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
  $loginId = Session::get("customerId");
   $shippingAddress =$cust->shippingInformation($_POST,$loginId);
   
}

?>
   
 <div class="main">
    <div class="content ">
 <div class="register_account ">
    		<h3>Shipping Information</h3>
                 <?php
                 if(isset($shippingAddress)){
                    echo $shippingAddress;
                 }
                 ?>
                  <form action="" method="post">
		 <table>
		  <tbody>
                     <tr>
                        <td>
			<div>
                              <input type="text" value=""required="" name="shippingName" placeholder="Shipping Name" >
			</div>
							
			<div>
                              <input type="text" value=""required="" name="address" placeholder="Shipping Address" >
			</div>
							
							
		     </td>
		    	
		    </tr> 
                       <tr>
                        <td>
			<div>
                              <input type="text" value=""required="" name="email" placeholder="Email" >
			</div>
							
			<div>
                              <input type="text" value=""required=""name="phone" placeholder="Phone" >
			</div>
							
							
		     </td>
		    	
		    </tr> 
                       <tr>
                        <td>
						
			<div>
                              <input type="text" required="" name="city" placeholder="City">
			</div>
							
				<div>
                                       <input type="submit" name="submit" Value="Submit"
			</div>
							
		     </td>
		    	
		    </tr> 
		    </tbody></table> 
		   
		    </form>
    	</div>  	
        <div class="clear"></div>
    </div>
 </div>
  <?php include 'inc/footer.php'; 