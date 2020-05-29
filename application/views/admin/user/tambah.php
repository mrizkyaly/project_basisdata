<?php  
	// Notifikasi error
	echo validation_errors('<div class="alert alert-warning">','</div>');

	// Form Open
	echo form_open(base_url('admin/user/tambah'),' class="form_horizontal"');
?>

<div class="card card-primary">
	<div class="card-header"></div>
	<form role="form">
		<div class="card-body">
			<div class="form-group">
				<label for="exampleInputEmail1">Username</label>
				<input type="text" name="USERNAME" class="form-control" placeholder="Username" value="<?php echo set_value('USERNAME') ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" name="PASSWORD" class="form-control" placeholder="Password" value="<?php echo set_value('PASSWORD') ?>" required>
			</div>
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
				<button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-times"></i> Reset</button>
			</div>
		</div>
	</form>
</div>

<?php echo form_close(); ?>