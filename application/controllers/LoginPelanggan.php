<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginPelanggan extends CI_Controller {

	// Halaman Login
	public function index()
	{
		// Validasi
		$this->form_validation->set_rules('USERNAME','Username','required',
			array(	'required'	=> '%s harus diisi'));

		$this->form_validation->set_rules('PASSWORD','Password','required',
			array(	'required'	=> '%s harus diisi'));

		if ($this->form_validation->run()) {
			$username 	= $this->input->post('USERNAME');
			$password 	= $this->input->post('PASSWORD');
			// proses ke simple login
			$this->pelanggan_login->login($username,$password);
		}
		// end validasi

		$data = array(	'title'		=> 'Login Pelanggan');
		$this->load->view('login-pelanggan/list', $data, FALSE);
	}

	// Fungsi logout
	public function logout()
	{
		// ambil fungsi input tekan simple login libraries
		$this->pelanggan_login->logout();
	}

}

/* End of file LoginPelanggan.php */
/* Location: ./application/controllers/LoginPelanggan.php */