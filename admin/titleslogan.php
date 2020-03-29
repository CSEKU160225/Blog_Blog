<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<style>
    .leftside{float: left;width: 70% }
    .rightside{float: left;width: 20%}
    .rightside img{height:160px;width:170px }
</style>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock"> 
                <div class="leftside">   
                <?php
                $query="select * from title_logo"; 
                $blog=$db->select($query);
                if ($blog) {
                    # code...
                    while ($result=$blog->fetch_assoc()) {
                        # code...

                ?>           
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['title'];?>"  name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $result['sologan'];?>" name="sologan" class="medium" />
                            </td>
                        </tr>
                                                                    <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="logo" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>

                <div class="rightside">
                    <img src="<?php echo $result['logo'];?>" alt=""/>Logo
                </div>
                </div>
                                <?php
                    }
                }
                ?>
                <?php
if ($_SERVER['REQUEST_METHOD']=='POST') {

    # code...
    $title=$f->validation($_POST['title']);
    $sologan=$f->validation($_POST['sologan']);
    $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['logo']['name'];
    $file_size = $_FILES['logo']['size'];
    $file_temp = $_FILES['logo']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = 'logo'.'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;
    if ($title==""|| $sologan=="") {
        # code...
        echo "Check again!!!!!!";

    }
    else
    {
        $query="update title_logo set title='$title',sologan='$sologan' where id='1'" ;
        $catinsert=$db->update($query);
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
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
        <?php include 'inc/footer.php';?>
