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
        $data["jumlah_barang"]        = $this->barang_model->getJumlahBarang();
        $data["jumlah_barang_masuk"]  = $this->barang_masuk_model->getJumlahBarangMasuk(); 
        $data["jumlah_barang_keluar"] = $this->barang_keluar_model->getJumlahBarangKeluar();
        $data["jumlah_pinjam_barang"] = $this->pinjam_barang_model->getJumlahPinjamBarang();
        $data["jumlah_supplier"]      = $this->supplier_model->getJumlahSupplier();
        $data["jumlah_stok"]          = $this->stok_model->getJumlahStok();
        $data["jumlah_user"]          = $this->user_model->getJumlahUser();

        $this->load->view('admin/template/header');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('admin/template/footer');
    }


    /**
     * adminPage
     * 
     * Load admin page dynamically as what user requested
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
                $data["jumlah_barang"]        = $this->barang_model->getJumlahBarang();
                $data["jumlah_barang_masuk"]  = $this->barang_masuk_model->getJumlahBarangMasuk(); 
                $data["jumlah_barang_keluar"] = $this->barang_keluar_model->getJumlahBarangKeluar();
                $data["jumlah_pinjam_barang"] = $this->pinjam_barang_model->getJumlahPinjamBarang();
                $data["jumlah_supplier"]      = $this->supplier_model->getJumlahSupplier();
                $data["jumlah_stok"]          = $this->stok_model->getJumlahStok();
                $data["jumlah_user"]          = $this->user_model->getJumlahUser();
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