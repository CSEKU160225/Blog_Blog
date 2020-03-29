<?php include'inc/header.php'?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>
				<?php
                 if ($_SERVER['REQUEST_METHOD']=='POST') {
    # code...
    $fname=$f->validation($_POST['firstname']);
    $lname=$f->validation($_POST['lastname']);
    $email=$f->validation($_POST['email']);
    $body=$f->validation($_POST['body']);
    $fname=mysqli_escape_string($db->link,$fname);

    if (empty($fname)||empty($lname)||empty($email)||empty($body)) {
        # code...
        echo "Filled Blank one!!!!!!!!!!!!!!!";
    }
    else
    {
        $query="insert into tbl_contact(firstname,lastname,email,body) values('$fname','$lname','$email','$body')";
        $catinsert=$db->insert($query);
       /* echo $catinsert;*/
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
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name" />
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name" />
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="email" name="email" placeholder="Enter Email Address"/>
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
		<?php include'inc/sidebar.php';?>
	</div>

	<?php include'inc/footer.php';?>