<?php
defined('BASEPATH') or exit('No direct script access allowed!');

class User_model extends CI_Model {

    private $table = 'user';

    public function __construct()
    {
        $this->load->database();
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
     *   addUser
     *
     *   Add a new user data
     *   @param array $data Associative array contains user's data
     */
    public function addUser($data)
    {
        return $this->db->insert('user', $data);        
    }

}