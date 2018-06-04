<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam_barang_model extends CI_Model {
    
    public function __construct()
    {
        $this->load->database();
    }    

    public function getAll()
    {
        return $this->db->get('pinjam_barang')->result();
    }

    /**
     * Get all no pinjam
     *
     * @return void
     */
    public function getNoPinjam()
    {
        return $this->db->select('no_pinjam')->get('pinjam_barang')->result();
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
        $kode_baru = $this->db->select_max('no_pinjam', 'kode_baru')->get('pinjam_barang');
        $result = $kode_baru->row();
        if ($kode_baru->num_rows() > 0) {
            return $result->kode_baru+1;
        } else {
            return 1;
        }
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

    /**
     * 
     * addPinjamBarang
     * 
     * Insert data into table 'pinjam_barang'
     * 
     * @param array $data Associative Array contains fieldname and data
     * 
     */
    public function addPinjamBarang($data)
    {
        return $this->db->insert('pinjam_barang', $data, TRUE);
    }

    /**
     * 
     * updatePinjamBarang
     * 
     * Update data from table 'pinjam_barang'
     * 
     * @param int    $id Data's ID
     * @param array  $data Associative Array contains fieldname and new data
     * 
     */
    public function updatePinjamBarang($id, $data)
    {
        return $this->db->where('no_pinjam', $id)
                        ->update('pinjam_barang', $data);
    }

    /**
     * 
     * deletePinjamBarang
     * 
     * Delete data from table 'pinjam_barang'
     * 
     * @param array  $where Associative Array contains fieldname and Data's ID
     * 
     */
    public function deletePinjamBarang($where)
    {
        return $this->db->delete('pinjam_barang', $where);
    }

}

/* End of file Pinjam_barang_model.php */
