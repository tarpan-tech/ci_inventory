<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Auth_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('user_model');
        $this->load->helper(['form', 'url']);
        $this->load->library(['form_validation', 'session', 'parser']);
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
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|callback_isUnique');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');        

        if ( $this->form_validation->run() == FALSE ) {
            $this->load->view('register');
        } else {
            $nama     = $this->input->post('nama');
            $username = $this->input->post('username');
            $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            $level    = $this->input->post('level');    

            $data = [
                'nama' => $nama,
                'username' => $username,
                'password' => $password,
                'level' => $level
            ];

            if ( $this->user_model->addUser($data) ):
                $this->session->set_flashdata('registerSuccess', 'Your account successfully created in our website, please login here..');
                redirect('login');
            endif;
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

        $userdata = $this->user_model->getUserByUsername($username)->result();
        foreach($userdata as $user):
            if ( password_verify($password, $user->password) ):
                $this->session->set_userdata([
                    'id_user'    => $user->id_user,
                    'nama'       => $user->nama,
                    'username'   => $user->username,
                    'level'      => $user->level,
                    'isLoggedIn' => TRUE
                ]);
                $this->session->set_flashdata('loggedIn', "Welcome, {$this->session->username}. You are logged in as {$this->session->level} ");
                redirect('admin/dashboard');
            endif;
        endforeach;
    }

    /**
     * logout
     * 
     * Clear current session and remove user session
     * 
     */
    public function logout()
    {
        $this->session->unset_userdata([
            'id_user', 'nama', 'username', 'level', 'isLoggedIn'
        ]);
        $this->session->set_flashdata('loggedOut', 'You are successfully logged out from our app!');
        redirect('login');
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
            $this->form_validation->set_message('is_unique', 'You can\'t use this username because it\'s already exists');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}