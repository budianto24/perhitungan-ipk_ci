<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('user_level') == FALSE){
			redirect('auth');
		}

		$this->load->model('M_matkul');

		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function index()
	{
		$data['mahasiswa'] = $this->M_matkul->getAllMatkul();

		$this->load->view('templates/header');
		$this->load->view('pages/matakuliah', $data);
		$this->load->view('templates/footer');
	}


	public function tambah()
	{
		$this->form_validation->set_rules('nama_matkul', 'Kode Mata Kuliah', 'required|is_unique[tb_matkul.kode_matkul]');
		$this->form_validation->set_rules('nama_matkul', 'Nama Mata Kuliah', 'required|is_unique[tb_matkul.nama_matkul]');
		$this->form_validation->set_rules('sks', 'SKS', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('pages/tambah_matkul');
			$this->load->view('templates/footer');	
		}else{
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Mata Kuliah <strong>Berhasil Ditambah!!</strong>
						</div>');
			$this->M_matkul->add_matkul();
			redirect('matakuliah');	
		}
	}


	public function edit($kode_matkul)
	{
		$data['matakuliah'] = $this->M_matkul->getDataById($kode_matkul);

		$this->form_validation->set_rules('nama_matkul', 'Nama Mata Kuliah', 'required');
		$this->form_validation->set_rules('sks', 'SKS', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('pages/edit_matkul',$data);
			$this->load->view('templates/footer');	
		}else{
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Mata Kuliah <strong>Berhasil Diubah!!</strong>
						</div>');
			$this->M_matkul->edit_matkul($kode_matkul);
			redirect('matakuliah');	
		}	
	}


	public function delete($kode_matkul)
	{	
		$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Mata Kuliah <strong>Berhasil Dihapus!!</strong>
						</div>');
		$this->db->where('kode_matkul', $kode_matkul);
		$this->db->delete('tb_matkul');
		redirect('matakuliah');	
	}

}