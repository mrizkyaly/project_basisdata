<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// View All transaksi
	public function listing()
	{
		$this->db->select('TRANSAKSI.*,
						PRODUK.NAMA_PRODUK,
						PRODUK.GAMBAR,
						PELANGGAN.NAMA_PELANGGAN,
						PELANGGAN.USERNAME');
		$this->db->from('TRANSAKSI');
		// Join
		$this->db->join('PRODUK', 'PRODUK.ID_PRODUK = TRANSAKSI.ID_PRODUK', 'left');
		$this->db->join('PELANGGAN', 'PELANGGAN.ID_PELANGGAN = TRANSAKSI.ID_PELANGGAN', 'left');
		// End Join
		$this->db->order_by('ID_TRANSAKSI', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}

	// Detail All transaksi untuk edit
	public function detail($id_transaksi)
	{
		$this->db->select('*');
		$this->db->from('TRANSAKSI');
		$this->db->where('ID_TRANSAKSI', $id_transaksi);
		$this->db->order_by('ID_TRANSAKSI', 'ASC');
		$query = $this->db->get();
		return $query->row();
	}

	// tambah data transaksi
	public function tambah($data)
	{
		$this->db->insert('TRANSAKSI', $data);
	}

	// Edit data transaksi
	public function edit($data)
	{
		$this->db->where('ID_TRANSAKSI', $data['ID_TRANSAKSI']);
		$this->db->update('TRANSAKSI',$data);
	}	

	// Delete data transaksi
	public function delete($data)
	{
		$this->db->where('ID_TRANSAKSI', $data['ID_TRANSAKSI']);
		$this->db->delete('TRANSAKSI',$data);
	}	

}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */