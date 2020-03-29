<?php include'inc/header.php'?>
<?php
if (isset($_POST['search'])) {
	# code...
	$id=$_POST['search'];
}
else{
	echo "Eroor this page";
}


?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php
				$query="select * from tbl_post where title like '%$id%'";
				$post=$db->select($query);
				if ($post) {
					# code...
					while ($result=$post->fetch_assoc()) {
						# code...
				
				?>
				<h2><a href="post.php?id=<?php echo $result['Id'];?>"><?php echo $result['title'];?></a></h2>
				<h4> <?php echo $f->date($result['date']);?>By <a href="#"><?php echo $result['author'];?></a></h4>
				 <img src="admin/upload/<?php echo $result['image'];?>" alt="post image"/></a>
				 <?php echo $result['body'];
				 ?>
				
				<?php }}  ?>
				
</div>


		</div>
		<?php include'inc/sidebar.php';?>
	</div>

	<?php include'inc/footer.php';?>