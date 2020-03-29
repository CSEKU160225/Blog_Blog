		<div class="sidebar clear">
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
				<?php 
 				$rquery="select * from tbl_category";
				$rpost=$db->select($rquery);
				if ($rpost) {
					# code...
					while ($rresult=$rpost->fetch_assoc()) {
						# code...
				                 
                 

				 ?>
						<li><a href="post.php?id=<?php echo $rresult['id']?>">Category <?php echo $rresult['name'];?></a></li>
                        
						<?php }} else {?>
							<li>NO Category Created</li>

							<?php }?>
				
					</ul>
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
				<?php 
              $query="select * from tbl_post limit 3";
              $post=$db->select($query);
              if($post)
              {
              	while($result=$post->fetch_assoc())
              	{

		?>	
					<div class="popular clear">
						<h3><a href="post.php?id=<?php echo $result['Id']?>"><?php echo $result['title'];?></a></h3>
						<a href="post.php?id=<?php echo $result['Id']?>"><img src="admin/upload/<?php echo $result['image'];?>" alt="post image"/></a>
						<p><?php echo $result['text']?></p>	
					</div>
					
					<?php }}?>
	
			</div>
			
		</div>