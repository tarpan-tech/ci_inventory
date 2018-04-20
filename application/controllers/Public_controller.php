<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['form', 'url']);
		$this->load->library(['session']);
	}

	/**
	 * 
	 * index
	 * 
	 * Render homepage
	 * 
	 */
	public function index()
	{
		$this->load->view('index');
	}

	/**
     * publicPage
     * 
     * Load public page dynamically depends on what user want 
     * @param string $page The page user requested, taken from URL.
     * 
     */
	public function publicPage($page)
	{
		if( !file_exists(APPPATH."views/".$page.'.php') ) {
	        show_404();
		} else {
      		$this->load->view($page);
        }
	}

}
