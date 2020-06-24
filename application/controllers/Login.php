<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
			$this->simple_login->login($username,$password);
		}
		// end validasi

		$data = array(	'title'		=> 'Login Administrator');
		$this->load->view('login/list', $data, FALSE);
	}

	// Fungsi logout
	public function logout()
	{
		// ambil fungsi input tekan simple login libraries
		$this->simple_login->logout();
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */