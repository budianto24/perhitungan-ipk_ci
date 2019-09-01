<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth'); //Meload Model M_auth

		$this->load->library('form_validation'); //Meload Librari Form_validation
	}

	//Function yang pertama kali ditampilkan
	public function index()
	{
		if($this->session->userdata('user_id') == true){
			if($this->session->userdata('user_id')){
				redirect('dashboard');
			}
		}

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['title'] = "Login";
			$this->load->view('pages/login', $data);
		}else{
			$this->_login();
		}
	}

	//Function untuk proses  login
	private function _login()
	{
		$username 	= $this->input->post('username');
		$pass 		= md5($this->input->post('password'));
		$user	 	= $this->M_auth->login($username,$pass);

		//Kondisi jika telah melakukan login
		if($user){
			//Jika login berhasil
			$data = [
				'user_id' 	=> $user['user_id'],
				'username'	=> $user['username'],
				'nama'	=> $user['nama']
			];
			$this->session->set_userdata($data);
			
			$this->session->set_flashdata('flash', '<div class="alert alert-info alert-dismissible" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<strong>Selamat Datang!</strong> Ini adalah aplikasi sederhana untuk mengelolah Data Nilai Mahasiswa.
													</div>'); //Menampilkan notifikasi
			redirect('dashboard');
		}else{
			//Jika login gagal
			$this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible" role="alert">
  														<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  														<strong>Login Gagal!</strong> <br>Username atau Password salah.
														</div>'); //Menampilkan notifikasi
			redirect('auth');
		}
	}
	
	//Function untuk logout
	public function logout()
	{
		$this->session->sess_destroy(); //Menghilangkan session
		redirect(base_url());
	}
}