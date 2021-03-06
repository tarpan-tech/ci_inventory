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
     * getJumlah
     * 
     * Get total rows in table barang
     * 
     */
    public function getJumlah()
    {
        return $this->db->get('barang')->num_rows();
    }

    /**
     * getJumlahBarang
     * 
     * Get jumlah barang by kode barang
     *
     * @param int $kode
     * @return void
     */
    public function getJumlahBarang($kode)
    {
        return $this->db->select('jml_barang')
                        ->where('kode_barang', $kode)
                        ->get('barang')
                        ->row();
    }

    /**
     * 
     * add
     * 
     * Insert data into table 'barang'
     * 
     * @param array $data Associative Array contains fieldname and data
     * 
     */
    public function add($data)
    {
        return $this->db->insert('barang', $data, TRUE);
    }

    /**
     * 
     * update
     * 
     * Update data from table 'barang'
     * 
     * @param int    $id Data's ID
     * @param array  $data Associative Array contains fieldname and new data
     * 
     */
    public function update($id, $data)
    {
        return $this->db->where('kode_barang', $id)
                        ->update('barang', $data);
    }

    /**
     * 
     * delete
     * 
     * Delete data from table 'barang'
     * 
     * @param array  $where Associative Array contains fieldname and Data's ID
     * 
     */
    public function delete($where)
    {
        return $this->db->delete('barang', $where);
    }

}