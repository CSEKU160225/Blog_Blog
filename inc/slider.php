
<div class="slidersection templete clear">
        <div id="slider">
        	<?php
              $query="select * from tbl_slider";
              $value=$db->select($query);
              if ($value) {
              	# code...
              	while ($result=$value->fetch_assoc()) {
              		# code...
  

              

        	?>
            <a href="#"><img src="admin/upload/slider/<?php echo $result['image'];?>" alt="nature 1" title="This is slider one Title or Description" /></a>
        <?php } }?>
<!--             <a href="#"><img src="images/slideshow/02.jpg" alt="nature 2" title="This is slider Two Title or Description" /></a>
            <a href="#"><img src="images/slideshow/03.jpg" alt="nature 3" title="This is slider three Title or Description" /></a>
            <a href="#"><img src="images/slideshow/04.jpg" alt="nature 4" title="This is slider four Title or Description" /></a> -->
        </div>
</div>