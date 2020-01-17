<?php include 'inc/header.php'; ?>
 



<section class="">
   <div class="container">
      <div class="row">
           <div class="col-sm-12">
             <div class="">
					<h2>ALL Brands</h2>
					<ul>
                                                <?php 
                                                $getBrand1= $br->getBrandAll();
                                                if($getBrand1){
                                                   while($result=$getBrand1->fetch_assoc()){
                                                      
                                               
                                                
                                                ?>
                                                <li><a href="productbybrand.php?brandId=<?php echo $result['brandId']; ?>"><?php echo $result['brandName'];?></a></li>
				      <?php     }
                                                }?>
    				</ul>
    	
 				</div>
            
            
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <div class="section group">
            <h2>Products</h2>
				 <?php
                  $getAllproduct1 = $pd->getProductAll();
                  if($getAllproduct1){
                     while ($result=$getAllproduct1->fetch_assoc()){
               
                  ?>
                  
                  
				<div class="grid_1_of_4 images_1_of_4">
                                    <a href="preview.php?proid=<?php echo $result['productId']; ?>">   <img style="height: 200px; " src="admin/<?php echo $result['image'] ;?>" alt="" /> </a>  
                                    <h2><?php echo $result['productName']; ?> </h2>
				<p><?php echo $result['body']; ?></p>
                                    <p><span class="price"><?php echo $result['price']; ?></span></p>  
				<div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
                  
                  <?php }}?>
                  	
			</div>
            
         </div>
         
        
         
         
         
      </div>
      
      
   </div>
   
</section>
      

  <?php include 'inc/footer.php'; ?>