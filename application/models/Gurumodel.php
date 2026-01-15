<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gurumodel extends CI_Model
{
	public function getAllGuru()
	{
		$this->db->select('id_guru,nama,no_telp,alamat,pengampu');
		$this->db->from('guru');
		$this->db->order_by('id_guru', 'asc');
		$query = $this->db->get();
		return $query->result();
	}


	public function getGuruById($id)
	{
		$this->db->where('id_guru', $id);
		$query = $this->db->get('guru');
		return $query->row();
	}

	public function insert($data)
	{
		return $this->db->insert('guru', $data);
	}

	// TAMBAHKAN METHOD INI
	public function update($id, $data)
	{
		$this->db->where('id_guru', $id);
		return $this->db->update('guru', $data);
	}

	// TAMBAHKAN METHOD INI
	public function delete($id)
	{
		$this->db->where('id_guru', $id);
		return $this->db->delete('guru');
	}
}
