<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block">
                    <?php
                    if ($_SERVER['REQUEST_METHOD']=='POST') {

                        # code...
                            $fb=$f->validation($_POST['fb']);
                            $tw=$f->validation($_POST['tw']);
                            $gg=$f->validation($_POST['gg']);
                            $ln=$f->validation($_POST['ln']);

                            if ($fb==""|| $tw==""||$gg==""||$ln=="") {
                                # code...
                                echo "Check in!!!!!";
                            }
                            else
                            {
        $query="update tbl_social set fb='$fb',tw='$tw',gg='$gg',ln='$ln'" ;
        $update=$db->update($query);
        
        if ($update) {
            # code...
            echo $fb;
            echo "Update Successfully!!!!!!!!!";
        }
        else
        {
            echo "Not updated";
        }
                            }
                    }





                    ?>
                <?php
                $query="select * from tbl_social";
                $social=$db->select($query);
                if ($social) {
                    # code...
                    while ($result=$social->fetch_assoc()) {
                        # code...



                ?>               
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" value="<?php echo $result['fb'];?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="tw" value="<?php echo $result['tw'];?>" class="medium" />
                            </td>
                        </tr>

						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="gg" value="<?php echo $result['gg'];?>" class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="ln" value="<?php echo $result['ln'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php
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

