<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('user_level') == FALSE){
			redirect('auth');
		}

		$this->load->model('M_mahasiswa');

		$this->load->helper('form');
	}

	public function index()
	{
		$data['mahasiswa'] = $this->M_mahasiswa->getAllData();

		$this->load->view('templates/header');
		$this->load->view('pages/dashboard', $data);
		$this->load->view('templates/footer');
	}


	public function search(){
			$keyword = $this->input->get('keyword', true);
			$data['list'] = $this->M_mahasiswa->getDataSearch($keyword);

			$this->load->view('templates/header');
			$this->load->view('pages/search',$data);
			$this->load->view('templates/footer');
		}

}