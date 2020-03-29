<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock">

                    <?php
              /*      if ($_SERVER['REQUEST_METHOD']=='POST') {
                        # code...
                        $copy=$f->validation($_POST['copyright']);
                        if ($copy=="") {
                            # code...
                            echo "Check it again";
                        }
                        else
                        {
                            $query="update copyright set copy='$copy'";
                            $value=$db->update($query);
                            if ($value) {
                                # code...
                                echo "Sucessfully done!!!!!!!!!";
                            }
                            else {
                                # code...
                                echo "Try again!!!!!!!!";
                            }
                        }
                    }*/
                    if ($_SERVER['REQUEST_METHOD']=='POST') {

                        # code...
                            $cp=$f->validation($_POST['copy']);
                            

                            if ($cp=="") {
                                # code...
                                echo "Check in!!!!!";
                            }
                            else
                            {
         $query="insert into copyright(copy) values('$cp')" ;
          echo var_dump($query);

        $update=$db->insert($query);
        
        if ($update) {
            # code...
           
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
                  $query="select * from copyright";
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
                                <input type="text" value="<?php echo $result['copy'];?>" name="copy" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php }}?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
        <?php include 'inc/footer.php';?>
