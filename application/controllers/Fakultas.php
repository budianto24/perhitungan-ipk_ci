<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fakultas extends CI_Controller {

    function __construct()
	{
		parent::__construct();

        // Kondisi jika belum ada session login maka akan dialihkan ke halaman login
		if($this->session->userdata('user_id') == FALSE){
			redirect('auth');
		}

		$this->load->model('M_fakultas'); //Meload Model M_fakultas

		$this->load->library('form_validation'); //Meload Librari Form_validation
		$this->load->helper('form'); //Meload helper Form
	}

    //Function yang pertama kali ditampilkan saat mengakses halaman Fakultas
    public function index()
    {   
        $data['title'] = "Fakultas";
        $data['fakultas'] = $this->M_fakultas->getAllData(); //Menampilkan semua data Fakultas
        $this->load->view('templates/header', $data);
        $this->load->view('pages/fakultas', $data);
        $this->load->view('templates/footer');
    }


    //Function untuk menambah data Fakultas
    public function tambah()
    {   
        $this->form_validation->set_rules('kode_fakultas', 'Kode Fakultas', 'required|is_unique[tb_fakultas.kode_fakultas]'); //Set pengaturan Form validation
        $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required'); //Set pengaturan Form validation

        //Kondisi jika semua syarat Form validation terpenuhi
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Tambah Data Fakultas";
            $this->load->view('templates/header', $data);
            $this->load->view('pages/tambah_fakultas');
            $this->load->view('templates/footer');
        }else{
            $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Fakultas <strong>Berhasil Ditambah!!</strong>
						</div>'); //Menampilkan notifikasi
			$this->M_fakultas->addDataFakultas(); //Proses tambah data Fakultas ke database
			redirect('fakultas');
        }
    }

    //Function untuk mengedit data Fakultas
    public function edit($kode)
    {
        $this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required'); //Set pengaturan Form validation

        //Kondisi jika semua syarat Form validation terpenuhi
        if ($this->form_validation->run() == FALSE) {
            $data['fakultas'] = $this->M_fakultas->getDataByKode($kode); //Menampilkan data Fakultas yang akan diedit
            $data['title'] = "Edit Data Fakultas";
            $this->load->view('templates/header', $data);
            $this->load->view('pages/edit_fakultas', $data);
            $this->load->view('templates/footer');
        }else{
            $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Fakultas <strong>Berhasil Diedit!!</strong>
						</div>'); //Menampilkan notifikasi
			$this->M_fakultas->editDataFakultas($kode); //Proses edit data Fakultas ke database
			redirect('fakultas');	
        }
    }

    //Function untuk menghapus data Fakultas
    public function delete($kode)
    {
        $this->M_fakultas->deleteDataFakultas($kode); //Proses hapus data Fakultas ke database
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Fakultas <strong>Berhasil Dihapus!!</strong>
                        </div>'); //Menampilkan notifikasi
        redirect('fakultas');
    }
}