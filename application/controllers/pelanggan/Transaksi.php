<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function index()
	{
		$data = array(	'title'		=> 'Transaksi',
						'isi'		=> 'pelanggan/transaksi/list'
					);
		$this->load->view('pelanggan/layout/wrapper', $data, FALSE);
		// proteksi halam admin dengan fungsi cek_lign yang ada di simple login
		$this->pelanggan_login->cek_login();
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/pelanggan/Dasbor.php */