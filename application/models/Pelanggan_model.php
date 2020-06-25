<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// View All pelanggan
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('PELANGGAN');
		$this->db->order_by('ID_PELANGGAN', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail All pelanggan untuk edit
	public function detail($id_pelanggan)
	{
		$this->db->select('*');
		$this->db->from('PELANGGAN');
		$this->db->where('ID_PELANGGAN', $id_pelanggan);
		$this->db->order_by('ID_PELANGGAN', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// Login Pelanggan
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('PELANGGAN');
		$this->db->where(array( 'USERNAME'	=> $username,
								'PASSWORD'	=> $password));
		$this->db->order_by('ID_PELANGGAN', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}
	
	// tambah data pelanggan
	public function tambah($data)
	{
		$this->db->insert('PELANGGAN', $data);
	}

	// Edit data pelanggan
	public function edit($data)
	{
		$this->db->where('ID_PELANGGAN', $data['ID_PELANGGAN']);
		$this->db->update('PELANGGAN',$data);
	}	

	// Delete data pelanggan
	public function delete($data)
	{
		$this->db->where('ID_PELANGGAN', $data['ID_PELANGGAN']);
		$this->db->delete('PELANGGAN',$data);
	}	

}

/* End of file Pelanggan_model.php */
/* Location: ./application/models/Pelanggan_model.php */