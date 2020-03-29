<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                                <?php
                if ($_SERVER['REQUEST_METHOD']=='POST') {
    # code...

    $cat=$_POST['cat'];
        $title=$f->validation($_POST['title']);
            $body=$f->validation($_POST['body']);

                $permited  = array('jpg', 'jpeg', 'png', 'gif');
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_temp = $_FILES['image']['tmp_name'];

    $div = explode('.', $file_name);
    $file_ext = strtolower(end($div));
    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_image = "upload/".$unique_image;
        $author=$f->validation($_POST['author']);

    $text=$f->validation($_POST['text']);
   
    $dt2=date("Y-m-d H:i:s");



    if (empty($title)||empty($cat)||empty($text)||empty($uploaded_image)||empty($body)||empty($author)) {
        # code...
        echo "Filled It!!!!!!!!!!!!!!!";
    }
    else
    {

        $query="insert into tbl_post(cat,title,body,image,author,text,date) values('$cat,$title,$body,$uploaded_image,$author,$text,$dt2')";

        $catinsert=$db->insert($query);
        echo "string";

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
                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                                                <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                                                <select id="select" name="cat">
                                                <?php
                $query="select * from tbl_category ";
                $post=$db->select($query);
                if ($post) {
                    # code...
                    $i=0;
                   
                    while ($result=$post->fetch_assoc()) {

                        # code...
                        $i++;
                        
                
                ?>

                                    <option value="<?php echo $result['id'];?>">Category <?php echo $result['name']; ?></option>
                           <?php }} ?>
                                </select>
                            </td>
                        </tr>
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                     
                                                <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="body"></textarea>
                            </td>
                        </tr>
                   
                                            <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>
                                                                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" id="date-picker" name="author" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Text</label>
                            </td>
                            <td>
                                <input type="text" id="date-picker" name="text" />
                            </td>
                        </tr>



						<tr>
                            <td></td>
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
    </div>
  <?php include 'inc/footer.php';?>
<!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
        <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            setSidebarHeight();
        });
    </script>
    <!-- /TinyMCE -->