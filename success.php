<?php include 'inc/header.php'; ?>
<?php
$loginck = Session::get("cuslogin");
        if($loginck == FALSE){
          header("Location:login.php");
        }

?>
<style>
   .suc{
      background-color:white;
      color: green;
      height: 350px;
     text-align: center;
     font-size: 24px;
     margin-top: 35px;
   }
   
   </style>
   
 <div class="main">
    <div class="content " >
       <div class="suc">
          <h3> Order Successful!!!</h3><br>
          <p>We will contact you soon. </p>  
       </div>
    		
                
    		
        <div class="clear"></div>
    </div>
 </div>
  <?php include 'inc/footer.php'; 