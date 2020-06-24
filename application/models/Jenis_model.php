<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jenis_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// View All jenis
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('JENIS');
		$this->db->order_by('ID_JENIS', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail All jenis untuk edit
	public function detail($id_jenis)
	{
		$this->db->select('*');
		$this->db->from('JENIS');
		$this->db->where('ID_JENIS', $id_jenis);
		$this->db->order_by('ID_JENIS', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// tambah data jenis
	public function tambah($data)
	{
		$this->db->insert('JENIS', $data);
	}

	// Edit data jenis
	public function edit($data)
	{
		$this->db->where('ID_JENIS', $data['ID_JENIS']);
		$this->db->update('JENIS',$data);
	}	

	// Delete data jenis
	public function delete($data)
	{
		$this->db->where('ID_JENIS', $data['ID_JENIS']);
		$this->db->delete('JENIS',$data);
	}	

}

/* End of file Jenis_model.php */
/* Location: ./application/models/Jenis_model.php */