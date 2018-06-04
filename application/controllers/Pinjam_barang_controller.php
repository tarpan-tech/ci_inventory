<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjam_barang_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pinjam_barang_model');
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
        $data["pinjam_barang"] = $this->pinjam_barang_model->getAll();
        $data["kode_baru"]     = $this->pinjam_barang_model->getKodeBaru();
        $data["kode_barang"]   = $this->barang_model->getKodeBarang();
        $data["kode_supplier"] = $this->supplier_model->getKodeSupplier();

        $this->load->view('admin/template/header');
        $this->load->view('admin/pinjam_barang', $data);
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
        $insert = $this->pinjam_barang_model->addPinjamBarang([
            "no_pinjam"       => $this->input->post('no_pinjam', TRUE),
            "kode_barang"     => $this->input->post('kode_barang', TRUE),
            "jumlah_pinjam"   => $this->input->post('jumlah_pinjam', TRUE),
            "peminjam"        => $this->input->post('peminjam', TRUE),
            "tanggal_pinjam"  => $this->input->post('tanggal_pinjam', TRUE),
            "tanggal_kembali" => $this->input->post('tanggal_kembali', TRUE),
            "keterangan"      => $this->input->post('keterangan', TRUE)
        ]);
        if ($insert) {
            $this->session->set_flashdata('success', 'Successfully added data pinjam_barang!');
            redirect('/admin/pinjam_barang');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed adding data pinjam_barang..<br>{$this->db->error()}");
            redirect('/admin/pinjam_barang');
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
        $update = $this->pinjam_barang_model->updatePinjamBarang($id, [
            "no_pinjam"       => $this->input->post('no_pinjam', TRUE),
            "kode_barang"     => $this->input->post('kode_barang', TRUE),
            "jumlah_pinjam"   => $this->input->post('jumlah_pinjam', TRUE),
            "peminjam"        => $this->input->post('peminjam', TRUE),
            "tanggal_pinjam"  => $this->input->post('tanggal_pinjam', TRUE),
            "tanggal_kembali" => $this->input->post('tanggal_kembali', TRUE),
            "keterangan"      => $this->input->post('keterangan', TRUE)
        ]);
        if ($update){
            $this->session->set_flashdata('success', 'Successfully updated data pinjam_barang!');
            redirect('/admin/pinjam_barang');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed updating data pinjam_barang..<br>{$this->db->error()}");
            redirect('/admin/pinjam_barang');
        }
    }

    //Delete one item
    public function delete($id = NULL )
    {
        $delete = $this->pinjam_barang_model->deletePinjamBarang(['no_pinjam' => $id]);
        if ($delete){
            $this->session->set_flashdata('success', 'Successfully deleted data pinjam_barang!');
            redirect('/admin/pinjam_barang');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed deleting data pinjam_barang..<br>{$this->db->error()}");
            redirect('/admin/pinjam_barang');
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
                $data["pinjam_barang"] = $this->pinjam_barang_model->getAll();
                $now  = new DateTime();
                $date = $now->format('Y-m-d_H:i:s');
                $this->pdf->setPaper('A4', 'portrait');
                $this->pdf->filename = "report-pinjam_barang-{$date}.pdf";
                $data["title"] = $this->pdf->filename;
                $this->pdf->renderPdf('admin/report/report_pinjam_barang', $data);
            break;

            default:
                # code...
            break;
        } 
    }

}