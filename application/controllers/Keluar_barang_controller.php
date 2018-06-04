<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keluar_barang_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('barang_keluar_model');
        $this->load->model('pinjam_barang_model');
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
        $data["keluar_barang"] = $this->barang_keluar_model->getAll();
        $data["kode_baru"]     = $this->barang_keluar_model->getKodeBaru();
        $data["no_pinjam"]     = $this->pinjam_barang_model->getNoPinjam();

        $this->load->view('admin/template/header');
        $this->load->view('admin/keluar_barang', $data);
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
        $insert = $this->barang_keluar_model->addBarangKeluar([
            "id_keluar_barang"    => $this->input->post('id_keluar_barang', TRUE),
            "no_pinjam"           => $this->input->post('no_pinjam', TRUE),
            "tanggal_keluar"      => $this->input->post('tanggal_keluar', TRUE),
            "penerima"            => $this->input->post('penerima', TRUE),
            "jumlah_barang_keluar" => $this->input->post('jumlah_barang_keluar', TRUE),
            "keperluan"           => $this->input->post('keperluan', TRUE)
        ]);
        if ($insert) {
            $this->session->set_flashdata('success', 'Successfully added data keluar_barang!');
            redirect('/admin/keluar_barang');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed adding data keluar_barang..<br>{$this->db->error()}");
            redirect('/admin/keluar_barang');
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
        $update = $this->barang_keluar_model->updateBarangKeluar($id, [
            "id_keluar_barang"    => $this->input->post('id_keluar_barang', TRUE),
            "no_pinjam"           => $this->input->post('no_pinjam', TRUE),
            "tanggal_keluar"      => $this->input->post('tanggal_keluar', TRUE),
            "penerima"            => $this->input->post('penerima', TRUE),
            "jumlah_barang_keluar"=> $this->input->post('jumlah_barang_keluar', TRUE),
            "keperluan"           => $this->input->post('keperluan', TRUE)
        ]);
        if ($update){
            $this->session->set_flashdata('success', 'Successfully updated data keluar_barang!');
            redirect('/admin/keluar_barang');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed updating data keluar_barang..<br>{$this->db->error()}");
            redirect('/admin/keluar_barang');
        }
    }

    //Delete one item
    public function delete($id = NULL )
    {
        $delete = $this->barang_keluar_model->deleteBarangKeluar(['id_keluar_barang' => $id]);
        if ($delete){
            $this->session->set_flashdata('success', 'Successfully deleted data keluar_barang!');
            redirect('/admin/keluar_barang');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed deleting data keluar_barang..<br>{$this->db->error()}");
            redirect('/admin/keluar_barang');
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
                $data["keluar_barang"] = $this->barang_keluar_model->getAll();
                $now  = new DateTime();
                $date = $now->format('Y-m-d_H:i:s');
                $this->pdf->setPaper('A4', 'portrait');
                $this->pdf->filename = "report-keluar_barang-{$date}.pdf";
                $data["title"] = $this->pdf->filename;
                $this->pdf->renderPdf('admin/report/report_keluar_barang', $data);
            break;

            default:
                # code...
            break;
        } 
    }

}