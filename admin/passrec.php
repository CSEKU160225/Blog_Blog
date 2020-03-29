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
if (isset($_GET['id'])) {
	$userid=$_GET['id'];
	//echo $userid;
	# code...
	
}

 if ($_SERVER['REQUEST_METHOD']=='POST') {
    # code...
    $name=$f->validation(md5($_POST['npass']));
    if (empty($name)) {
        # code...
        echo "Filled It!!!!!!!!!!!!!!!";
    }
    else{
    	$query="update tbl_user set password='$name' where id='$userid'";
    	$val=$db->update($query);
    	if ($val) {
    		# code...
    		echo "updated";
    	}
    	else
    	{
    		echo "Not!";
    	}
    }


}
	?>
	<section id="content">
		<form action="" method="post">
			<h1>Give your new pass word</h1>
			<div>
				<input type="text" placeholder="Re-password  please" required="" name="npass"/>
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