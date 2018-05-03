<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper(['form', 'url']);
        $this->load->library(['form_validation', 'session', 'pdf', 'auth', 'excel']);
        //Check user's authentication
        $this->auth->isLoggedIn();
    }

    public function index()
    {
        $data['user']      = $this->user_model->getAll();
        $data['kode_baru'] = $this->user_model->getKodeBaru();

        $this->load->view('admin/template/header');
        $this->load->view('admin/user', $data);
        $this->load->view('admin/template/footer');
    }

    /**
     * 
     * add
     * 
     * Insert user data into database
     * 
     */
    public function add()
    {
        $insert = $this->user_model->addUser([
            "id_user"  => $this->input->post('id_user', TRUE),
            "nama"     => $this->input->post('nama', TRUE),
            "username" => $this->input->post('username', TRUE),
            "password" => password_hash($this->input->post('password', TRUE), PASSWORD_BCRYPT),
            "level"    => $this->input->post('level', TRUE)
        ]);
        if ($insert) {
            $this->session->set_flashdata('success', 'Successfully added data user!');
            redirect('/admin/user');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed adding data user..<br>{$this->db->error()}");
            redirect('/admin/user');
        }
    }

    /**
     * 
     * update
     * 
     * Update user data
     * @param int $id Data's ID based on column with Primary Key
     * 
     */
    public function update($id = NULL)
    {
        $update = $this->user_model->updateUser($id, [
            "id_user"  => $this->input->post('id_user', TRUE),
            "nama"     => $this->input->post('nama', TRUE),
            "username" => $this->input->post('username', TRUE),
            "level"    => $this->input->post('level', TRUE)
        ]);
        if ($update){
            $this->session->set_flashdata('success', 'Successfully updated data user!');
            redirect('/admin/user');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed updating data user..<br>{$this->db->error()}");
            redirect('/admin/user');
        }
    }

    //Delete one item
    public function delete($id = NULL )
    {
        $delete = $this->user_model->deleteUser(['id_user' => $id]);
        if ($delete){
            $this->session->set_flashdata('success', 'Successfully deleted data user!');
            redirect('/admin/user');
        } else {
            $this->session->set_flashdata('failed', "Something went wrong, failed deleting data user..<br>{$this->db->error()}");
            redirect('/admin/user');
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
                $data["user"] = $this->user_model->getAll();
                $now  = new DateTime();
                $date = $now->format('Y-m-d_H:i:s');
                $this->pdf->setPaper('A4', 'portrait');
                $this->pdf->filename = "report-user-{$date}.pdf";
                $data["title"] = $this->pdf->filename;
                $this->pdf->renderPdf('admin/report/report_user', $data);
            break;

            default:
                # code...
            break;
        } 
    }

}

/* End of file User_controller.php */
