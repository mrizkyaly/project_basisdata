<?php  
	// Notifikasi error
	echo validation_errors('<div class="alert alert-warning">','</div>');

	// Form Open
	echo form_open(base_url('admin/pelanggan/edit/' .$pelanggan->ID_PELANGGAN), 'class="form-horizontal"');
?>

<div class="card card-primary">
	<div class="card-header">
		<h3 class="card-title"><?php echo $title ?></h3>
	</div>
	<form role="form">
		<div class="card-body">
			<div class="form-group">
				<label for="exampleInputEmail1">Nama Pelanggan</label>
				<input type="text" name="NAMA_PELANGGAN" class="form-control" placeholder="Nama Pelanggan" value="<?php echo $pelanggan->NAMA_PELANGGAN ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Nomor</label>
				<input type="text" name="NOMOR" class="form-control" placeholder="Nomor" value="<?php echo $pelanggan->NOMOR ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Alamat</label>
				<input type="text" name="ALAMAT" class="form-control" placeholder="Alamat" value="<?php echo $pelanggan->ALAMAT ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Username</label>
				<input type="text" name="USERNAME" class="form-control" placeholder="Username" value="<?php echo $pelanggan->USERNAME ?>" required>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" name="PASSWORD" class="form-control" placeholder="Password" value="<?php echo $pelanggan->PASSWORD ?>" required>
			</div>
			<div class="form-group">
				<button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
				<button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-times"></i> Reset</button>
			</div>
		</div>
	</form>
</div>

<?php echo form_close(); ?>