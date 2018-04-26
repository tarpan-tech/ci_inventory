<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {

    public function __construct()
    {
        $this->CI()->load->model('user_model');
        $this->CI()->load->library('session');
        $this->CI()->load->helper('url');
    }

    protected function CI()
    {
        return get_instance();
    }

    /**
     * 
     * isLoggedIn
     * 
     * Check if user(s) is authenticated
     * 
     */
    public function isLoggedIn()
    {
        if ( !isset($this->CI()->session->isLoggedIn) && $this->CI()->session->isLoggedIn == FALSE){
            $this->CI()->session->set_flashdata('promptLogin', 'You have to login using your account to gain access to our app');
            redirect('login');
        }
    }

    /**
     * 
     * register
     * 
     * @param array $data User's data
     * 
     */
    public function register($data)
    {
        $data["password"] = password_hash($data["password"], PASSWORD_BCRYPT);
        return $this->CI()->user_model->addUser($data);
    }

    /**
     * 
     * login
     * 
     * @param string $username User's username
     * @param string $password User's password
     * 
     */
    public function login($username, $password)
    {
        $userdata = $this->CI()->user_model->getUserByUsername($username);        
        //Check if user(s) exists
        if ( $userdata->num_rows() > 0):
            //Fetch user(s) data
            $result = $userdata->result();
                foreach($result as $user):
                    //Compare user(s) password
                    if ( password_verify($password, $user->password) ):
                        //Set user session if password match
                        $this->CI()->session->set_userdata([
                            'id_user'    => $user->id_user,
                            'nama'       => $user->nama,
                            'username'   => $user->username,
                            'level'      => $user->level,
                            'isLoggedIn' => TRUE
                        ]);
                        $this->CI()->session->set_flashdata('loggedIn', "Welcome, {$this->CI()->session->username}. You are logged in as {$this->CI()->session->level} ");
                        redirect('admin/dashboard');
                    else:
                        //If user(s) password incorrect
                        $this->CI()->session->set_flashdata('passwordIncorrect', 'The password you\'re trying to submit is incorrect');
                        redirect('login');
                    endif;
                endforeach;
        else:
            //If user(s) not found
            $this->CI()->session->set_flashdata('userNotFound', 'The username you\'re trying to submit is not exist in our system. Please check your username spelling..');
            redirect('login');
        endif;
    }

    public function logout()
    {
        $this->CI()->session->unset_userdata([
            'id_user', 'nama', 'username', 'level', 'isLoggedIn'
        ]);
        $this->CI()->session->set_flashdata('loggedOut', 'You are successfully logged out from our app!');
        redirect('login');
    }

}