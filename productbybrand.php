<?php include 'inc/header.php'; ?>

<?php
if(!isset($_GET['brandId'])|| $_GET['brandId']==NULL){
   echo "<script>window.location='404.php'</script>";
   
} else {
$id=  $_GET['brandId']; 
}
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
                     <?php 
                  $getBrandProduct = $pd->getProductByBrand($id);
                  if($getBrandProduct){
                  $result1=$getBrandProduct->fetch_assoc();
                  
                  }
               
                  ?>
    		<h3><?php echo $result1['brandName']; ?> </h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
                  <?php 
                  $getBrandProduct1 = $pd->getProductByBrand($id);
                  if($getBrandProduct1){
                     while ($result=$getBrandProduct1->fetch_assoc()){
               
                  ?>
				<div class="grid_1_of_4 images_1_of_4">
                                        <a href="preview.php?proid=<?php echo $result['productId']; ?>">   <img style="height: 200px;" src="admin/<?php echo $result['image'] ;?>" alt="" /> </a>  
					 <h2><?php echo $result['productName']; ?> </h2>
					 <p><?php echo $result['catName']; ?></p>
					 <p><span class="price"><?php echo $result['price']; ?></span></p>  
				     <div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
				<?php }}?>
			</div>

	
	
    </div>
 </div>

   <?php include 'inc/footer.php'; ?>