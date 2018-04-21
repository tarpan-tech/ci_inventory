<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }    

    /**
     * 
     * getJumlahSupplier
     * 
     * 
     * Get total rows in table supplier
     * 
     */
    public function getJumlahSupplier()
    {
        return $this->db->get('supplier')->num_rows();
    }


}

/* End of file Supplier_model.php */
