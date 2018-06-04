<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('stok_model');
        $this->load->model('barang_model');
        $this->load->helper(['form', 'url']);
        $this->load->library(['form_validation', 'session', 'pdf', 'auth', 'excel']);
        //Check user's authentication
        $this->auth->isLoggedIn();
    }

    /**
     * 
     * index
     * 
     * 
     */
    public function index()
    {
        $data["stok"]        = $this->stok_model->getAll();
        $data["kode_baru"]   = $this->stok_model->getKodeBaru();
        $data["kode_barang"] = $this->barang_model->getKodeBarang();

        $this->load->view('admin/template/header');
        $this->load->view('admin/stok', $data);
        $this->load->view('admin/template/footer');
    }

    /**
     * 
     * add
     * 
     * Insert data into database
     * @param string $table Tablename
     * 
     */
    public function add()
    {
        $insert = $this->stok_model->addStok([
            "kode_stok"            => $this->input->post('kode_stok', TRUE),
            "kode_barang"          => $this->input->post('kode_barang', TRUE),
            "jumlah_barang_masuk"  => $this->input->post('jumlah_barang_masuk', TRUE),
            "jumlah_barang_keluar" => $this->input->post('jumlah_barang_keluar', TRUE),
            "total_barang"         => $this->input->post('total_barang', TRUE),
            "keterangan"           => $this->input->post('keterangan', TRUE)
        ]);
        if ($insert) {
            $this->session->set_flashdata('success', 'Successfully added data stok!');
            redirect('/admin/stok');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed adding data stok..<br>{$this->db->error()}");
            redirect('/admin/stok');
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
    public function update($id = NULL)
    {
        $update = $this->stok_model->updateStok($id, [
            "kode_stok"            => $this->input->post('kode_stok', TRUE),
            "kode_barang"          => $this->input->post('kode_barang', TRUE),
            "jumlah_barang_masuk"  => $this->input->post('jumlah_barang_masuk', TRUE),
            "jumlah_barang_keluar" => $this->input->post('jumlah_barang_keluar', TRUE),
            "total_barang"         => $this->input->post('total_barang', TRUE),
            "keterangan"           => $this->input->post('keterangan', TRUE)
        ]);
        if ($update){
            $this->session->set_flashdata('success', 'Successfully updated data stok!');
            redirect('/admin/stok');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed updating data stok..<br>{$this->db->error()}");
            redirect('/admin/stok');
        }
    }

    //Delete one item
    public function delete($id = NULL )
    {
        $delete = $this->stok_model->deleteStok(['kode_stok' => $id]);
        if ($delete){
            $this->session->set_flashdata('success', 'Successfully deleted data stok!');
            redirect('/admin/stok');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed deleting data stok..<br>{$this->db->error()}");
            redirect('/admin/stok');
        }
    }

    /**
     * 
     * report
     * 
     * Generate report
     * 
     * @param string $reportType Type of report such as PDF, Excel, CSV (in lowercase) 
     * 
     */
    public function report($reportType)
    {
        switch ($reportType) {
            case 'pdf':
                $data["stok"] = $this->stok_model->getAll();
                $now  = new DateTime();
                $date = $now->format('Y-m-d_H:i:s');
                $this->pdf->setPaper('A4', 'portrait');
                $this->pdf->filename = "report-stok-{$date}.pdf";
                $data["title"] = $this->pdf->filename;
                $this->pdf->renderPdf('admin/report/report_stok', $data);
            break;

            default:
                # code...
            break;
        } 
    }

}