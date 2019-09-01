<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_prodi extends CI_Model {

    public function getAllData()
    {	
		$this->db->select('*');
		$this->db->from('tb_prodi');
		$this->db->join('tb_fakultas', 'tb_fakultas.kode_fakultas = tb_prodi.kode_fakultas');
		$this->db->order_by('tb_prodi.kode_prodi', 'ASC');
        return $this->db->get()->result_array();
    }

	public function getDataByKode($kode)
	{
		$query = $this->db->get_where('tb_prodi', ['kode_prodi' => $kode])->row_array();
        return $query;
	}

	public function addDataProdi()
	{
		$data = [
			"kode_prodi"    => $this->input->post('kode_prodi', true),
			"kode_fakultas"    => $this->input->post('kode_fakultas', true),
			"nama_prodi"    => $this->input->post('nama_prodi', true)
		];
		$this->db->insert('tb_prodi', $data);
	}

	public function editDataProdi($kode)
	{
		$data = [
			"kode_fakultas"    => $this->input->post('kode_fakultas', true),
			"nama_prodi"    => $this->input->post('nama_prodi', true)
		];
		$this->db->where('kode_prodi', $kode);
		$this->db->update('tb_prodi', $data);
	}

	public function deleteDataProdi($kode)
	{
		$this->db->where('kode_prodi', $kode);
		$this->db->delete('tb_prodi');
	}
}