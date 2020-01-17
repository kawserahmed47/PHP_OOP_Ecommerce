<?php include 'inc/header.php'; ?>
<?php
$loginck = Session::get("cuslogin");
        if($loginck == FALSE){
          header("Location:login.php");
        }

?>
 <div class="main">
    <div class="content">
    	Order information 
        
 </div>
</div>
  <?php include 'inc/footer.php'; 