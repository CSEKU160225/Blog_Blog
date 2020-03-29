
<?php include'inc/header.php';?>
<?php include'inc/slider.php';?>

	
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<!pagenation get>
			<?php
			$per_page=2;//per page e koyta post hbe seta 
			if(isset($_GET["page"]))
			{
				$page=$_GET["page"];//jokn pothom page asbe tokn page=1 hbe,2nd pgae asle page =2 hbe
			}
			else
			{
				$page=1;
			}
			$start_from=($page-1)*$per_page;//jokn pothom page asbe tokn strat_from =0 hbe fole pothom 3 ta database theke bosbe
			?>
			<!pagenation>
		<?php 
              $query="select * from tbl_post limit $start_from,$per_page";
              $post=$db->select($query);
              if($post)
              {
              	while($result=$post->fetch_assoc())
              	{

		?>	

			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result['Id'];?>"><?php echo $result['title'];?></a></h2>
				<h4> <?php echo $f->date($result['date']);?>By <a href="#"><?php echo $result['author'];?></a></h4>
				 <a href="#"><img src="admin/upload/<?php echo $result['image'];?>" alt="post image"/></a>
				<?php echo $f->readmore( $result['body'],50);?>
				<div class="readmore clear">
					<a href="post.php?id=<?php  echo $result['Id'];?>">Read More</a>
				</div>
			</div>

<?php }?>	<!while loop end>
<!pagination............>
<?php 
$query="select * from tbl_post";

$result=$db->select($query);
$total_rows=mysqli_num_rows($result);

$total_pages=ceil($total_rows/$per_page);//total koyta page hbe



echo"<span class='pagination'><a href='index.php?page=1'>".'First'."</a>";
for($i=1;$i<$total_pages;$i++)
{
	echo"<a href='index.php?page=$i'>".$i."</a>";
}
echo"<a href='index.php?page=$total_pages'>".'Last'."</a></span>";
?>
<!pagination..........end>

<?php }else{header("location:404.html");}?>
		</div>
<?php include'inc/sidebar.php';?>
<?php include'inc/footer.php';?>
	