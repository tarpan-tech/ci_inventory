<?php
defined('BASEPATH') OR exit('No direct script access allowed!');

use Dompdf\Dompdf;
class Pdf extends Dompdf{

    public $filename;

    public function construct()
    {
        parent::__construct();
        $this->filename = "report.pdf";
    }

    /**
     * 
     * CI
     * 
     * Get CI Super Object
     * 
     */
    protected function CI()
    {
        return get_instance();
    }

    /**
     * renderPdf
     * 
     * Render PDF File
     * 
     * @param string $view View filename
     * @param array  $data Associative Array contains data
     * 
     */
    public function renderPdf($view, $data)
    {
        //Load view file
        $html = $this->CI()->load->view($view, $data, TRUE);
        //Render HTML by DOMPdf
        $this->load_html($html);
        //Generate Output
        $this->render();
        //Stream PDF File directly to the browser
        $this->stream($this->filename, ['Attachment' => FALSE]);
    }
    
}