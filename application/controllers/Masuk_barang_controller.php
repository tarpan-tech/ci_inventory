<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk_barang_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('barang_masuk_model');
        $this->load->model('barang_model');
        $this->load->model('supplier_model');
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
        $data["masuk_barang"]  = $this->barang_masuk_model->getAll();
        $data["kode_baru"]     = $this->barang_masuk_model->getKodeBaru();
        $data["kode_barang"]   = $this->barang_model->getKodeBarang();
        $data["kode_supplier"] = $this->supplier_model->getKodeSupplier();

        $this->load->view('admin/template/header');
        $this->load->view('admin/masuk_barang', $data);
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
        $insert = $this->barang_masuk_model->addPinjamBarang([
            "id_masuk_barang" => $this->input->post('id_masuk_barang', TRUE),
            "kode_supplier"   => $this->input->post('kode_supplier', TRUE),
            "kode_barang"     => $this->input->post('kode_barang', TRUE),
            "tanggal_masuk"   => $this->input->post('tanggal_masuk', TRUE),
            "jumlah_masuk"    => $this->input->post('jumlah_masuk', TRUE)
        ]);
        if ($insert) {
            $this->session->set_flashdata('success', 'Successfully added data barang_masuk!');
            redirect('/admin/masuk_barang');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed adding data barang_masuk..<br>{$this->db->error()}");
            redirect('/admin/masuk_barang');
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
        $update = $this->barang_masuk_model->updatePinjamBarang($id, [
            "id_masuk_barang" => $this->input->post('id_masuk_barang', TRUE),
            "kode_supplier"   => $this->input->post('kode_supplier', TRUE),
            "kode_barang"     => $this->input->post('kode_barang', TRUE),
            "tanggal_masuk"   => $this->input->post('tanggal_masuk', TRUE),
            "jumlah_masuk"    => $this->input->post('jumlah_masuk', TRUE)
        ]);
        if ($update){
            $this->session->set_flashdata('success', 'Successfully updated data barang_masuk!');
            redirect('/admin/masuk_barang');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed updating data barang_masuk..<br>{$this->db->error()}");
            redirect('/admin/masuk_barang');
        }
    }

    //Delete one item
    public function delete($id = NULL )
    {
        $delete = $this->barang_masuk_model->deletePinjamBarang(['id_masuk_barang' => $id]);
        if ($delete){
            $this->session->set_flashdata('success', 'Successfully deleted data barang_masuk!');
            redirect('/admin/masuk_barang');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed deleting data barang_masuk..<br>{$this->db->error()}");
            redirect('/admin/masuk_barang');
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
                $data["masuk_barang"] = $this->barang_masuk_model->getAll();
                $now  = new DateTime();
                $date = $now->format('Y-m-d_H:i:s');
                $this->pdf->setPaper('A4', 'portrait');
                $this->pdf->filename = "report-masuk_barang-{$date}.pdf";
                $data["title"] = $this->pdf->filename;
                $this->pdf->renderPdf('admin/report/report_masuk_barang', $data);
            break;

            default:
                # code...
            break;
        } 
    }

}