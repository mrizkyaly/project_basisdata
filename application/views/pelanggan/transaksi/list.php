<p>
  <a href="<?php echo base_url('pelanggan/transaksi/beli') ?>" class="btn btn-success btn-m">
    <i class="nav-icon fa fa-plus"></i> Beli Produk</a>
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
      <th>GAMBAR</th>
      <th>NAMA</th>
      <th>JENIS</th>
      <th>UKURAN</th>
      <th>HARGA</th>
      <th>USER</th>
    </tr>
  </thead>
  <tbody>
    <?php $no=1; foreach ($produk as $produk) { ?>
      <tr>
        <td><?php echo $no ?></td>
        <td>
          <img src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->GAMBAR) ?>" class="img img-responsive img-thumbnail" width="70">
        </td>
        <td><?php echo $produk->NAMA_PRODUK ?></td>
        <td><?php echo $produk->NAMA_JENIS ?></td>
        <td><?php echo $produk->UKURAN ?></td>
        <td><?php echo number_format($produk->HARGA,'0',',','.') ?></td>
        <td><?php echo $produk->USERNAME ?></td>
      </tr>
    <?php $no++; } ?>
  </tbody>
</table>