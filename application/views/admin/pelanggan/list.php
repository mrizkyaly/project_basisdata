<p>
	<a href="<?php echo base_url('admin/pelanggan/tambah') ?>" class="btn btn-success btn-sm">
		<i class="nav-icon fa fa-plus"></i> Tambah Pelanggan</a>
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
			<th>NAMA</th>
			<th>NOMOR</th>
			<th>ALAMAT</th>
			<th>USERNAME</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($pelanggan as $pelanggan) { ?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php echo $pelanggan->NAMA_PELANGGAN ?></td>
				<td><?php echo $pelanggan->NOMOR ?></td>
				<td><?php echo $pelanggan->ALAMAT ?></td>
				<td><?php echo $pelanggan->USERNAME ?></td>
				<td>
					<a href="<?php echo base_url('admin/pelanggan/edit/'.$pelanggan->ID_PELANGGAN) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
					<?php include('delete.php') ?>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>