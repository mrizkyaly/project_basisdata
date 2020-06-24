<p>
	<a href="<?php echo base_url('admin/user/tambah') ?>" class="btn btn-success btn-sm">
		<i class="nav-icon fa fa-plus"></i> Tambah User</a>
</p>

<?php  
	// Notifikasi
	if ($this->session->flashdata('sukses')) {
		echo '<p class="alert alert-success">';
		echo $this->session->flashdata('sukses');
	}
?>

<table id="example2" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>NO</th>
			<th>USERNAME</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($user as $user) { ?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $user->USERNAME ?></td>
				<td>
					<a href="<?php echo base_url('admin/user/edit/'.$user->ID_USER) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<?php include ('delete.php'); ?>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>