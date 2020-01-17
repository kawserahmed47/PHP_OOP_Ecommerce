<?php include 'inc/header.php'; ?>

<?php
$loginck = Session::get("cuslogin");
        if($loginck == TRUE){
          header("Location:order.php");
        }

?>

     <?php


if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
  
   $customerLoginCk =$cust->customerLogin($_POST);
   
}

?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
              <span style="color: red; font-size: 18px;"> 
                           <?php if (isset($customerLoginCk)){
                                               echo  $customerLoginCk;
                           } ?>
                           </span>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post">
			<h1>Admin Login</h1>
                          
			<div>
				<input type="text" placeholder="Username"  name="email"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="password"/>
			</div>
			<div>
                              <input type="submit" name="login" value="Log in" />
			</div>
		</form><!-- form -->
               
         </div>
       
       
       
       <?php


if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])){
  
   $customerReg =$cust->customerRegistration($_POST);
   
}

?>
     
    	<div class="register_account">
    		<h3>Register New Account</h3>
                  <?php if (isset($customerReg)){
                          echo  $customerReg ;
                           } ?>
                  <form action="" method="post">
		 <table>
		  <tbody>
                     <tr>
                        <td>
			<div>
                              <input type="text" value=""required="" name="customerName" placeholder="Name" >
			</div>
							
			<div>
                              <input type="text" value=""required="" name="address" placeholder="Address" >
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
                              <input type="password" required="" name="password" placeholder="Passwod">
			</div>
							
				<div>
                                       <input type="submit" name="submit" Value="Save"
			</div>
							
		     </td>
		    	
		    </tr> 
		    </tbody></table> 
		   
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>

  <?php include 'inc/footer.php'; ?>