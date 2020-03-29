<!-- <?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
$userid=session:: get('userrole');
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock">

                <?php
                $userid=session:: get('userrole');
               // $user=session::get('userid');
               // echo $user;
                if ($_SERVER['REQUEST_METHOD']=='POST') {
    # code...
    $uname=$f->validation($_POST['uname']);
    $email=$f->validation($_POST['email']);
    $details=$f->validation($_POST['det']);
    if (empty($uname)||empty($email)||empty($details)) {
        # code...
        echo "Filled It!!!!!!!!!!!!!!!";
    }
    else
    {
        $query="update tbl_user set username='$uname',email='$email',details='$details' where role='$userid'" ;
        $catinsert=$db->insert($query);
        if ($catinsert) {
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
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>User Name</td>
                            <td>
                                <input type="text" name="uname"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <input type="text" name="email"  class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Details</td>
                            <td>
                                <input type="text" name="det" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>

						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
<?php include 'inc/footer.php';?> -->