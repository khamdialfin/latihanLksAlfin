<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Siswamodel');
	}

	public function index()
	{
		$result = $this->Siswamodel->getAllSiswa();
		$data['siswa'] = $result;

		$data['title'] = 'Data Siswa';

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar', $data);
		$this->load->view('masterData/siswa/index', $data);
		$this->load->view('layout/footer');
	}
}

/* End of file Controllername.php */