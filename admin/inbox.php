<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
            <div class="box round first grid">
            	<?php
                if (isset($_GET['id'])) {
                	# code...
                	$seen=$_GET['id'];
                	$query="update tbl_contact set status='1' where id='$seen'";
                	$update=$db->update($query);
                	if ($update) {
                		# code...
                		echo "Update sucessfully!!!!!";
                	}
                	else
                	{
                		echo "Not update";
                	}
                }
                if (isset($_GET['delid'])) {
                	# code...
                	$del=$_GET['delid'];
                	$query="delete from tbl_contact where id='$del'";
                	$delete=$db->delete($query);
                	if ($delete) {
                		# code...
                		echo "delete sucessfully!!!!!";
                	}
                	else
                	{
                		echo "Not deleted";
                	}
                }

            	?>
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
																		<?php
                       $query="select * from 	tbl_contact where status='0'	order by id desc";
                       $chategory=$db->select($query);
                       if ($chategory) {

                       	# code...
                       	$i=0;
                       	while ($result=$chategory->fetch_assoc()) {
                       		# code...
                       		$i++;
                       	/*}}*/
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['firstname'].''.$result['lastname']; ?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $f->readmore( $result['body'],50);?></td>
							<td><?php echo $f->date( $result['date']);?></td>
							<td>Action</td>
							<td><a href="viewmsg.php?msgid=<?php echo $result['id']; ?>">View</a> || 
							<a href="viewrpl.php?id=<?php echo $result['id']; ?>">Replay</a>||
						   <a onclick="return confirm('send to seen box!!')" href="?id=<?php echo $result['id']; ?>">Seen</a>
						</td>
						</tr>
<?php }}?>
					</tbody>

				</table>
               </div>
            </div>
 <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
																		<?php
                       $query="select * from 	tbl_contact where status='1'	order by id desc";
                       $chategory=$db->select($query);
                       if ($chategory) {

                       	# code...
                       	$i=0;
                       	while ($result=$chategory->fetch_assoc()) {
                       		# code...
                       		$i++;
                       	/*}}*/
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $result['firstname'].''.$result['lastname']; ?></td>
							<td><?php echo $result['email'];?></td>
							<td><?php echo $f->readmore( $result['body'],50);?></td>
							<td><?php echo $f->date( $result['date']);?></td>
							<td>Action</td>
							<td><a onclick="return confirm('Confirm to delete!!')" href="?delid=<?php echo $result['id']; ?>">Delete</a> 
						</td>
						</tr>
<?php }}?>
					</tbody>

				</table>
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
        <?php include 'inc/footer.php';?>

    <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
            setSidebarHeight();


        });
    </script>