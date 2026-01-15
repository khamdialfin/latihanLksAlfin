<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function login($username, $password)
	{
		// Cari user berdasarkan username
		$this->db->where('username', $username);
		$query = $this->db->get('users');

		if ($query->num_rows() == 1) {
			$user = $query->row();

			// Verifikasi password
			if (password_verify($password, $user->password)) {
				return $user;
			}
		}

		return false;
	}
}
