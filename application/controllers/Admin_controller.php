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
    
    /**
     * 
     * add
     * 
     * Insert data into database
     * @param string $table Tablename
     * 
     */
    public function add($table)
    {
        switch ($table) {
            case 'barang':
                $insert = $this->barang_model->addBarang([
                    "kode_barang"   => $this->input->post('kode_barang', TRUE),
                    "nama_barang"   => $this->input->post('nama_barang', TRUE),
                    "spesifikasi"   => $this->input->post('spesifikasi', TRUE),
                    "lokasi_barang" => $this->input->post('lokasi_barang', TRUE),
                    "kategori"      => $this->input->post('kategori', TRUE),
                    "jml_barang"    => $this->input->post('jumlah_barang', TRUE),
                    "kondisi"       => $this->input->post('kondisi', TRUE),
                    "jenis_barang"  => $this->input->post('jenis_barang', TRUE),
                    "sumber_dana"   => $this->input->post('sumber_dana', TRUE)
                ]);
                if ($insert){
                    $this->session->set_flashdata('success', 'Successfully added data barang!');
                    redirect('/admin/barang');
                } else {
                    $this->session->set_flashdata('failed', "Something went wrong, failed adding data barang..<br>{$this->db->error()}");
                    redirect('/admin/barang');
                }
                break;
            
            default:
                # code...
                break;
        }

    }

    /**
     * 
     * update
     * 
     * Update data
     * @param string $table Tablename
     * @param int $id Data's ID based on column with PK Attribute
     * 
     */
    public function update($table, $id = NULL)
    {
        switch ($table) {
            case 'barang':
                $update = $this->barang_model->updateBarang($table, $id, [
                    "kode_barang"   => $this->input->post('kode_barang', TRUE),
                    "nama_barang"   => $this->input->post('nama_barang', TRUE),
                    "spesifikasi"   => $this->input->post('spesifikasi', TRUE),
                    "lokasi_barang" => $this->input->post('lokasi_barang', TRUE),
                    "kategori"      => $this->input->post('kategori', TRUE),
                    "jml_barang"    => $this->input->post('jumlah_barang', TRUE),
                    "kondisi"       => $this->input->post('kondisi', TRUE),
                    "jenis_barang"  => $this->input->post('jenis_barang', TRUE),
                    "sumber_dana"   => $this->input->post('sumber_dana', TRUE)
                ]);
                if ($update){
                    $this->session->set_flashdata('success', 'Successfully updated data barang!');
                    redirect('/admin/barang');
                } else {
                    $this->session->set_flashdata('failed', "Something went wrong, failed updating data barang..<br>{$this->db->error()}");
                    redirect('/admin/barang');
                }
                break;
            
            default:
                # code...
                break;
        }


    }

    //Delete one item
    public function delete($table, $id = NULL )
    {
        switch ($table) {
            case 'barang':
                $delete = $this->barang_model->deleteBarang($table, ['kode_barang' => $id]);
                if ($delete){
                    $this->session->set_flashdata('success', 'Successfully deleted data barang!');
                    redirect('/admin/barang');
                } else {
                    $this->session->set_flashdata('failed', "Something went wrong, failed deleting data barang..<br>{$this->db->error()}");
                    redirect('/admin/barang');
                }
                break;
            
            default:
                # code...
                break;
        }
    }

}