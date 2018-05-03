<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Auth_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('user_model');
        $this->load->helper(['form', 'url']);
        $this->load->library(['form_validation', 'session', 'parser', 'auth']);
    }

    /**
     * 
     * register
     * 
     * Register a new user account
     * 
     */
    public function register()
    {
        $config = [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|callback_isUnique'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ],
            [
                'field' => 'level',
                'label' => 'Level',
                'rules' => 'required'
            ]
        ];
        $this->form_validation->set_rules($config);

        if ( $this->form_validation->run() == FALSE ) {
            $this->load->view('register');
        } else {
            $data = [
                'nama'     => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'level'    => $this->input->post('level')
            ];

            if ( $this->auth->register($data) == TRUE) {
                $this->session->set_flashdata('registerSuccess', 'Your account successfully created in our website, please login here..');
                redirect('login');
            }
        }
    }

    /**
     * 
     * login
     * 
     * Login to gain access to the app
     * 
     */
    public function login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->auth->login($username, $password);
    }

    /**
     * logout
     * 
     * Clear current session and log out user from the app
     * 
     */
    public function logout()
    {
        $this->auth->logout();
    }

    /**
    * isUnique
    * 
    * Callback validation method to check if username is already exist
    * @param string $username Username that user want to choose
    * 
    */
    public function isUnique($username)
    {
        $username = $this->user_model->getUserByUsername($username);
        if ( $username->num_rows() > 0 ) {
            $this->form_validation->set_message('isUnique', 'You can\'t use this username because it\'s already exists');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}