<?php include 'inc/header.php'; ?>

<?php
if(!isset($_GET['catId'])|| $_GET['catId']==NULL){
   echo "<script>window.location='404.php'</script>";
   
} else {
$id=  $_GET['catId']; 
}
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
                     <?php 
                  $getCatProduct = $pd->getProductByCat($id);
                  if($getCatProduct){
                  $result1=$getCatProduct->fetch_assoc();
                  
                  }
               
                  ?>
    		<h3><?php echo $result1['catName']; ?> </h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
                  <?php 
                  $getCatProduct = $pd->getProductByCat($id);
                  if($getCatProduct){
                     while ($result=$getCatProduct->fetch_assoc()){
               
                  ?>
				<div class="grid_1_of_4 images_1_of_4">
                                        <a href="preview.php?proid=<?php echo $result['productId']; ?>">   <img style="height: 200px;" src="admin/<?php echo $result['image'] ;?>" alt="" /> </a>  
					 <h2><?php echo $result['productName']; ?> </h2>
					 <p><?php echo $result['brandName']; ?></p>
					 <p><span class="price"><?php echo $result['price']; ?></span></p>  
				     <div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
				<?php }}?>
			</div>

	
	
    </div>
 </div>

   <?php include 'inc/footer.php'; ?>