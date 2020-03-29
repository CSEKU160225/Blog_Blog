<?php include'inc/header.php'?>
<?php
if (isset($_GET['id'])) {
	# code...
	$id=$_GET['id'];
}
else{
	echo "Eroor this page";
}


?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php
				$query="select * from tbl_post where Id=$id";
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
				 $cat_id=$result['cat'];

				 ?>

				
				<?php }}  ?>
				<h2>Related articles</h2>
				<?php 
 				$rquery="select * from tbl_post where cat='$cat_id'";
				$rpost=$db->select($rquery);
				if ($rpost) {
					# code...
					while ($rresult=$rpost->fetch_assoc()) {
						# code...
				                 
                 

				 ?>
				 	<div class="relatedpost clear">
					
					<a href="post.php?id=<?php  echo $rresult['Id'];?>"><img src="admin/upload/<?php echo $rresult['image'];?>" alt="post image"/></a>
<!-- 				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
					<a href="#"><img src="images/post1.jpg" alt="post image"/></a>
				</div> -->
				</div>
	
<?php }}  ?>
</div>


		</div>
		<?php include'inc/sidebar.php';?>
	</div>

	<?php include'inc/footer.php';?>