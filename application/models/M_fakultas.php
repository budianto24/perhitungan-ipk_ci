<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_fakultas extends CI_Model {

    public function getAllData()
    {
        $query = $this->db->get('tb_fakultas')->result_array();
        return $query;
    }

    public function getDataByKode($kode)
    {
        $query = $this->db->get_where('tb_fakultas', ['kode_fakultas' => $kode])->row_array();
        return $query;
    }

    public function addDataFakultas()
    {
        $data = [
            'kode_fakultas' => $this->input->post('kode_fakultas'),
            'nama_fakultas' => $this->input->post('nama_fakultas')
        ];

        $this->db->insert('tb_fakultas', $data);
    }

    public function editDataFakultas($kode)
    {
        $data = [
            'nama_fakultas' => $this->input->post('nama_fakultas')
        ];

        $this->db->where('kode_fakultas', $kode);
        $this->db->update('tb_fakultas', $data);
    }

    public function deleteDataFakultas($kode)
    {
        $this->db->where('kode_fakultas', $kode);
        $this->db->delete('tb_fakultas'); 
    }
}