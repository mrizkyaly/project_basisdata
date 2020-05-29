<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// View All user
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('USERS');
		$this->db->order_by('ID_USER', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}

	// tambah data user
	public function tambah($data)
	{
		$this->db->insert('USERS', $data);
	}	

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */