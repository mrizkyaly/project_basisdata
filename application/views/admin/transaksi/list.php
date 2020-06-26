<table id="example2" class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>NO</th>
			<th>GAMBAR</th>
			<th>NAMA PRODUK</th>
			<th>PEMBELI</th>
			<th>BAYAR</th>
			<th>TANGGAL</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($transaksi as $transaksi) { ?>
			<tr>
				<td><?php echo $no ?></td>
				<td>
					<img src="<?php echo base_url('assets/upload/image/thumbs/'.$transaksi->GAMBAR) ?>" class="img img-responsive img-thumbnail" width="70">
				</td>
				<td><?php echo $transaksi->NAMA_PRODUK ?></td>
				<td><?php echo $transaksi->NAMA_PELANGGAN ?></td>
				<td><?php echo $transaksi->BAYAR ?></td>
				<td><?php echo $transaksi->TGL_TRANSAKSI ?></td>
				<td>
					<?php include('delete.php') ?>
				</td>
			</tr>
		<?php $no++; } ?>
	</tbody>
</table>