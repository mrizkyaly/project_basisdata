<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// Load Modul
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	// Data User
	public function index()
	{
		$user = $this->user_model->listing();

		$data = array(	'title'		=> 'Data Pengguna',
						'user'		=> $user,
						'isi'		=> 'admin/user/list'
					);

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function tambah()
	{
		// Validasi Input
		$valid = $this->form_validation;

		$valid->set_rules('USERNAME','Username','required|min_length[5]|max_length[32]|is_unique[USERS.USERNAME]',
			array(	'required'			=>'%s harus diisi',
				  	'min_length'		=>'%s minimal 5 karakter',
				  	'max_length'		=>'%s maksimal 32 karakter',
				    'is_unique'			=>'%s sudah ada.buat username baru.'));

		$valid->set_rules('PASSWORD','Password','required',
			array(	'required'			=>'%s harus diisi'));

		if($valid->run()===FALSE) {
		// end validasi

		$data = array(	'title'		=> 'Tambah User',
						'isi'		=> 'admin/user/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// Masuk database
		}else{
			$i = $this->input;
			$data = array(	'USERNAME'			=>$i->post('USERNAME'),
							'PASSWORD'			=>$i->post('PASSWORD')
						);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/user'),'refresh');
		}
		// End Masuk Database
	}

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */