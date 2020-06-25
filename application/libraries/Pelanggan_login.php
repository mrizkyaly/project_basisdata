<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        // Load data model pelanggan
        $this->CI->load->model('pelanggan_model');
	}

	// Fugnsi Login
	public function login($username,$password)
	{
		$check = $this->CI->pelanggan_model->login($username,$password);
		// Jika ada data user,Maka create session
		if ($check) {
			$id_pelanggan		= $check->ID_PELANGGAN;
			$nama_pelanggan		= $check->NAMA_PELANGGAN;
			// create session
			$this->CI->session->set_userdata('ID_PELANGGAN',$id_pelanggan);
			$this->CI->session->set_userdata('NAMA_PELANGGAN',$nama_pelanggan);
			$this->CI->session->set_userdata('USERNAME',$username);
			// Redirect ke halaman admin yang diproteksi
			redirect(base_url('pelanggan/transaksi'),'refresh');
		}else{
			// Kalau tidak ada user maka atau username passwotd salah
			$this->CI->session->set_flashdata('warning','Username atau password salah');
			redirect(base_url('loginpelanggan'),'refresh');
		}
	}

	// fungsi cek login
	public function cek_login()
	{
		// Memeriksa apakah session sudah atau belum jika belum silahkan ke halaman login
		if ($this->CI->session->userdata('USERNAME') == "") {
			$this->CI->session->set_flashdata('warning','Anda belum login');
			redirect(base_url('login'),'refresh');
		}
	}

	// fungsi cek login
	public function logout()
	{
		// Membuanf semua session yang sudah diset pada saat login
		$this->CI->session->unset_userdata('ID_PELANGGAN');
		$this->CI->session->unset_userdata('NAMA_PELANGGAN');
		$this->CI->session->unset_userdata('USERNAME');
		// Setelah session dibuang,makaa ridirect ke login
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(base_url('loginpelanggan'),'refresh');
	}


}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */
