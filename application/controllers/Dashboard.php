<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// Cek apakah user sudah login
		if (!$this->session->userdata('logged_in')) {
			redirect('auth');
		}
	}

	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['nama'] = $this->session->userdata('nama');
		$data['level'] = $this->session->userdata('level');

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('layout/footer');
	}
}
