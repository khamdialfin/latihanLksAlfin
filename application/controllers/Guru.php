<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gurumodel');
	}

	public function index()
	{
		$result = $this->Gurumodel->getAllGuru();
		$data['guru'] = $result;

		$data['title'] = 'Data Guru';

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar', $data);
		$this->load->view('masterData/guru/index', $data);
		$this->load->view('layout/footer');
	}
}

/* End of file Controllername.php */
