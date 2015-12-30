<?php $this->load->view('admin/header') ?>
<br />
<br />
<table class="tbl" style="border: 1px solid #ccc; padding: 10px; color: #000; width: 100%;">
	<tr>
		<td>Id</td>
		<td>Title</td>
		<td>Edit</td>
		<td>Delete</td>
	</tr>
	<?php 
		foreach ($posts as $row) {
			echo "<tr>";
			echo "<td>".$row->postId."</td>";
			echo "<td>".$row->title."</td>";
			echo "<td><a href='";
			echo base_url()."admin/editpost/".$row->postId;
			echo "'>Edit</a></td>";
			echo "<td><a onclick=\"return confirm('Are you want to delete ?');\" href='";
			echo base_url()."admin/deletepost/".$row->postId;
			echo "'>Delete</a></td>";
			echo "</tr>";
		}
	?>
</table>

<br />
<br />
<br />
<br />
	   <?php echo $this->pagination->create_links(); ?>
<br />
<br />
<?php $this->load->view('admin/footer') ?>