<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_auth');
	}
	public function index()
	{
		if($this->session->userdata('user_level') == true){
			if($this->session->userdata('user_level')=="1"){
				redirect('dashboard');
			}
		}
		$this->load->view('pages/login');
	}
	public function proses_login()
	{
		$username = $this->input->post('username');
		$pass = $this->input->post('password');
		$ceklogin = $this->M_auth->login($username,$pass);
		if($ceklogin){
			foreach ($ceklogin as $row);
				$this->session->set_userdata('user_id',$row->user_id);
				$this->session->set_userdata('username',$row->username);
				$this->session->set_userdata('nama',$row->nama);
				$this->session->set_userdata('user_level',$row->user_level);
			
			if($this->session->userdata('user_level')=="1"){
				redirect('dashboard');
			}
		}else{
			$data['pesan'] = "Username atau Password Tidak Sesuai";
			$this->load->view('pages/login',$data);
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}