<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kelasmodel');
	}

	public function index()
	{
		$result = $this->Kelasmodel->getAllKelas();
		$data['kelas'] = $result;

		$data['title'] = 'Data Kelas';

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar', $data);
		$this->load->view('masterData/kelas/index', $data);
		$this->load->view('layout/footer');
	}
}

/* End of file Controllername.php */
