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
     * Get all kode barang
     *
     * @return void
     */
    public function getKodeBarang()
    {
        return $this->db->select('kode_barang, nama_barang')->get('barang')->result();
    }

    /**
     * 
     * getJumlahBarang
     * 
     * Get total rows in table barang
     * 
     */
    public function getJumlahBarang()
    {
        return $this->db->get('barang')->num_rows();
    }

    /**
     * 
     * addBarang
     * 
     * Insert data into table 'barang'
     * 
     * @param array $data Associative Array contains fieldname and data
     * 
     */
    public function addBarang($data)
    {
        return $this->db->insert('barang', $data, TRUE);
    }

    /**
     * 
     * updateBarang
     * 
     * Update data from table 'barang'
     * 
     * @param int    $id Data's ID
     * @param array  $data Associative Array contains fieldname and new data
     * 
     */
    public function updateBarang($id, $data)
    {
        return $this->db->where('kode_barang', $id)
                        ->update('barang', $data);
    }

    /**
     * 
     * deleteBarang
     * 
     * Delete data from table 'barang'
     * 
     * @param array  $where Associative Array contains fieldname and Data's ID
     * 
     */
    public function deleteBarang($where)
    {
        return $this->db->delete('barang', $where);
    }

}