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

	/**
	 * index()
	 * -------------------------
	 * List data + siapkan data edit
	 */
	public function index()
	{
		$data['guru'] = $this->Gurumodel->get_all();

		$data['edit'] = null;
		if ($this->input->get('edit')) {
			$data['edit'] = $this->Gurumodel
				->get_by_id($this->input->get('edit'));
		}
		$data['title'] = 'Data Guru';

		$this->load->view('layout/header', $data);
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar', $data);
		$this->load->view('masterData/guru/index', $data);
		$this->load->view('layout/footer');
	}

	/**
	 * save()
	 * -------------------------
	 * UPDATE OR CREATE (1 METHOD)
	 */
	public function save()
	{
		$id = $this->input->post('id_guru');

		// VALIDASI
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('no_telp', 'No Telp', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('pengampu', 'Pengampu', 'required');

		if ($this->form_validation->run() == FALSE) {
			// kembali ke modal sesuai kondisi
			if ($id) {
				redirect('guru?edit=' . $id . '#modal-form');
			} else {
				redirect('guru#modal-form');
			}
		}

		$data = [
			'nama'     => $this->input->post('nama'),
			'no_telp'  => $this->input->post('no_telp'),
			'alamat'   => $this->input->post('alamat'),
			'pengampu' => $this->input->post('pengampu'),
		];

		// ===== UPDATE OR CREATE =====
		if ($id) {
			$this->Gurumodel->update($id, $data);
		} else {
			$this->Gurumodel->insert($data);
		}

		redirect('guru');
	}

	/**
	 * destroy()
	 * -------------------------
	 * DELETE
	 */
	public function destroy($id)
	{
		if ($id) {
			$this->Gurumodel->delete($id);
		}

		redirect('guru');
	}
}
