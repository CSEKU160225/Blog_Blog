<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if (isset($_GET['catid'])) {
    # code...
    $id=$_GET['catid'];
}


?>
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
        $query="update tbl_category set name='$name' where id='$id'" ;
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
                <?php
                       $query="select * from    tbl_category where id='$id'   order by id desc";
                       $chategory=$db->select($query);
                       if ($chategory) {

                        # code...
                        $i=0;
                        while ($result=$chategory->fetch_assoc()) {
                            # code...
                            $i++;
                ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                <?php }}  ?>
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
<?php include 'inc/footer.php';?>