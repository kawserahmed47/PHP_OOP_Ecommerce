<?php 
$filepath= realpath(dirname(__FILE__));
include_once  ($filepath.'/../lib/Database.php');
 include_once  ($filepath.'/../helpers/Format.php');
?>
<?php
class Cart{
 private $db;
   private $fm;

   public function __construct() {
      
      $this->db= new Database();
        $this->fm= new Format();
  }
  public function cartAdd($quantity,$id){
       $quantity1= mysqli_real_escape_string($this->db->link, $quantity);  
       $productId= mysqli_real_escape_string($this->db->link, $id);
       $sId= session_id(); 
       
     
       
        $squery= "SELECT * FROM tbl_product WHERE productId ='$productId'";
                   $result=$this->db->select($squery)->fetch_assoc();
       
       $productName= $result['productName'];
         $price= $result['price'];
           $image= $result['image'];
           
             $cquery="SELECT * FROM tbl_cart WHERE productId ='$productId' AND sId= '$sId' ";
       $getProduct=$this->db->select($cquery);
       if($getProduct){
          $query= "UPDATE tbl_cart SET quantity=('$quantity'+1) WHERE productId ='$productId' ";
             $catUpdated1 =$this->db->update($query);
             if($catUpdated1){
              header("Location:cart.php");
             }
       }else{
       
            
         
           
           
           $query= "INSERT INTO tbl_cart(sId,productId,productName,price,quantity,image) "
                     . "VALUES('$sId','$productId','$productName','$price','$quantity1','$image') ";
            
             $productInsert =$this->db->insert($query);
             
             if($productInsert){
                header("Location:cart.php");
             } else {
                 header("Location:404.php");
             }
       }
             
       
       
  }
  
  public function getCartProduct(){
      $sId= session_id(); 
      $query= "SELECT * FROM tbl_cart WHERE sId ='$sId' ";
                   $result=$this->db->select($query);
                   return $result;
  }
  public function cartUpdate($quantity,$cartId){
     
         $cartId = $this->fm->validation($cartId);
            $cartId= mysqli_real_escape_string($this->db->link, $cartId);  
             $quantity= mysqli_real_escape_string($this->db->link, $quantity);

         if(empty($quantity)){
            $msg=" <span style='color:red'>Category field must not be empty</span>";
            return $msg;
             } else {
             $query= "UPDATE tbl_cart SET quantity='$quantity' WHERE cartId='$cartId' ";
             $catUpdated =$this->db->update($query);
             if($catUpdated ){
                $msg="<span style='color:green'> Updated </span>";
               return $msg;
             } else {
                $msg=" <span style='color:red'> not Updated</span>";
               return $msg;
             }
             
             
             }
     
  }
  public function delCartById($id){
        $query= "DELETE FROM tbl_cart  WHERE cartId='$id' ";
                $delCart=$this->db->delete($query);
                if($delCart ){
                $msg="<span style='color:green'>Item Deleted Successfully</span>";
               return $msg;
             }else {
                $msg=" <span style='color:red'> Item is not Deleted</span>";
               return $msg;
             }
  }
  
  public function delCartData(){
     $sId= session_id();
     $query = "DELETE FROM tbl_cart WHERE sId='$sId'";
     $this->db->delete($query);
  }
  
  public function orderProduct($cmrId){
        $sId= session_id(); 
      $query= "SELECT * FROM tbl_cart WHERE sId ='$sId' ";
         $getPro=$this->db->select($query);
         
         if($getPro){
            while($result=$getPro->fetch_assoc()){
               $productId = $result['productId'];
                $productName = $result['productName'];
                 $price = $result['price'];
                  $quantity = $result['quantity'];
                  $pp= $price*$quantity;
                   $image = $result['image'];
                   
                         $query= "INSERT INTO tbl_order(cmrId,productId,productName,quantity,price,image) "
                     . "VALUES('$cmrId','$productId','$productName','$quantity','$pp','$image') ";
            
             $orderInsert =$this->db->insert($query);
           
               
            }
         }
                   
  }
  
  public function getAllOrder(){
      $query= "SELECT tbl_order.*,tbl_customer.* "
                           . " FROM tbl_order INNER JOIN tbl_customer ON tbl_order.cmrId=tbl_customer.customerId "
                          
                           . "ORDER BY tbl_order.id DESC";
                         
                          
                   $result=$this->db->select($query);
                   return $result;
  }
  public function delOrderById($id){
   
     $query = "DELETE FROM tbl_order WHERE id='$id'";
     $result=$this->db->delete($query);
     if($result){
        $msg="<span style='color:red'>Deleted Successfull</span>";
        return $msg;
     }
     
  }
  public function changeStatus($id){
     $query= "UPDATE tbl_order SET status='1' WHERE id='$id' ";
             $statusUpdated =$this->db->update($query);
             
         if($statusUpdated){
        $msg="<span style='color:green'>Order Successfull</span>";
        return $msg;
     }
  }
  
}
