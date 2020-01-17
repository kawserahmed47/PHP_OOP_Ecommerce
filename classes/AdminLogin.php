<?php 
$filepath = realpath(dirname(__FILE__));
include_once  ($filepath.'/../lib/Session.php'); 

Session::checkLogin();
include_once  ($filepath.'/../lib/Database.php');
include_once  ($filepath.'/../helpers/Format.php');

?>





<?php

Class AdminLogin {
   
   private $db;
   private $fm;




   public function __construct() {
      
      $this->db= new Database();
        $this->fm= new Format();
  }
    
    public function adminLogin($admin_username,$admin_password){
       $admin_username = $this->fm->validation($admin_username);
        $admin_password = $this->fm->validation($admin_password);
        
        $admin_username= mysqli_real_escape_string($this->db->link, $admin_username);
         $admin_password = mysqli_real_escape_string($this->db->link, $admin_password);
         
         
         if(empty($admin_username)||empty($admin_password)){
            $loginmsg="Username or Password must not be empty";
            return $loginmsg;
             }else{
            $query ="SELECT * FROM tbl_admin WHERE admin_username='$admin_username' AND admin_password='$admin_password' ";
            $result= $this->db->select($query);
            if($result !=FALSE){
               $value =$result->fetch_assoc();
               Session::set("adminLogin", TRUE);
                Session::set("admin_id", $value['admin_id']);
                 Session::set("admin_username", $value['admin_username']);
                  Session::set("admin_name", $value['admin_name']);
                  header("Location:dashboard.php");
   
            } else {
               
               $loginmsg="User or password doesn't match";
               return $loginmsg;
               
            }
            
         }
            
       
    }

   
}

