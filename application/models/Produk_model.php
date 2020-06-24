<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// View All produk
	public function listing()
	{
		$this->db->select('PRODUK.*,
						USERS.USERNAME,
						JENIS.NAMA_JENIS');
		$this->db->from('PRODUK');
		// Join
		$this->db->join('USERS', 'USERS.ID_USER = PRODUK.ID_USER', 'left');
		$this->db->join('JENIS', 'JENIS.ID_JENIS = PRODUK.ID_JENIS', 'left');
		// End Join
		$this->db->order_by('ID_PRODUK', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail All produk untuk edit
	public function detail($id_produk)
	{
		$this->db->select('*');
		$this->db->from('PRODUK');
		$this->db->where('ID_PRODUK', $id_produk);
		$this->db->order_by('ID_PRODUK', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// tambah data produk
	public function tambah($data)
	{
		$this->db->insert('PRODUK', $data);
	}

	// Edit data produk
	public function edit($data)
	{
		$this->db->where('ID_PRODUK', $data['ID_PRODUK']);
		$this->db->update('PRODUK',$data);
	}	

	// Delete data produk
	public function delete($data)
	{
		$this->db->where('ID_PRODUK', $data['ID_PRODUK']);
		$this->db->delete('PRODUK',$data);
	}	

}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */