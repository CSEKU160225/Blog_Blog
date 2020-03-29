<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
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
          if (isset($_GET['msgid'])) {
    # code...
    $id=$_GET['msgid'];
   // echo $id;
    $query="select * from tbl_contact where id='$id'";
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
							<td><?php echo  $result['body'];?></td>
							<td><?php echo $f->date( $result['date']);?></td>
							<td>Action</td>
							<td><a href="viewmsg.php?msgid=<?php echo $result['id']; ?>">View</a> || 
							<a href="viewrpl.php?id=<?php echo $result['id']; ?>">Replay</a>||
						   <a href="?id=<?php echo $result['id']; ?>">Seen</a>
						</td>
						</tr>
<?php }}}?>
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