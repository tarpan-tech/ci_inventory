<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_masuk_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }    

    public function getAll()
    {
        return $this->db->get('masuk_barang')->result();
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
        $kode_baru = $this->db->select_max('id_masuk_barang', 'kode_baru')->get('masuk_barang');
        $result = $kode_baru->row();
        if ($kode_baru->num_rows() > 0) {
            return $result->kode_baru+1;
        } else {
            return 1;
        }
    }

    /**
     * 
     * getJumlah
     * 
     * 
     * Get total rows in table masuk_masuk_barang
     * 
     */
    public function getJumlah()
    {
        return $this->db->get('masuk_barang')->num_rows();
    }

    /**
     * getJumlahMasuk
     * 
     * 
     * Sum total jumlah masuk by kode barang
     *
     * @param int $kode
     * @return void
     */
    public function getJumlahMasuk($kode)
    {
        return $this->db->select_sum('jumlah_masuk', 'total_masuk')
                        ->where('kode_barang', $kode)
                        ->get('masuk_barang')
                        ->row();
    }


    /**
     * 
     * add
     * 
     * Insert data into table 'masuk_barang'
     * 
     * @param array $data Associative Array contains fieldname and data
     * 
     */
    public function add($data)
    {
        return $this->db->insert('masuk_barang', $data, TRUE);
    }

    /**
     * 
     * update
     * 
     * Update data from table 'masuk_barang'
     * 
     * @param int    $id Data's ID
     * @param array  $data Associative Array contains fieldname and new data
     * 
     */
    public function update($id, $data)
    {
        return $this->db->where('id_masuk_barang', $id)
                        ->update('masuk_barang', $data);
    }

    /**
     * 
     * delete
     * 
     * Delete data from table 'masuk_barang'
     * 
     * @param array  $where Associative Array contains fieldname and Data's ID
     * 
     */
    public function delete($where)
    {
        return $this->db->delete('masuk_barang', $where);
    }

}

/* End of file Barang_masuk_model.php */
