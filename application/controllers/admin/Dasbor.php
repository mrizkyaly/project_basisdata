<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function index()
	{
		$data = array(	'title'		=> 'Dashboard',
						'isi'		=> 'admin/dasbor/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// proteksi halam admin dengan fungsi cek_lign yang ada di simple login
		$this->simple_login->cek_login();
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */