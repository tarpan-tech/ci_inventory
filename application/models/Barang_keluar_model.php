<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_keluar_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }    

    /**
     * 
     * getJumlahBarangKeluar
     * 
     * 
     * Get total rows in table keluar_barang
     * 
     */
    public function getJumlahBarangKeluar()
    {
        return $this->db->get('keluar_barang')->num_rows();
    }


}

/* End of file Barang_keluar_model.php */
