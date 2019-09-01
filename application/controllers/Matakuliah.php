<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		// Kondisi jika belum ada session login maka akan dialihkan ke halaman login
		if($this->session->userdata('user_id') == FALSE){
			redirect('auth');
		}

		$this->load->model('M_matkul'); //Meload Model M_matkul

		$this->load->library('form_validation'); //Meload Librari Form_validation
		$this->load->helper('form'); //Meload helper Form
	}

	//Function yang pertama kali ditampilkan saat mengakses halaman Matakuliah
	public function index()
	{
		$data['title'] = "Data Matakuliah";
		$data['mahasiswa'] = $this->M_matkul->getAllData(); //Menampilkan semua data Matakuliah

		$this->load->view('templates/header', $data);
		$this->load->view('pages/matakuliah', $data);
		$this->load->view('templates/footer');
	}

	//Function untuk menambah data Matakuliah
	public function tambah()
	{
		$this->form_validation->set_rules('nama_matkul', 'Kode Mata Kuliah', 'required|is_unique[tb_matkul.kode_matkul]'); //Set pengaturan Form validation
		$this->form_validation->set_rules('nama_matkul', 'Nama Mata Kuliah', 'required|is_unique[tb_matkul.nama_matkul]'); //Set pengaturan Form validation
		$this->form_validation->set_rules('sks', 'SKS', 'required'); //Set pengaturan Form validation

		//Kondisi jika semua syarat Form validation terpenuhi
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Tambah Data Matakuliah";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/tambah_matkul');
			$this->load->view('templates/footer');
		}else{
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Mata Kuliah <strong>Berhasil Ditambah!!</strong>
						</div>'); //Menampilkan notifikasi
			$this->M_matkul->addDataMatkul(); //Proses tambah data Matakuliah ke database
			redirect('matakuliah');	
		}
	}

	//Function untuk mengedit data Matakuliah berdasarkan paramater Kode Matkul
	public function edit($kode_matkul)
	{
		$data['matakuliah'] = $this->M_matkul->getDataById($kode_matkul);

		$this->form_validation->set_rules('nama_matkul', 'Nama Mata Kuliah', 'required');
		$this->form_validation->set_rules('sks', 'SKS', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Edit Data Matakuliah";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/edit_matkul',$data);
			$this->load->view('templates/footer');	
		}else{
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Mata Kuliah <strong>Berhasil Diubah!!</strong>
						</div>'); //Menampilkan notifikasi
			$this->M_matkul->editDataMatkul($kode_matkul); //Proses mengedit Matakuliah ke database berdasarkan paramter kode matkul
			redirect('matakuliah');	
		}	
	}

	//Function untuk menghapus data Matakuliah berdasarkan paramater Kode Matkul
	public function delete($kode_matkul)
	{	
		$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Mata Kuliah <strong>Berhasil Dihapus!!</strong>
						</div>'); //Menampilkan notifikasi
		$this->M_matkul->deleteDataMatkul($kode_matkul); //Proses menghapus Matakuliah ke database berdasarkan paramter kode matkul
		redirect('matakuliah');	
	}

}