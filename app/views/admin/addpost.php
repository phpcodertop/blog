<?php $this->load->view('admin/header') ?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
	tinymce.init({
    selector: '#mytextarea',
    statusbar: false,
    plugins: 'code anchor media textcolor image',
     toolbar: 'undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code anchor media forecolor image'
  	
  });
</script>
<br />
<h2>add new post</h2>
<b><?php echo validation_errors(); ?></b>
<h1><?php echo $this->session->flashdata('added'); ?></h1>
<table width="100%">
<form method="post" action="addpost">
<tr>
	<td>Post Title :</td>
	<td><input type="text" name="title" size="80" /></td>
</tr>
<tr>
	<td>Post body :</td>
	<td>
		<textarea style="text-align: justify;" name="body" id="mytextarea"  ></textarea>
	</td>
</tr>
<tr>
	<td>
		<input type="submit" name="add" value="Add Post" />
	</td>
</tr>
</form>
</table>
<br />
<?php $this->load->view('admin/footer') ?>