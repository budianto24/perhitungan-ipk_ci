<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		// Kondisi jika belum ada session login maka akan dialihkan ke halaman login
		if($this->session->userdata('user_id') == FALSE){
			redirect('auth');
		}

		$this->load->model('M_mahasiswa'); //Meload Model M_mahasiswa
		$this->load->model('M_nilai'); //Meload Model M_nilai
		$this->load->model('M_matkul'); //Meload Model M_matkul

		$this->load->library('form_validation'); //Meload Librari Form_validation
		$this->load->helper('form'); //Meload helper Form
	}

	//Function yang pertama kali ditampilkan saat mengakses halaman Fakultas
	public function index()
	{	
		$data['title'] = "Data Mahasiswa";
		$data['mahasiswa'] = $this->M_mahasiswa->getAllData(); //Menampilkan semua data Mahasiswa

		$this->load->view('templates/header', $data);
		$this->load->view('pages/mahasiswa', $data);
		$this->load->view('templates/footer');
	}

	//Function untuk menampilkan tampilan lain data Mahasiswa
	public function grid()
	{
		$data['title'] = "Data Mahasiswa";
		$data['mahasiswa'] = $this->M_mahasiswa->getAllData(); //Menampilkan semua data Mahasiswa

		$this->load->view('templates/header', $data);
		$this->load->view('pages/mahasiswa2', $data);
		$this->load->view('templates/footer');
	}

	//Function untuk menambah data Mahasiswa
	public function tambah()
	{	
		$this->load->model('M_fakultas'); //Meload model M_fakultas
		$this->load->model('M_prodi'); //Meload model M_prodi

		$data['fakultas'] = $this->M_fakultas->getAllData(); //Menampilkan semua data Fakultas
		$data['prodi'] = $this->M_prodi->getAllData(); //Menampilkan semua data Prodi

		$this->form_validation->set_rules('nim', 'NIM', 'required|is_unique[tb_mahasiswa.nim]'); //Set pengaturan Form validation
		$this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required'); //Set pengaturan Form validation
		$this->form_validation->set_rules('fakultas', 'fakultas', 'required'); //Set pengaturan Form validation
		$this->form_validation->set_rules('prodi', 'Prodi', 'required'); //Set pengaturan Form validation

		//Kondisi jika semua syarat Form validation terpenuhi
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Tambah Data Mahasiswa";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/tambah_mahasiswa', $data);
			$this->load->view('templates/footer');	
		}else{
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Mahasiswa <strong>Berhasil Ditambah!!</strong>
						</div>'); //Menampilkan notifikasi
			$this->M_mahasiswa->addDataMahasiswa(); //Proses tambah data Mahasiswa ke database
			redirect('mahasiswa');	
		}
	}

	//Function untuk mengedit data Mahasiswa berdasarka paramater NIM
	public function edit($nim)
	{
		$data['data'] = $this->M_mahasiswa->getDataByNim($nim); //Menampilkan data mahasiswa yang akan diedit berdasarkan NIM

		$this->load->model('M_fakultas'); //Meload model M_fakultas
		$this->load->model('M_prodi'); //Meload model M_prodi

		$data['fakultas'] = $this->M_fakultas->getAllData(); //Menampilkan semua data Fakultas
		$data['prodi'] = $this->M_prodi->getAllData(); //Menampilkan semua data Prodi

		$this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'required'); //Set pengaturan Form validation
		$this->form_validation->set_rules('fakultas', 'fakultas', 'required'); //Set pengaturan Form validation
		$this->form_validation->set_rules('prodi', 'Prodi', 'required'); //Set pengaturan Form validation

		//Kondisi jika semua syarat Form validation terpenuhi
		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Edit Data Mahasiswa";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/edit_mahasiswa', $data);
			$this->load->view('templates/footer');
		}else{
			$this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Mahasiswa <strong>Berhasil Diubah!!</strong>
						</div>'); //Menampilkan notifikasi
			$this->M_mahasiswa->editDataMahasiswa(); //Proses edit data Mahasiswa ke database
			redirect('mahasiswa');	
		}
	}

	//Function untuk menghapus data Mahasiswa berdasarkan parameter NIM
	public function delete($nim)
	{
		$file = $this->M_mahasiswa->getDataByNim($nim); //Menampilkan data mahasiswa yang akan diedit berdasarkan NIM
		
		//Menghapus gambar yang ada di folder assets/img/mahasiswa sesuai data yang dihapus
   		$filename = $file['gambar'];
        if($filename != 'default.jpg'){
		  unlink("assets/img/mahasiswa/$filename"); //Penghapusan gambar
        }

        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Mahasiswa <strong>Berhasil Dihapus!!</strong>
						</div>'); //Menampilkan notifikasi
		$this->M_mahasiswa->deleteDataMahasiswa($nim); //Proses hapus data Mahasiswa ke database
		redirect('mahasiswa');
	}

	//Function untuk menampilkan detail data Mahasiswa berdasarkan paramater NIM
	public function detail($nim)
	{
		$data['mahasiswa'] = $this->M_mahasiswa->getDataByNim($nim); //Menampilkan data mahasiswa yang akan diedit berdasarkan parameter NIM
		$data['nilai'] = $this->M_nilai->getDataByNim($nim); //Menampilkan data nilai yang akan diedit berdasarkan parameter NIM
		$data['title'] = "Data Nilai";
		$this->load->view('templates/header', $data);
		$this->load->view('pages/detail', $data);
		$this->load->view('templates/footer');	
	}

}