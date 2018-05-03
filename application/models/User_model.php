<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class User_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function getAll()
    {
        return $this->db->get('user')->result();
    }


    /** 
     *   getUserByUsername
     *
     *   Get user data by username
     *   @param string $username User's username
     */
    public function getUserByUsername($username)
    {
        return $this->db->get_where('user', [
            'username' => $username
        ]);        
    }

    /**
     * 
     * getJumlahUser
     * 
     * 
     * Get total rows in table user
     * 
     */
    public function getJumlahUser()
    {
        return $this->db->get('user')->num_rows();
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
        $kode_baru = $this->db->select_max('id_user', 'kode_baru')->get('user');
        $result = $kode_baru->row();
        if ($kode_baru->num_rows() > 0) {
            return $result->kode_baru+1;
        } else {
            return 1;
        }
    }

    /**
     *   addUser
     *
     *   Add a new user data
     *   @param array $data Associative array contains user's data
     */
    public function addUser($data)
    {
        return $this->db->insert('user', $data, TRUE);        
    }

    /**
     * 
     * updateUser
     * 
     * Update data from table 'user'
     * 
     * @param int    $id Data's ID
     * @param array  $data Associative Array contains fieldname and new data
     * 
     */
    public function updateUser($id, $data)
    {
        return $this->db->where('id_user', $id)
                        ->update('user', $data);
    }

    /**
     * 
     * deleteUser
     * 
     * Delete data from table 'user'
     * 
     * @param array  $where Associative Array contains fieldname and Data's ID
     * 
     */
    public function deleteUser($where)
    {
        return $this->db->delete('user', $where);
    }

}