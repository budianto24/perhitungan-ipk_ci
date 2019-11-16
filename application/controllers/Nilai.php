<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('user_id') == FALSE){
			redirect('auth');
		}

		$this->load->model('M_mahasiswa');
		$this->load->model('M_nilai');
		$this->load->model('M_matkul');

		$this->load->library('form_validation');
		$this->load->helper('form');
	}


	public function tambah($nim)
	{
		$data['mahasiswa'] = $this->M_mahasiswa->getDataByNim($nim);
		$data['matkul'] = $this->M_matkul->getDataByKode($data['mahasiswa']['kode_fakultas'], $data['mahasiswa']['kode_prodi']);

		$this->form_validation->set_rules('kode_matkul', 'Mata Kuliah', 'required');
		$this->form_validation->set_rules('nilai', 'Nilai', 'required|integer|max_length[3]|greater_than_equal_to[0]|less_than_equal_to[100]');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Tambah Data Nilai";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/tambah_nilai', $data);
			$this->load->view('templates/footer');
		}else{
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Nilai <strong>Berhasil Ditambah!!</strong>
						</div>');

			$this->M_nilai->addDataNilai();
			redirect('mahasiswa/detail/'.$nim);
		}

	}


	public function edit($id)
	{
		$data['data'] = $this->M_nilai->getDataById($id);
		$nim = $data['data'][0]['nim'];
		$data['mahasiswa'] = $this->M_mahasiswa->getDataByNim($nim);

		$this->form_validation->set_rules('nilai', 'Nilai', 'required|integer|max_length[3]|greater_than_equal_to[0]|less_than_equal_to[100]');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Edit Data Nilai";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/edit_nilai', $data);
			$this->load->view('templates/footer');
		}else{
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Nilai <strong>Berhasil Diubah!!</strong>
						</div>');

			$this->M_nilai->editDataNilai();
			redirect('mahasiswa/detail/'.$nim);

		}
	}

	public function delete($id)
	{
		$data = $this->M_nilai->getDataById($id);
		$nim = $data[0]['nim'];

		$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Nilai <strong>Berhasil Dihapus!!</strong>
						</div>');
		$this->M_nilai->deleteDataNilai($id);
		redirect('mahasiswa/detail/'.$nim);
	}

}