<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class Barang_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getAll()
    {
        return $this->db->get('barang')->result();
    }

    /**
     * 
     * getKodeBaru
     * 
     * Get a new ID for primary key
     * 
     * @return int 
     */
    public function getKodeBaru()
    {
        $kode_baru = $this->db->select_max('kode_barang', 'kode_baru')->get('barang');
        $result = $kode_baru->row();
        if ($kode_baru->num_rows() > 0) {
            return $result->kode_baru+1;
        } else {
            return 1;
        }
    }

    /**
     * 
     * getJumlahBarang
     * 
     * Get total rows in table barang
     * 
     * @return int Total rows in table barang
     * 
     */
    public function getJumlahBarang()
    {
        return $this->db->get('barang')->num_rows();
    }

}