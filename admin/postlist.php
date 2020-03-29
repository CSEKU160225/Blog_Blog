<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <?php
if (isset($_GET['del'])) {
	# code...
	$del=$_GET['del'];
	$query="delete from tbl_category where id=$del";
	$delpost=$db->delete($query);
	if ($delpost) {
		# code...
		echo "Sucessfully deleted!!!!!!!!";
	}
	else {
		# code...
		echo "No yet Done!!!!!!!!!!!!!!!";
	}
}

                ?>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>No.</th>
							<th>Post Title</th>
							<th>Description</th>
							<th>Category</th>
							<th>Image</th>
							<th>Author</th>
							<th>Text</th>
							<th>Date</th>
						</tr>
					</thead>
					<tbody>
						<?php
                           $query="select tbl_post.*,tbl_category.* from tbl_post inner join tbl_category on tbl_post.cat=tbl_category.id order by tbl_post.title desc";
                           $post=$db->select($query);
                           if ($post) {
                           	# code...
                           	$i=0;
                           	while ($result=$post->fetch_assoc()) {
                           		# code...
                           		$i++;


						?>
						<tr class="odd gradeX">
							<td><?php echo  $i;?></td>
							<td><?php echo  $result['title'];?></td>
							<td><?php echo $result['body'];?></td>
							<td class="center"><?php echo $result['name'];?></td>
							<td><img src="admin/upload/<?php echo $result['image'];?>" height="40px" width="60px"> </td>
							<td><?php echo  $result['author'];?></td>
							<td><?php echo  $result['text'];?></td>
							<td class="center"> <?php echo  $result['date'];?></td>
							<td><a href="editpost.php?catid=<?php echo $result['id'];?>">Edit</a> || <a href="?del=<?php echo $result['id'];?>">Delete</a></td>
						</tr>
					<?php  }}?>

					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
	<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
      <?php include 'inc/footer.php';?>
