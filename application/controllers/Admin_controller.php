<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('barang_model');
        $this->load->model('barang_masuk_model');
        $this->load->model('barang_keluar_model');
        $this->load->model('pinjam_barang_model');
        $this->load->model('supplier_model');
        $this->load->model('stok_model');
        $this->load->model('user_model');
        $this->load->helper(['form', 'url']);
        $this->load->library(['session', 'pdf', 'auth', 'excel']);
        //Check user's authentication
        $this->auth->isLoggedIn();
    }

    public function index()
    {
        $data["jumlah_barang"]        = $this->barang_model->getJumlah();
        $data["jumlah_barang_masuk"]  = $this->barang_masuk_model->getJumlah(); 
        $data["jumlah_barang_keluar"] = $this->barang_keluar_model->getJumlah();
        $data["jumlah_pinjam_barang"] = $this->pinjam_barang_model->getJumlah();
        $data["jumlah_supplier"]      = $this->supplier_model->getJumlah();
        $data["jumlah_stok"]          = $this->stok_model->getJumlah();
        $data["jumlah_user"]          = $this->user_model->getJumlah();

        $this->load->view('admin/template/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/template/footer');
    }

}