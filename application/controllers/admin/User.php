<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// Load Modul
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		// proteksi halam admin dengan fungsi cek_lign yang ada di simple login
		$this->simple_login->cek_login();
	}

	// Data User
	public function index()
	{
		$user = $this->user_model->listing();

		$data = array(	'title'		=> 'Data User',
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
			$data = array(	'USERNAME'			=> $i->post('USERNAME'),
							'PASSWORD'			=> $i->post('PASSWORD')
						);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data telah ditambah');
			redirect(base_url('admin/user'),'refresh');
		}
		// End Masuk Database
	}

	// Edit User
	public function edit($id_user)
	{
		$user = $this->user_model->detail($id_user);

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

		$data = array(	'title'		=> 'Edit User',
						'user'		=> $user,
						'isi'		=> 'admin/user/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		// Masuk database
		}else{
			$i = $this->input;
			$data = array(	'ID_USER'			=> $id_user,
							'USERNAME'			=> $i->post('USERNAME'),
							'PASSWORD'			=> $i->post('PASSWORD')
						);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(base_url('admin/user'),'refresh');
		}
		// End Masuk Database
	}

	// Delete User
	public function delete($id_user)
	{
		$data = array('ID_USER'	=> $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('admin/user'),'refresh');
	}

}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */