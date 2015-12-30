<?php 
	$this->load->view('site/header');
	$this->load->view('site/sidebar');
?>
<div class="left_side">
<h2><?php echo $post->title; ?></h2>
<p style="text-align: justify; font-size: 23px;">
<?php echo $post->body; ?>
</p>
<br/><br/><br/><br/>

<h2>Comments</h2>
<?php
	echo "<h3>Add A Comment</h3> "; 
	foreach ($comments as $row) {
		echo $row->commentBody;
		echo "<br />";
		echo "By : <b>".$row->posterName."</b>";
		echo "<hr />";
	}
?>


<h2>Leave a comment</h2>
<div class="comment">
<form method="post" action="<?php echo base_url(); ?>post/comment">
	Name : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	 <input type="text" name="postername" required /><br/><br/>
	 <input type="hidden" name="postid" value="<?php echo $post->postId; ?>" />
	Comment : 
	<textarea name="commentbody" cols="30" rows="5"></textarea><br/><br/>
	<input type="submit" name="comment" value="Add A Comment" />
	<br/>
</form>	
</div>
</div>
<?php 
	$this->load->view('site/footer');
?>