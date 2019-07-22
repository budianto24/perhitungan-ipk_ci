<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_matkul extends CI_Model{
	
	public function getAllMatkul()
	{
		$this->db->select('*')->from('tb_matkul')->order_by('nama_matkul','ASC');
		$query = $this->db->get();
		return $query->result_array();
	}


	public function getDataById($kode_matkul)
	{
		$this->db->select('*')->from('tb_matkul')->where('kode_matkul',$kode_matkul);
		$query = $this->db->get();
		return $query->result_array();	
	}


	public function add_matkul()
	{
		$data = [
			"kode_matkul" => $this->input->post('kode_matkul', true),
			"nama_matkul" => $this->input->post('nama_matkul', true),
			"sks" 		  => $this->input->post('sks', true)
		];

		$this->db->insert('tb_matkul', $data);
	}

	public function edit_matkul($kode_matkul)
	{
		$data = [			
			"nama_matkul" => $this->input->post('nama_matkul', true),
			"sks" 		  => $this->input->post('sks', true)
		];

		$this->db->where('kode_matkul', $kode_matkul);
		$this->db->update('tb_matkul', $data);
	}

}