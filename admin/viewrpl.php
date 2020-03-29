<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block">
                    <?php
                    if ($_SERVER['REQUEST_METHOD']=='POST') {

                        # code...
                            $fb=$f->validation($_POST['toemail']);
                            $tw=$f->validation($_POST['fromemail']);
                            $gg=$f->validation($_POST['sub']);
                            $ln=$f->validation($_POST['msg']);

                            if ($fb==""|| $tw==""||$gg==""||$ln=="") {
                                # code...
                                echo "Check in!!!!!";
                            }
                            else
                            {
       $send=mail($fb,$gg,$ln,$tw);
       if ($send) {
       	# code...
       	echo "ok";
       }
       else
       {
       	echo "Wrong";
       }
        
                         }
                    }





                    ?>
           																	<?php
          if (isset($_GET['id'])) {
    # code...
    $id=$_GET['id'];
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
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text" name="toemail" readonly value="<?php echo $result['email'];?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name="fromemail"  class="medium" />
                            </td>
                        </tr>

						
						 <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" name="sub"  class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <input type="text" name="msg"  class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
                    }
                }
}
                    ?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
        <?php include 'inc/footer.php';?>

