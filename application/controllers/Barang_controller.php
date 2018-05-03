<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
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
        $data["barang"]    = $this->barang_model->getAll();
        $data["kode_baru"] = $this->barang_model->getKodeBaru();

        $this->load->view('admin/template/header');
        $this->load->view('admin/barang', $data);
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
        $insert = $this->barang_model->addBarang([
            "kode_barang"   => $this->input->post('kode_barang', TRUE),
            "nama_barang"   => $this->input->post('nama_barang', TRUE),
            "spesifikasi"   => $this->input->post('spesifikasi', TRUE),
            "lokasi_barang" => $this->input->post('lokasi_barang', TRUE),
            "kategori"      => $this->input->post('kategori', TRUE),
            "jml_barang"    => $this->input->post('jumlah_barang', TRUE),
            "kondisi"       => $this->input->post('kondisi', TRUE),
            "sumber_dana"   => $this->input->post('sumber_dana', TRUE)
        ]);
        if ($insert) {
            $this->session->set_flashdata('success', 'Successfully added data barang!');
            redirect('/admin/barang');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed adding data barang..<br>{$this->db->error()}");
            redirect('/admin/barang');
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
        $update = $this->barang_model->updateBarang($table, $id, [
            "kode_barang"   => $this->input->post('kode_barang', TRUE),
            "nama_barang"   => $this->input->post('nama_barang', TRUE),
            "spesifikasi"   => $this->input->post('spesifikasi', TRUE),
            "lokasi_barang" => $this->input->post('lokasi_barang', TRUE),
            "kategori"      => $this->input->post('kategori', TRUE),
            "jml_barang"    => $this->input->post('jumlah_barang', TRUE),
            "kondisi"       => $this->input->post('kondisi', TRUE),
            "sumber_dana"   => $this->input->post('sumber_dana', TRUE)
        ]);
        if ($update){
            $this->session->set_flashdata('success', 'Successfully updated data barang!');
            redirect('/admin/barang');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed updating data barang..<br>{$this->db->error()}");
            redirect('/admin/barang');
        }
    }

    //Delete one item
    public function delete($id = NULL )
    {
        $delete = $this->barang_model->deleteBarang(['kode_barang' => $id]);
        if ($delete){
            $this->session->set_flashdata('success', 'Successfully deleted data barang!');
            redirect('/admin/barang');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed deleting data barang..<br>{$this->db->error()}");
            redirect('/admin/barang');
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
                $data["barang"] = $this->barang_model->getAll();
                $now  = new DateTime();
                $date = $now->format('Y-m-d_H:i:s');
                $this->pdf->setPaper('A4', 'portrait');
                $this->pdf->filename = "report-barang-{$date}.pdf";
                $data["title"] = $this->pdf->filename;
                $this->pdf->renderPdf('admin/report/report_barang', $data);
            break;

            default:
                # code...
            break;
        } 
    }

}