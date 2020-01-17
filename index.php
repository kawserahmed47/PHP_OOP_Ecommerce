<?php include 'inc/header.php'; ?>
<?php include 'inc/slider.php'; ?>		

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
                  
                  <?php 
                  $getFeature = $pd->getFeatureProduct();
                  if($getFeature){
                     while ($result=$getFeature->fetch_assoc()){
               
                  ?>
				<div class="grid_1_of_4 images_1_of_4">
                                       <a href="preview.php?proid=<?php echo $result['productId']; ?>">   <img style="height: 200px;" src="admin/<?php echo $result['image'] ;?>" alt="" /> </a>  
					 <h2><?php echo $result['productName']; ?> </h2>
					 <p><?php echo $result['body']; ?></p>
					 <p><span class="price"><?php echo $result['price']; ?></span></p>  
				     <div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
				
                  <?php }}?>
				
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	
			<div class="section group">
                              
                                <?php 
                  $getNew = $pd->getNewProduct();
                  if($getNew){
                     while ($value=$getNew->fetch_assoc()){
               
                  ?>
                              
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?proid=<?php echo $value['productId']; ?>">   <img style="height: 200px;" src="admin/<?php echo $value['image'] ;?>" alt="" /> </a> 
					 <h2><?php echo $value['productName'] ?> </h2>
					 <p><span class="price"><?php echo $value['price'] ?></span></p>
				     <div class="button"><span><a href="preview.php?proid=<?php echo $value['productId'];  ?>" class="details">Details</a></span></div>
				</div>
				
						
                  <?php }}?>
			
			</div>
    </div>
 </div>
 </div>

 <?php include 'inc/footer.php'; 