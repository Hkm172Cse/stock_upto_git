<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BrandController extends CI_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
		$this->load->model('BrandModel');
	}

	
	public function brandIndex()
	{

		$data = array(); 
		$data['header_src'] = $this->load->view('inc/header_src', '', true);
		$data['footer_src'] = $this->load->view('inc/footer_src','', true);
		$data['header'] = $this->load->view('inc/header', '', true);
		$data['sidebar'] = $this->load->view('inc/sidebar', '', true);
		//$data['content'] = $this->load->view('inc/content', '', true);
		
		$this->load->view('Componants/brand_info', $data);
        
	}

	
	public function brand_insert(){
		if($this->input->is_ajax_request()){
			$this->form_validation->set_rules('name', 'Name', 'required');
			

			if ($this->form_validation->run() == FALSE)
                {
                        $data = array('responce'=>'error', 'message' => validation_errors());
                }
                else
                {
					$ajax_data = $this->input->post('name');
					if($this->BrandModel->insert_entry($ajax_data)){
						$data = array('responce'=>'success', 'message' => "Insert is Successfull");
					}else{
						$data = array('responce'=>'error', 'message' => "Insert NOT Successfull");
					}
					
                }
		}else{
			
		}
		echo json_encode($data);
	}

	public function fetchBrand(){
		
		if($this->input->is_ajax_request()){
			$data = $this->BrandModel->BrandSelectMethod();
			echo json_encode($data);
		}
	}
}
