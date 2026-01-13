<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gurumodel');
		$this->load->library('form_validation');
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

	public function tambah()
	{
		if ($this->input->is_ajax_request()) {
			$this->load->view('masterData/guru/create');
		} else {
			show_404();
		}
	}

	public function store()
	{
		if (!$this->input->is_ajax_request()) {
			show_404();
			return;
		}

		// Server-side validation
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('no_telp', 'No Telepon', 'trim|required|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('pengampu', 'Guru Pengampu', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			// Jika validasi gagal
			$errors = $this->form_validation->error_array();
			echo json_encode([
				'status' => 'error',
				'messages' => $errors
			]);
			return;
		}

		// Jika validasi berhasil, insert data
		$data = [
			'nama' => $this->input->post('nama'),
			'no_telp' => $this->input->post('no_telp'),
			'alamat' => $this->input->post('alamat'),
			'pengampu' => $this->input->post('pengampu')
		];

		$insert = $this->Gurumodel->insert($data);

		if ($insert) {
			echo json_encode(['status' => 'success', 'message' => 'Data guru berhasil ditambahkan']);
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Gagal menambahkan data guru']);
		}
	}
}

/* End of file Controllername.php */
