<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gurumodel extends CI_Model
{

	// nama tabel
	private $table = 'guru';

	/**
	 * Ambil semua data guru
	 * SELECT * FROM guru
	 */
	public function get_all()
	{
		return $this->db
			->order_by('id_guru', 'DESC')
			->get($this->table)
			->result();
	}

	/**
	 * Ambil 1 data guru berdasarkan id
	 * SELECT * FROM guru WHERE id_guru = ?
	 */
	public function get_by_id($id)
	{
		return $this->db
			->where('id_guru', $id)
			->get($this->table)
			->row();
	}

	/**
	 * Insert data guru
	 */
	public function insert($data)
	{
		return $this->db->insert($this->table, $data);
	}

	/**
	 * Update data guru
	 */
	public function update($id, $data)
	{
		return $this->db
			->where('id_guru', $id)
			->update($this->table, $data);
	}

	/**
	 * Hapus data guru
	 */
	public function delete($id)
	{
		return $this->db
			->where('id_guru', $id)
			->delete($this->table);
	}
}
