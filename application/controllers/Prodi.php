<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends CI_Controller {

    function __construct()
	{
		parent::__construct();

		if($this->session->userdata('user_id') == FALSE){
			redirect('auth');
        }
        
        $this->load->model('M_prodi'); //Meload Model M_prodi

        $this->load->library('form_validation'); //Meload Librari Form_validation
    }
    
    public function index()
    {
        $data['title'] = "Program Studi";
        $data['prodi'] = $this->M_prodi->getAllData();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/prodi', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {   
        $this->load->model('M_fakultas');
        $data['fakultas'] = $this->M_fakultas->getAllData();
        
        $this->form_validation->set_rules('kode_prodi', 'Kode prodi', 'required|is_unique[tb_prodi.kode_prodi]'); //Set pengaturan Form validation
        $this->form_validation->set_rules('nama_prodi', 'Nama prodi', 'required'); //Set pengaturan Form validation

        //Kondisi jika semua syarat Form validation terpenuhi
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Tambah Data prodi";
            $this->load->view('templates/header', $data);
            $this->load->view('pages/tambah_prodi');
            $this->load->view('templates/footer');
        }else{
            $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Prodi <strong>Berhasil Ditambah!!</strong>
						</div>'); //Menampilkan notifikasi
			$this->M_prodi->addDataProdi(); //Proses tambah data Prodi ke database
			redirect('prodi');
        }
    }


    public function edit($kode)
    {   
        $this->load->model('M_fakultas');
        $data['fakultas'] = $this->M_fakultas->getAllData();

        $data['prodi'] = $this->M_prodi->getDataByKode($kode);

        $this->form_validation->set_rules('nama_prodi', 'Nama prodi', 'required'); //Set pengaturan Form validation

        //Kondisi jika semua syarat Form validation terpenuhi
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Tambah Data prodi";
            $this->load->view('templates/header', $data);
            $this->load->view('pages/edit_prodi');
            $this->load->view('templates/footer');
        }else{
            $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Prodi <strong>Berhasil Diubah!!</strong>
						</div>'); //Menampilkan notifikasi
			$this->M_prodi->editDataProdi($kode); //Proses tambah data Prodi ke database
			redirect('prodi');
        }
    }

    //Function untuk menghapus data Prodi
    public function delete($kode)
    {
        $this->M_prodi->deleteDataProdi($kode); //Proses hapus data Prodi ke database
        $this->session->set_flashdata('flash', '<div class="alert alert-success alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> Data Prodi <strong>Berhasil Dihapus!!</strong>
                        </div>'); //Menampilkan notifikasi
        redirect('prodi');
    }

}