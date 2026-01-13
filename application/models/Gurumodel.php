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

	public function insert($data)
	{
		return $this->db->insert('guru', $data);
	}
}

/* End of file ModelName.php */