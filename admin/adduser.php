<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php
                if ($_SERVER['REQUEST_METHOD']=='POST') {
    # code...
    $name=$f->validation($_POST['uname']);
    $pass=$f->validation(md5($_POST['pass']));
    $role=$f->validation($_POST['role']);

    if (empty($name)||empty($pass)||empty($role)) {
        # code...
        echo "Filled It!!!!!!!!!!!!!!!";
    }
    else
    {
        $query="insert into tbl_user(username,password,role) values('$name','$pass',$role)";
        $catinsert=$db->insert($query);
        if ($catinsert) {
            # code...
            echo "Insert Successfully!!!!!!!!!";
        }
        else
        {
            echo "Not inserted";
        }
    }
    }
    
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>User Name</td>
                            <td>
                                <input type="text" name="uname" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
                                                <tr>
                            <td>Password</td>
                            <td>
                                <input type="text" name="pass" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
                                                <tr>
                            <td>User Role</td>
                            <td>
                                <select id="select" name="role">
                                    <option>Select one</option>
                                    <option value="0">Admin</option>
                                      <option value="1">Author</option>
                                        <option value="2">Editor</option>


                                </select>
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
<?php include 'inc/footer.php';?>