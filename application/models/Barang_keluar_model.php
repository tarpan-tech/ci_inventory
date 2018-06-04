<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_keluar_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }    

    public function getAll()
    {
        return $this->db->get('keluar_barang')->result();
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
        $kode_baru = $this->db->select_max('id_keluar_barang', 'kode_baru')->get('keluar_barang');
        $result = $kode_baru->row();
        if ($kode_baru->num_rows() > 0) {
            return $result->kode_baru+1;
        } else {
            return 1;
        }
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


    /**
     * 
     * addBarangKeluar
     * 
     * Insert data into table 'keluar_barang'
     * 
     * @param array $data Associative Array contains fieldname and data
     * 
     */
    public function addBarangKeluar($data)
    {
        return $this->db->insert('keluar_barang', $data, TRUE);
    }

    /**
     * 
     * updateBarangKeluar
     * 
     * Update data from table 'keluar_barang'
     * 
     * @param int    $id Data's ID
     * @param array  $data Associative Array contains fieldname and new data
     * 
     */
    public function updateBarangKeluar($id, $data)
    {
        return $this->db->where('id_keluar_barang', $id)
                        ->update('keluar_barang', $data);
    }

    /**
     * 
     * deleteBarangKeluar
     * 
     * Delete data from table 'keluar_barang'
     * 
     * @param array  $where Associative Array contains fieldname and Data's ID
     * 
     */
    public function deleteBarangKeluar($where)
    {
        return $this->db->delete('keluar_barang', $where);
    }

}

/* End of file Barang_keluar_model.php */
