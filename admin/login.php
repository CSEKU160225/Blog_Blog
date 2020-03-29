<?php

include'../lib/session.php';
session::init();
?>

<?php

include'../config/config.php';
include'../lib/Database.php';
include'../helpers/format.php';

?>
<?php
$db=new Database();
$f=new formate();
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
	# code...
	$username=$f->validation($_POST['username']);
	$password=$f->validation(md5($_POST['password']));
/*	$username=mysqli_escape_string($username);
	$password=mysqli_escape_string($password);*/
	$query="select * from tbl_user where username='$username' and password='$password'";

	$result=$db->select($query);
	

	if ($result !=false) {
		# code...
		$value=mysqli_fetch_array($result);
		$row=mysqli_num_rows($result);
		
		
		if ($row>0) {
			# code...
			session::set("login",true);
/*			session::set("username",$value['username']);
			session::set("id",$value['id']);*/
			//session::set("userid",$value['id']);
			//session::set("userrole",$value['role']);
			
			header("Location:index.php");
		}
		else
		{
			echo "Sorry!!";
		}
	}
	else
	{
		echo "<span>Check your password or username!!!!!!!!!</span>";
	}
}
	?>
	<section id="content">
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" required="" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
				<div class="button">
			<a href="fpass.php">Forget password</a>
			
		</div>
		<div class="button">
			
			<a href="#">Hasan's Blog</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>