<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam_barang_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }    

    /**
     * 
     * getJumlahPinjamBarang
     * 
     * 
     * Get total rows in table pinjam_barang
     * 
     */
    public function getJumlahPinjamBarang()
    {
        return $this->db->get('pinjam_barang')->num_rows();
    }


}

/* End of file Pinjam_barang_model.php */
