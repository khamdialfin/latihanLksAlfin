<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelasmodel extends CI_Model
{
	public function getAllKelas()
	{
		$this->db->select('id_kelas, kelas, jurusan');
		$this->db->from('kelas');
		$this->db->order_by('id_kelas', 'asc');
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file ModelName.php */
