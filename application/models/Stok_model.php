<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }    

    /**
     * 
     * getJumlahStok
     * 
     * 
     * Get total rows in table stok
     * 
     */
    public function getJumlahStok()
    {
        return $this->db->get('stok')->num_rows();
    }


}

/* End of file Stok_model.php */
