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
<h2>Edit post</h2>
<b><?php echo validation_errors(); ?></b>
<h1><?php echo $this->session->flashdata('edited'); ?></h1>
<table width="100%">
<form method="post" action="#">
<tr>
	<td>Post Title :</td>
	<td><input type="text" name="title" size="80" value="<?php echo $title; ?>" /></td>
</tr>
<tr>
	<td>Post body :</td>
	<td>
		<textarea name="body" style="text-align: justify;" id="mytextarea"  ><?php echo $body; ?></textarea>
	</td>
</tr>
<tr>
	<td>
		<input type="submit" name="edit" value="Edit Post" />
	</td>
</tr>
</form>
</table>
<br />
<?php $this->load->view('admin/footer') ?>