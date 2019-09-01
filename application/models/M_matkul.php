<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_matkul extends CI_Model{
	
	public function getAllData()
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


	public function addDataMatkul()
	{
		$data = [
			"kode_matkul" => $this->input->post('kode_matkul', true),
			"nama_matkul" => $this->input->post('nama_matkul', true),
			"sks" 		  => $this->input->post('sks', true)
		];

		$this->db->insert('tb_matkul', $data);
	}


	public function editDataMatkul($kode_matkul)
	{
		$data = [			
			"nama_matkul" => $this->input->post('nama_matkul', true),
			"sks" 		  => $this->input->post('sks', true)
		];

		$this->db->where('kode_matkul', $kode_matkul);
		$this->db->update('tb_matkul', $data);
	}


	public function deleteDataMatkul($kode_matkul)
	{
		$this->db->where('kode_matkul', $kode_matkul);
		$this->db->delete('tb_matkul');
	}

}