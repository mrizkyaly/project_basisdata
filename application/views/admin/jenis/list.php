<p>
	<a href="<?php echo base_url('admin/jenis/tambah') ?>" class="btn btn-success btn-sm">
		<i class="nav-icon fa fa-plus"></i> Tambah Jenis</a>
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
			<th>NAMA JENIS</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($jenis as $jenis) { ?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $jenis->NAMA_JENIS ?></td>
				<td>
					<a href="<?php echo base_url('admin/jenis/edit/'.$jenis->ID_JENIS) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<a href="<?php echo base_url('admin/jenis/delete/'.$jenis->ID_JENIS) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini ?')"><i class="fa fa-trash"></i> Delete</a>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>