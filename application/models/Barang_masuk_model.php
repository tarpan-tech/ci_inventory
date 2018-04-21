<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_masuk_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }    

    /**
     * 
     * getJumlahBarangMasuk
     * 
     * 
     * Get total rows in table masuk_barang
     * 
     */
    public function getJumlahBarangMasuk()
    {
        return $this->db->get('masuk_barang')->num_rows();
    }


}

/* End of file Barang_masuk_model.php */
