<?php 
$filepath= realpath(dirname(__FILE__));
include_once  ($filepath.'/../lib/Database.php');
include_once  ($filepath.'/../helpers/Format.php');
?>
<?php
class Customer{
 private $db;
   private $fm;

   public function __construct() {
      
      $this->db= new Database();
        $this->fm= new Format();
  }
  
 public function customerRegistration($data){
    $customerName= mysqli_real_escape_string($this->db->link, $data['customerName']);  
    $address= mysqli_real_escape_string($this->db->link, $data['address']);  
    $email= mysqli_real_escape_string($this->db->link, $data['email']);
   $phone= mysqli_real_escape_string($this->db->link, $data['phone']);  
   $password= mysqli_real_escape_string($this->db->link, md5($data['password'])); 

$query= "INSERT INTO tbl_customer(customerName,address,email,phone,password) "
                     . "VALUES('$customerName','$address','$email','$phone','$password') ";
            
             $csutoInsert =$this->db->insert($query);
             
             if($csutoInsert){
                $msg="<span style='color:green'>Register Successfully</span>";
               return $msg;
             } else {
                $msg=" <span style='color:red'> Register is not Successfully</span>";
               return $msg;
             }
             
    
 }
 
 
 public function customerLogin($data){
     $email= mysqli_real_escape_string($this->db->link, $data['email']);
        $password= mysqli_real_escape_string($this->db->link, md5($data['password'])); 
         
         
         if(empty($email)||empty($password)){
            $loginmsg="Email or Password must not be empty";
            return $loginmsg;
             }else{
            $query ="SELECT * FROM tbl_customer WHERE email='$email' AND password='$password' ";
            $result= $this->db->select($query);
                       if($result !=FALSE){
               $value =$result->fetch_assoc();
              
                 Session::set("cuslogin", TRUE);
                Session::set("customerId", $value['customerId']);
                 Session::set("customerName", $value['customerName']);
                 
                  header("Location:payment.php");
   
            } else {
               
               $loginmsg="User or password doesn't match";
               return $loginmsg;
               
            }
               
            }
 }
 
 
 
 
 public function shippingInformation($data,$id){
      $shippingName= mysqli_real_escape_string($this->db->link, $data['shippingName']);  
    $address= mysqli_real_escape_string($this->db->link, $data['address']);  
    $email= mysqli_real_escape_string($this->db->link, $data['email']);
   $phone= mysqli_real_escape_string($this->db->link, $data['phone']);  
   $city= mysqli_real_escape_string($this->db->link,($data['city'])); 

$query= "SELECT * FROM tbl_order WHERE cmrId ='$id' ";
         $getOrder=$this->db->select($query);
         
         if($getOrder){
            while($result=$getOrder->fetch_assoc()){
               $id = $result['id'];
               
                   
                         $query= "INSERT INTO tbl_shipping(order_id,shippingName,address,email,phone,city) "
                     . "VALUES('$id','$shippingName','$address','$email','$phone','$city') ";
            
             $orderInsert =$this->db->insert($query);
           
               
            }
         }
         if($orderInsert){
            header("Location:success.php");
         }else{
               $loginmsg="Something Wrong";
               return $loginmsg;
         }
    
 }
 
 public function viewShiftByOrder($id){
     $query= "SELECT * FROM tbl_shipping WHERE order_id='$id' ";
                   $result=$this->db->select($query);
                   return $result;
 }
    
 }
  
  
  
  
  
  
  

