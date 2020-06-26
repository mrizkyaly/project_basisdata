<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		// proteksi halam admin dengan fungsi cek_lign yang ada di simple login
		$this->simple_login->cek_login();
	}

	public function index()
	{
		$transaksi = $this->transaksi_model->listing();

		$data = array(	'title'			=> 'Daftar Transaksi',
						'transaksi'		=> $transaksi,
						'isi'			=> 'admin/transaksi/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete transaksi
	public function delete($id_transaksi)
	{
		$data = array('ID_TRANSAKSI'	=> $id_transaksi);
		$this->transaksi_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/transaksi'),'refresh');
	}

}

/* End of file Transaksi.php */
/* Location: ./application/controllers/admin/Transaksi.php */