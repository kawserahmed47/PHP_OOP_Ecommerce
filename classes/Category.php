<?php 
$filepath= realpath(dirname(__FILE__));
include_once  ($filepath.'/../lib/Database.php');
 include_once  ($filepath.'/../helpers/Format.php');
?>

<?php
class Category{
 private $db;
   private $fm;

   public function __construct() {
      
      $this->db= new Database();
        $this->fm= new Format();
  } 
  
  public function catInsert($catName){
  $catName = $this->fm->validation($catName);
$catName= mysqli_real_escape_string($this->db->link, $catName);  

         if(empty($catName)){
            $msg=" <span style='color:red'>Category field must not be empty</span>";
            return $msg;
             } else {
             $query= "INSERT INTO tbl_category(catName) VALUES('$catName') ";
             $catInsert =$this->db->insert($query);
             if($catInsert){
                $msg="<span style='color:green'>Category inserted Successfully</span>";
               return $msg;
             } else {
                $msg=" <span style='color:red'> Category is not inserted</span>";
               return $msg;
             }
             
             
             }

}
         public function getCatAll(){
                   $query= "SELECT * FROM tbl_category ORDER BY catId DESC";
                   $result=$this->db->select($query);
                   return $result;
            }
            
            public function getCatById($id){
               $query= "SELECT * FROM tbl_category WHERE catId ='$id'";
                   $result=$this->db->select($query);
                   return $result;
               
            }
           
            public function catUpdate($catName, $id){
               $catName = $this->fm->validation($catName);
            $catName= mysqli_real_escape_string($this->db->link, $catName);  
             $id= mysqli_real_escape_string($this->db->link, $id);

         if(empty($catName)){
            $msg=" <span style='color:red'>Category field must not be empty</span>";
            return $msg;
             } else {
             $query= "UPDATE tbl_category SET catName='$catName' WHERE catId='$id' ";
             $catUpdated =$this->db->update($query);
             if($catUpdated ){
                $msg="<span style='color:green'>Category Updated Successfully</span>";
               return $msg;
             } else {
                $msg=" <span style='color:red'> Category is not Updated</span>";
               return $msg;
             }
             
             
             }
               
            }
            
            public function delCatById($id){
                $query= "DELETE FROM tbl_category  WHERE catId='$id' ";
                $delData=$this->db->delete($query);
                if($delData ){
                $msg="<span style='color:green'>Category Deleted Successfully</span>";
               return $msg;
             }else {
                $msg=" <span style='color:red'> Category is not Deleted</span>";
               return $msg;
             }
            }





}?>