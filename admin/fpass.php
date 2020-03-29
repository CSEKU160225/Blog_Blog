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
<title>Password Recover</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<?php
if ($_SERVER['REQUEST_METHOD']=='POST') {
	# code...
	$email=$f->validation($_POST['email']);
	$query="select * from tbl_user where email='$email'";
	$value=$db->select($query);
	if ($value) {
		# code...
		while ($result=$value->fetch_assoc()) {
			# code...
			$userid=$result['id'];
			header("Location:passrec.php?id=".$userid);
		}
		

	}
	else
	{
		echo "Please Enter your valid Email!!!!!!!!!!";
		header("Location:fpass.php");
	}
	
/*	$username=mysqli_escape_string($username);
	$password=mysqli_escape_string($password);*/
	
}
	?>
	<section id="content">
		<form action="fpass.php" method="post">
			<h1>Recover Password</h1>
			<div>
				<input type="text" placeholder="Email please" required="" name="email"/>
			</div>

			<div>
				<input type="submit" value="Send" />
			</div>
		</form><!-- form -->
<!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>