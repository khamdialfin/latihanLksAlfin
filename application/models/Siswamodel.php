<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswamodel extends CI_Model
{
	public function getAllSiswa()
	{
		$this->db->select('siswa.*, kelas.kelas, kelas.jurusan');
		$this->db->from('siswa');
		$this->db->order_by('id', 'asc');
		$this->db->join('kelas', 'siswa.id_kelas = kelas.id_kelas', 'INNER');
		$query = $this->db->get();
		return $query->result();
	}
}

/* End of file ModelName.php */
