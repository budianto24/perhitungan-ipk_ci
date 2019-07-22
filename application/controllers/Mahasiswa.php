<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('user_level') == FALSE){
			redirect('auth');
		}

		$this->load->model('M_mahasiswa');
		$this->load->model('M_nilai');
		$this->load->model('M_matkul');

		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	public function index()
	{
		$data['mahasiswa'] = $this->M_mahasiswa->getAllData();

		$this->load->view('templates/header');
		$this->load->view('pages/dashboard', $data);
		$this->load->view('templates/footer');
	}


	public function grid()
	{
		$data['mahasiswa'] = $this->M_mahasiswa->getAllData();

		$this->load->view('templates/header');
		$this->load->view('pages/dashboard2', $data);
		$this->load->view('templates/footer');
	}


	public function tambah()
	{	
		$this->form_validation->set_rules('nim', 'NIM', 'required|is_unique[tb_mahasiswa.nim]');
		$this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
		$this->form_validation->set_rules('fakultas', 'fakultas', 'required');
		$this->form_validation->set_rules('prodi', 'Prodi', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('pages/tambah_mahasiswa');
			$this->load->view('templates/footer');	
		}else{
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Mahasiswa <strong>Berhasil Ditambah!!</strong>
						</div>');
			$this->M_mahasiswa->tambahDataMahasiswa();
			redirect('mahasiswa');	
		}
		
	}


	public function edit($nim)
	{
		$data['data'] = $this->M_mahasiswa->getDataByNim($nim);

		$this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required');
		$this->form_validation->set_rules('fakultas', 'fakultas', 'required');
		$this->form_validation->set_rules('prodi', 'Prodi', 'required');		

		if ($this->form_validation->run() == FALSE) {		
			$this->load->view('templates/header');
			$this->load->view('pages/edit_mahasiswa', $data);
			$this->load->view('templates/footer');
		}else{
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Mahasiswa <strong>Berhasil Diubah!!</strong>
						</div>');
			$this->M_mahasiswa->editDataMahasiswa();
			redirect('mahasiswa');	
		}
	}


	public function delete($nim)
	{
		$file = $this->M_mahasiswa->getDataByNim($nim);
           	
   		$filename = $file['gambar'];
        if($filename != 'default.jpg'){
		  unlink("assets/img/mahasiswa/$filename");
        }

        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Mahasiswa <strong>Berhasil Dihapus!!</strong>
						</div>');
		$this->M_mahasiswa->deleteMahasiswa($nim);
		redirect('mahasiswa');
	}


	public function detail($nim)
	{
		$data['mahasiswa'] = $this->M_mahasiswa->getDataByNim($nim);
		$data['nilai'] = $this->M_nilai->getDataByNim($nim);

		$this->load->view('templates/header');
		$this->load->view('pages/detail', $data);
		$this->load->view('templates/footer');	
	}

}