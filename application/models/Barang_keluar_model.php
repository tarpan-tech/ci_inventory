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
     * getJumlah
     * 
     * 
     * Get total rows in table keluar_barang
     * 
     */
    public function getJumlah()
    {
        return $this->db->get('keluar_barang')->num_rows();
    }

    /**
     * getJumlahKeluar
     * 
     * 
     * Sum total jumlah keluar by kode barang
     *
     * @param int $kode
     * @return void
     */
    public function getJumlahKeluar($kode)
    {
        return $this->db->select_sum('jumlah_barang_keluar', 'total_keluar')
                        ->from('keluar_barang')
                        ->join('pinjam_barang', 'keluar_barang.no_pinjam = pinjam_barang.no_pinjam')
                        ->where('kode_barang', $kode)
                        ->get()
                        ->row();
    }

    /**
     * 
     * add
     * 
     * Insert data into table 'keluar_barang'
     * 
     * @param array $data Associative Array contains fieldname and data
     * 
     */
    public function add($data)
    {
        return $this->db->insert('keluar_barang', $data, TRUE);
    }

    /**
     * 
     * update
     * 
     * Update data from table 'keluar_barang'
     * 
     * @param int    $id Data's ID
     * @param array  $data Associative Array contains fieldname and new data
     * 
     */
    public function update($id, $data)
    {
        return $this->db->where('id_keluar_barang', $id)
                        ->update('keluar_barang', $data);
    }

    /**
     * 
     * delete
     * 
     * Delete data from table 'keluar_barang'
     * 
     * @param array  $where Associative Array contains fieldname and Data's ID
     * 
     */
    public function delete($where)
    {
        return $this->db->delete('keluar_barang', $where);
    }

}

/* End of file Barang_keluar_model.php */
