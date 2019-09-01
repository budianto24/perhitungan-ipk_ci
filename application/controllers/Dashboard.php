<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		// Kondisi jika belum ada session login maka akan dialihkan ke halaman login
		if($this->session->userdata('user_id') == FALSE){
			redirect('auth');
		}

		$this->load->model('M_mahasiswa'); //Meload M_mahasiswa
		$this->load->model('M_matkul'); //Meload M_mahasiswa
		$this->load->model('M_fakultas'); //Meload M_mahasiswa
		$this->load->model('M_prodi'); //Meload M_mahasiswa

		$this->load->helper('form'); //Meload helper form
	}

	//Function yang pertama kali ditampilkan saat mengakses halaman Dashboard
	public function index()
	{	
		$data['title'] = "Dashboard";
		$data['mahasiswa'] = $this->M_mahasiswa->getAllData(); //Mengambil semua data Mahasiswa
		$data['matakuliah'] = $this->M_matkul->getAllData(); //Mengambil semua data Mahasiswa
		$data['fakultas'] = $this->M_fakultas->getAllData(); //Mengambil semua data Mahasiswa
		$data['prodi'] = $this->M_prodi->getAllData(); //Mengambil semua data Mahasiswa

		$this->load->view('templates/header', $data); //Meload Header dan Navbar
		$this->load->view('pages/dashboard', $data); //Meload Content
		$this->load->view('templates/footer'); //Meload Footer
	}

	//Function untuk melakukan pencarian data Mahasiswa
	public function search()
	{
		$data['title'] = "Search";
		$keyword = $this->input->get('keyword', true); //Data keyword yang dicari
		$data['list'] = $this->M_mahasiswa->getDataSearch($keyword); //Menampilkan hasil data yang dicari

		$this->load->view('templates/header', $data); //Meload Header dan Navbar
		$this->load->view('pages/search',$data); //Meload Content
		$this->load->view('templates/footer'); //Meload Footer
	}

}