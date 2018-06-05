<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }    

    public function getAll()
    {
        return $this->db->get('supplier')->result();
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
        $kode_baru = $this->db->select_max('kode_supplier', 'kode_baru')->get('supplier');
        $result = $kode_baru->row();
        if ($kode_baru->num_rows() > 0) {
            return $result->kode_baru+1;
        } else {
            return 1;
        }
    }

    /**
     * Get all kode supplier
     *
     * @return void
     */
    public function getKodeSupplier()
    {
        return $this->db->select('kode_supplier, nama_supplier')->get('supplier')->result();
    }

    /**
     * 
     * getJumlah
     * 
     * 
     * Get total rows in table supplier
     * 
     */
    public function getJumlah()
    {
        return $this->db->get('supplier')->num_rows();
    }

    /**
     * 
     * add
     * 
     * Insert data into table 'supplier'
     * 
     * @param array $data Associative Array contains fieldname and data
     * 
     */
    public function add($data)
    {
        return $this->db->insert('supplier', $data, TRUE);
    }

    /**
     * 
     * update
     * 
     * Update data from table 'supplier'
     * 
     * @param int    $id Data's ID
     * @param array  $data Associative Array contains fieldname and new data
     * 
     */
    public function update($id, $data)
    {
        return $this->db->where('kode_supplier', $id)
                        ->update('supplier', $data);
    }

    /**
     * 
     * delete
     * 
     * Delete data from table 'supplier'
     * 
     * @param array  $where Associative Array contains fieldname and Data's ID
     * 
     */
    public function delete($where)
    {
        return $this->db->delete('supplier', $where);
    }

}

/* End of file Supplier_model.php */
