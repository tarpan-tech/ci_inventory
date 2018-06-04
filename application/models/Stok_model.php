<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }    

    public function getAll()
    {
        return $this->db->get('stok')->result();
    }

    /**
     * 
     * getKodeBaru
     * 
     * Get a new ID for primary key
     * 
     */
    public function getKodeBaru()
    {
        $kode_baru = $this->db->select_max('kode_stok', 'kode_baru')->get('stok');
        $result = $kode_baru->row();
        if ($kode_baru->num_rows() > 0) {
            return $result->kode_baru+1;
        } else {
            return 1;
        }
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


    /**
     * 
     * addStok
     * 
     * Insert data into table 'stok'
     * 
     * @param array $data Associative Array contains fieldname and data
     * 
     */
    public function addStok($data)
    {
        return $this->db->insert('stok', $data, TRUE);
    }

    /**
     * 
     * updateStok
     * 
     * Update data from table 'stok'
     * 
     * @param int    $id Data's ID
     * @param array  $data Associative Array contains fieldname and new data
     * 
     */
    public function updateStok($id, $data)
    {
        return $this->db->where('kode_stok', $id)
                        ->update('stok', $data);
    }

    /**
     * 
     * deleteStok
     * 
     * Delete data from table 'stok'
     * 
     * @param array  $where Associative Array contains fieldname and Data's ID
     * 
     */
    public function deleteStok($where)
    {
        return $this->db->delete('stok', $where);
    }

}

/* End of file Stok_model.php */
