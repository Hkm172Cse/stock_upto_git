<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class invoiceController extends CI_Controller {

	
	public function index()
	{

		$data = array(); 
		$data['header_src'] = $this->load->view('inc/header_src', '', true);
		$data['footer_src'] = $this->load->view('inc/footer_src','', true);
		$data['header'] = $this->load->view('inc/header', '', true);
		$data['sidebar'] = $this->load->view('inc/sidebar', '', true);
		//$data['content'] = $this->load->view('inc/content', '', true);
		
		$this->load->view('Componants/invoice', $data);

        
	}

    
}
