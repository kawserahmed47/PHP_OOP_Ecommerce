<?php 
$filepath= realpath(dirname(__FILE__));
include_once  ($filepath.'/../lib/Database.php');
 include_once  ($filepath.'/../helpers/Format.php');
?>
<?php
class Brand{
 private $db;
   private $fm;

   public function __construct() {
      
      $this->db= new Database();
        $this->fm= new Format();
  } 
  
  public function brandInsert($brandName){
  $brandName = $this->fm->validation($brandName);
$brandName= mysqli_real_escape_string($this->db->link, $brandName);  

         if(empty($brandName)){
            $msg=" <span style='color:red'>Brand field must not be empty</span>";
            return $msg;
             } else {
             $query= "INSERT INTO tbl_brand(brandName) VALUES('$brandName') ";
             $brandInsert =$this->db->insert($query);
             if($brandInsert){
                $msg="<span style='color:green'>Brand inserted Successfully</span>";
               return $msg;
             } else {
                $msg=" <span style='color:red'> Brand is not inserted</span>";
               return $msg;
             }
             
             
             }

}
         public function getBrandAll(){
                   $query= "SELECT * FROM tbl_brand ORDER BY brandId DESC";
                   $result=$this->db->select($query);
                   return $result;
            }
            
            public function getBrandById($id){
               $query= "SELECT * FROM tbl_brand WHERE brandId ='$id'";
                   $result=$this->db->select($query);
                   return $result;
               
            }
           
            public function brandUpdate($brandName, $id){
               $brandName = $this->fm->validation($brandName);
            $brandName= mysqli_real_escape_string($this->db->link, $brandName);  
             $id= mysqli_real_escape_string($this->db->link, $id);

         if(empty($brandName)){
            $msg=" <span style='color:red'>Brand field must not be empty</span>";
            return $msg;
             } else {
             $query= "UPDATE tbl_brand SET brandName='$brandName' WHERE brandId='$id' ";
             $brandUpdated =$this->db->update($query);
             if($brandUpdated ){
                $msg="<span style='color:green'>Brand Updated Successfully</span>";
               return $msg;
             } else {
                $msg=" <span style='color:red'> Brand is not Updated</span>";
               return $msg;
             }
             
             
             }
               
            }
            
            public function delBrandById($id){
                $query= "DELETE FROM tbl_brand  WHERE brandId='$id' ";
                $delData=$this->db->delete($query);
                if($delData ){
                $msg="<span style='color:green'>Brand Deleted Successfully</span>";
               return $msg;
             }else {
                $msg=" <span style='color:red'> Brand is not Deleted</span>";
               return $msg;
             }
            }





}?>