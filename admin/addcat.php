<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                <?php
                if ($_SERVER['REQUEST_METHOD']=='POST') {
    # code...
    $name=$f->validation($_POST['name']);
    if (empty($name)) {
        # code...
        echo "Filled It!!!!!!!!!!!!!!!";
    }
    else
    {
        $query="insert into tbl_category(name) values('$name')";
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
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
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