<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class discountController extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
		$this->load->model('discountModel');
	}

	
	public function index(){
		
		$data = array(); 
		$data['header_src'] = $this->load->view('inc/header_src', '', true);
		$data['footer_src'] = $this->load->view('inc/footer_src','', true);
		$data['header'] = $this->load->view('inc/header', '', true);
		$data['sidebar'] = $this->load->view('inc/sidebar', '', true);
		//$data['content'] = $this->load->view('inc/content', '', true);
		
		$this->load->view('Componants/discount_info', $data);
	}

    
	public function selectAllDiscount(){
		if($this->input->is_ajax_request()){
			$data = $this->discountModel->get_entries();
		    echo json_encode($data);
		}
	}

	public function todayDiscount(){
		if($this->input->is_ajax_request()){
			$text = $this->input->post('created');
			$data = $this->discountModel->selectTodayDiscount($text);
		echo json_encode($data);
		}
	}

	public function customerDiscountMethod(){
		if($this->input->is_ajax_request()){
			$text = $this->input->post('customarName');
			$data = $this->discountModel->selectCustomarName($text);
		echo json_encode($data);
		}
	}

	public function selectSingleRow(){
		if($this->input->is_ajax_request()){
			$editId = $this->input->post('id');
			if($post = $this->dueModel->single_entry($editId)){
				$data = array('responce'=>'succsess', 'post' => $post);
			}else{
				$data = array('responce'=>'error', 'message'=>'Failed');
			}
		}

		echo json_encode($data);
	}

	public function updateDueMethod(){
		if($this->input->is_ajax_request()){

			$this->form_validation->set_rules('id', 'Id', 'required');
			$this->form_validation->set_rules('due', 'Due', 'required');

			if($this->form_validation->run()== FALSE){
				$data = array('responce'=>'error', 'message'=>validation_errors());
			}else{
				$data['id'] = $this->input->post('id');
				$data['due'] = $this->input->post('due');
				
				if($this->dueModel->update_single_entry($data)){
					$data = array('responce'=>'success', 'message'=>'Payment');
				}else{
					$data = array('responce'=>'error', 'message'=>'Update is Fail');
				}
			
			}
		}
		echo json_encode($data);
	}

	
}
