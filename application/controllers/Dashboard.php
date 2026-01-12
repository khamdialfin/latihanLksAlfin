<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	public function index()
	{

		$data['title'] = 'Dashboard';

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar', $data);
		$this->load->view('dashboard/index');
		$this->load->view('layout/footer');
	}
}

/* End of file Controllername.php */
