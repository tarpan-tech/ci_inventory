<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
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
        $data["supplier"]    = $this->supplier_model->getAll();
        $data["kode_baru"] = $this->supplier_model->getKodeBaru();

        $this->load->view('admin/template/header');
        $this->load->view('admin/supplier', $data);
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
        $insert = $this->supplier_model->addSupplier([
            "kode_supplier"   => $this->input->post('kode_supplier', TRUE),
            "nama_supplier"   => $this->input->post('nama_supplier', TRUE),
            "alamat_supplier" => $this->input->post('alamat_supplier', TRUE),
            "telp_supplier"   => $this->input->post('telp_supplier', TRUE),
            "kota_supplier"   => $this->input->post('kota_supplier', TRUE)
        ]);
        if ($insert) {
            $this->session->set_flashdata('success', 'Successfully added data supplier!');
            redirect('/admin/supplier');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed adding data supplier..<br>{$this->db->error()}");
            redirect('/admin/supplier');
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
        $update = $this->supplier_model->updateSupplier($id, [
            "kode_supplier"   => $this->input->post('kode_supplier', TRUE),
            "nama_supplier"   => $this->input->post('nama_supplier', TRUE),
            "alamat_supplier" => $this->input->post('alamat_supplier', TRUE),
            "telp_supplier"   => $this->input->post('telp_supplier', TRUE),
            "kota_supplier"   => $this->input->post('kota_supplier', TRUE)
        ]);
        if ($update){
            $this->session->set_flashdata('success', 'Successfully updated data supplier!');
            redirect('/admin/supplier');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed updating data supplier..<br>{$this->db->error()}");
            redirect('/admin/supplier');
        }
    }

    //Delete one item
    public function delete($id = NULL )
    {
        $delete = $this->supplier_model->deleteSupplier(['kode_supplier' => $id]);
        if ($delete){
            $this->session->set_flashdata('success', 'Successfully deleted data supplier!');
            redirect('/admin/supplier');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed deleting data supplier..<br>{$this->db->error()}");
            redirect('/admin/supplier');
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
                $data["supplier"] = $this->supplier_model->getAll();
                $now  = new DateTime();
                $date = $now->format('Y-m-d_H:i:s');
                $this->pdf->setPaper('A4', 'portrait');
                $this->pdf->filename = "report-supplier-{$date}.pdf";
                $data["title"] = $this->pdf->filename;
                $this->pdf->renderPdf('admin/report/report_supplier', $data);
            break;

            default:
                # code...
            break;
        } 
    }

}