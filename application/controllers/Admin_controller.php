<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('barang_model');
        $this->load->helper(['form', 'url']);
        $this->load->library('session');
        if ( !isset($this->session->isLoggedIn) && $this->session->isLoggedIn == FALSE) {
            $this->session->set_flashdata('promptLogin', 'You have to login using your account to gain access to our app');
            redirect('login');
        }
    }

    public function index()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/dashboard');
        $this->load->view('admin/template/footer');
    }

    /**
     * adminPage
     * 
     * Load admin page dynamically depends on what user want 
     * @param string $page The page user requested, taken from URL.
     * 
     */
    public function adminPage($page)
    {
        switch ($page) {
            case 'barang':
                $data["barang"]    = $this->barang_model->getAll();
                $data["kode_baru"] = $this->barang_model->getKodeBaru();
            break;

            case 'dashboard';
                $data["jumlah_barang"] = $this->barang_model->getJumlahBarang();
            break;
            
            default:
                
            break;
        }


		if( !file_exists(APPPATH."views/admin/".$page.'.php') ) {
	        show_404();
		} else {
            $this->load->view('admin/template/header');
            $this->load->view('admin/'.$page, $data);
            $this->load->view('admin/template/footer');
        }
    }

}