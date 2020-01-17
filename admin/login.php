<?php include '../classes/AdminLogin.php';  ?>

<?php 
$al= new AdminLogin();
if($_SERVER['REQUEST_METHOD']=='POST'){
   $admin_username = $_POST['admin_username'];
    $admin_password = md5($_POST['admin_password']) ;
    $loginCheck = $al->adminLogin($admin_username,$admin_password);
    
}

?>


 
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="" method="post">
			<h1>Admin Login</h1>
                           <span style="color: red; font-size: 18px;"> 
                           <?php if (isset($loginCheck)){
                                               echo  $loginCheck;
                           } ?>
                           </span>
			<div>
				<input type="text" placeholder="Username"  name="admin_username"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="admin_password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>