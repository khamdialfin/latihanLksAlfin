<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->view('auth/login');
	}

	public function login()
	{
		// Set rules validation
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal, tampilkan form login lagi
			$this->load->view('auth/login');
		} else {
			// Ambil data dari form
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			// Panggil model untuk login
			$user = $this->User_model->login($username, $password);

			if ($user) {
				// Login berhasil, buat session
				$session_data = array(
					'user_id'   => $user->id,
					'username'  => $user->username,
					'nama'      => $user->nama,
					'level'     => $user->level,
					'logged_in' => TRUE
				);

				$this->session->set_userdata($session_data);

				// Redirect ke dashboard
				redirect('dashboard');
			} else {
				// Login gagal
				$this->session->set_flashdata('error', 'Username atau password salah!');
				redirect('auth');
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}

	public function hash_password()
	{
		$this->load->view('auth/hash');
	}
}
