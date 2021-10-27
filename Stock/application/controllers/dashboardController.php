<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboardController extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
		$this->load->model('saleModel');
	}
	
	public function index()
	{

		$data = array(); 
		$data['header_src'] = $this->load->view('inc/header_src', '', true);
		$data['footer_src'] = $this->load->view('inc/footer_src','', true);
		$data['header'] = $this->load->view('inc/header', '', true);
		$data['sidebar'] = $this->load->view('inc/sidebar', '', true);
		$data['brnads'] = $this->saleModel->select_brand();
		$data['content'] = $this->load->view('inc/content', '', true);
		
		$this->load->view('dashbourd', $data);

        
	}
}
