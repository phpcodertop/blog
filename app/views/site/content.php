<div class="left_side">

		<?php 
			foreach ($posts as $row) {
				echo '<div class="post">';
				echo "<h2><a href='";
				echo base_url().'post/index/'.$row->postId;
				echo "'>";
				echo substr($row->title,0,50);
				echo "</a></h2>";
				echo '<div align="justify" class="justify" style="text-align: justify">';
				echo  substr($row->body,0,300);
				echo "</div>";
				echo "<p class='date'>Posted by David <img src='";
				echo base_url();
				echo "assets/images/more.gif' alt='' /> <a href='";
				echo base_url().'post/index/'.$row->postId;
				echo "'>Read more</a> ";
				echo " <img src='";
				echo base_url();
				echo "assets/images/timeicon.gif' alt='' />  ";
				echo date($row->postTime); 
				echo "</p>";
				echo "<hr />";
			}
		?>
				
	    
<br />
<br />
<br />
<br />
	   <?php echo $this->pagination->create_links(); ?>
<br />
<br />	   
	  

    </div>