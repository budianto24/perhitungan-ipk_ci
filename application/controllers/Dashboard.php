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

		$this->load->model('M_dashboard'); //Meload M_dashboard

		$this->load->helper('form'); //Meload helper form
	}

	//Function yang pertama kali ditampilkan saat mengakses halaman Dashboard
	public function index()
	{	
		$data['title'] = "Dashboard";
		$data['data'] = $this->M_dashboard->dataTotal(); //Mengambil semua data total
		$data['bars'] = $this->M_dashboard->getDataBars(); //Mengambil semua data Mahasiswa

		$this->load->view('templates/header', $data); //Meload Header dan Navbar
		$this->load->view('pages/dashboard', $data); //Meload Content
		$this->load->view('templates/footer'); //Meload Footer
	}

	//Function untuk melakukan pencarian data Mahasiswa
	public function search()
	{
		$data['title'] = "Search";
		$keyword = htmlspecialchars($this->input->get('keyword', true)); //Data keyword yang dicari
		$this->load->model('M_mahasiswa'); //Meload M_mahasiswa
		$data['list'] = $this->M_mahasiswa->getDataSearch($keyword); //Menampilkan hasil data yang dicari
		
		$this->load->view('templates/header', $data); //Meload Header dan Navbar
		$this->load->view('pages/search',$data); //Meload Content
		$this->load->view('templates/footer'); //Meload Footer
	}

}