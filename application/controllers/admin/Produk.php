<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	// Load Modul
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('jenis_model');
		// proteksi halam admin dengan fungsi cek_lign yang ada di simple login
		$this->simple_login->cek_login();
	}

	// Data Produk
	public function index()
	{
		$produk = $this->produk_model->listing();

		$data = array(	'title'		=> 'Data Produk',
						'produk'		=> $produk,
						'isi'		=> 'admin/produk/list'
					);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah()
	{
		// Ambil data jenis
		$jenis = $this->jenis_model->listing();
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('NAMA_PRODUK','Nama Produk','required',
			array(	'required'			=>'%s harus diisi'));

		if($valid->run()) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400';//dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('GAMBAR')){
		// end validasi

		$data = array(	'title'		=> 'Tambah Produk',
						'jenis'		=> $jenis,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/produk/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// Masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());
			// Create thumbnail gambar
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
			// Lokasi folder thumbnail
			$config['new_image']		= './assets/upload/image/thumbs/';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 250;//pixel
			$config['height']       	= 250;
			$config['thumb_marker']		='';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			// End create thumbnail gambar
			$i = $this->input;
			$data = array(	'ID_USER'			=> $this->session->userdata('ID_USER'),
							'ID_JENIS'			=> $i->post('ID_JENIS'),
							'NAMA_PRODUK'		=> $i->post('NAMA_PRODUK'),
							'UKURAN'			=> $i->post('UKURAN'),
							'HARGA'				=> $i->post('HARGA'),
							'GAMBAR'			=> $upload_gambar['upload_data']['file_name']
						);
			$this->produk_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/produk'),'refresh');
		}}
		// End Masuk Database
		$data = array(	'title'		=> 'Tambah Produk',
						'jenis'		=> $jenis,
						'isi'		=> 'admin/produk/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Edit Produk
	public function edit($id_produk)
	{
		$produk 	= $this->produk_model->detail($id_produk);
		// Ambil data jenis
		$jenis 		= $this->jenis_model->listing();

		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('NAMA_PRODUK','Nama Produk','required',
			array(	'required'			=>'%s harus diisi'));

		if($valid->run()) {
			// Check jika gambar diganti 
			if (!empty($_FILES['GAMBAR']['name'])) {

			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400';//dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('GAMBAR')){
		// end validasi

		$data = array(	'title'		=> 'Edit Produk '.$produk->NAMA_PRODUK,
						'jenis'		=> $jenis,
						'produk'	=> $produk,
						'error'		=> $this->upload->display_errors(),
						'isi'		=> 'admin/produk/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// Masuk database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());
			// Create thumbnail gambar
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
			// Lokasi folder thumbnail
			$config['new_image']		= './assets/upload/image/thumbs/';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 250;//pixel
			$config['height']       	= 250;
			$config['thumb_marker']		='';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();
			// End create thumbnail gambar
			$i = $this->input;
			$data = array(	'ID_PRODUK'			=> $id_produk,
							'ID_USER'			=> $this->session->userdata('ID_USER'),
							'ID_JENIS'			=> $i->post('ID_JENIS'),
							'NAMA_PRODUK'		=> $i->post('NAMA_PRODUK'),
							'UKURAN'			=> $i->post('UKURAN'),
							'HARGA'				=> $i->post('HARGA'),
							'GAMBAR'			=> $upload_gambar['upload_data']['file_name']
						);
			$this->produk_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/produk'),'refresh');
		}}else{
			// Edit produk tanpa ganti gambar
			$i = $this->input;
			$data = array(	'ID_PRODUK'			=> $id_produk,
							'ID_USER'			=> $this->session->userdata('ID_USER'),
							'ID_JENIS'			=> $i->post('ID_JENIS'),
							'NAMA_PRODUK'		=> $i->post('NAMA_PRODUK'),
							'UKURAN'			=> $i->post('UKURAN'),
							'HARGA'				=> $i->post('HARGA'),
						);
			$this->produk_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/produk'),'refresh');
		}}
		// End Masuk Database
		$data = array(	'title'		=> 'Edit Produk '.$produk->NAMA_PRODUK,
						'jenis'		=> $jenis,
						'produk'	=> $produk,
						'isi'		=> 'admin/produk/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// Delete Produk
	public function delete($id_produk)
	{
		// Proses Hapus Gambar
		$produk 	= $this->produk_model->detail($id_produk);
		unlink('./assets/upload/image/'.$produk->GAMBAR);
		unlink('./assets/upload/image/thumbs/'.$produk->GAMBAR);
		//End Proses hapus gambar 
		$data = array('ID_PRODUK'	=> $id_produk);
		$this->produk_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/produk'),'refresh');
	}

}

/* End of file Produk.php */
/* Location: ./application/controllers/admin/Produk.php */