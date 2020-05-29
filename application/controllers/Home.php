<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	// Halaman Utama Web
	public function index()
	{
		$data = array(	'title' 	=> 'Jamu Store',
						'isi'		=> 'home/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */