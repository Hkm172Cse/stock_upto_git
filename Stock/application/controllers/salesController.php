<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class salesController extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
		$this->load->model('saleModel');
	}

	
	public function index(){
		$data = array(); 
		$data['header_src'] = $this->load->view('inc/header_src', '', true);
		$data['footer_src'] = $this->load->view('inc/footer_src','', true);
		$data['header'] = $this->load->view('inc/header', '', true);
		$data['sidebar'] = $this->load->view('inc/sidebar', '', true);
		$data['brnads'] = $this->saleModel->select_brand();
		$data['session_id2']= $this->session->userdata('customer_id');
		$this->load->view('Componants/sale_info', $data);
	}

    public function saleDetails(){
		$data = array(); 
		$data['header_src'] = $this->load->view('inc/header_src', '', true);
		$data['footer_src'] = $this->load->view('inc/footer_src','', true);
		$data['header'] = $this->load->view('inc/header', '', true);
		$data['sidebar'] = $this->load->view('inc/sidebar', '', true);
		//$data['content'] = $this->load->view('inc/content', '', true);
		
		$this->load->view('Componants/saleDetails', $data);
	}

	public function invoice(){
		$id = $this->session->userdata('customer_id');
		$data['discount'] = $this->saleModel->select_discount($id);
		$data['selectRecored'] = $this->saleModel->select_for_invoice($id);
		$this->load->view('Componants/invoice',$data);
	}

	public function customer_view(){
		$data = array(); 
		$data['header_src'] = $this->load->view('inc/header_src', '', true);
		$data['footer_src'] = $this->load->view('inc/footer_src','', true);
		$data['header'] = $this->load->view('inc/header', '', true);
		$data['sidebar'] = $this->load->view('inc/sidebar', '', true);
		$customerId = $this->session->userdata('customer_id');
		$data['customertabledata'] = $this->saleModel->select_discount($customerId);
		$data['session_id2']= $this->session->userdata('customer_id');
		$data['selectData'] = $this->saleModel->discountSelectData($customerId);
		$this->load->view('Componants/customer_view', $data);
	}

	public function insert_sale(){
		if($this->input->is_ajax_request()){
			
			$this->form_validation->set_rules('sale_price', 'SalePrice', 'required');

			if ($this->form_validation->run() == FALSE)
                {
                        $data = array('responce'=>'error', 'message' => validation_errors());
                }
                else
                {
					$ajax_data = $this->input->post();
					if($this->saleModel->insert_entry($ajax_data)){
						$data = array('responce'=>'success', 'message' => "Insert is Successfull");
					}else{
						$data = array('responce'=>'error', 'message' => "Insert NOT Successfull");
					}
					
                }
		}else{
			
		}
		echo json_encode($data);
	}
	
	public function discount_data_save(){
		if($this->input->is_ajax_request()){
			
			$this->form_validation->set_rules('customer_id', 'Customer_id', 'required');

			if ($this->form_validation->run() == FALSE)
                {
                        $data = array('responce'=>'error', 'message' => validation_errors());
                }
                else
                {
					
					$ajax_data['customer_id'] = $this->input->post('customer_id');
					$ajax_data['products'] = $this->input->post('products');
					$ajax_data['total_amount'] = $this->input->post('total_amount');
					$ajax_data['total_amount'] = $this->input->post('total_amount');
					$ajax_data['discount'] = $this->input->post('discount');
					$ajax_data['payment'] = $this->input->post('payment');
					$ajax_data['due'] = $this->input->post('due');
					if($this->saleModel->update_discount($ajax_data)){
						$data = array('responce'=>'success', 'message' => "Update is Successfull");
						
					}else{
						$data = array('responce'=>'error', 'message' => "Update NOT Successfull");
					}
					
                }
		}else{
			
		}
		echo json_encode($data);
	}

	public function todaySale(){
		if($this->input->is_ajax_request()){
			$text = $this->input->post('created');
			$data = $this->saleModel->selectTodaySale($text);
		echo json_encode($data);
		}
	}

	public function discount_select_data(){
		if($this->input->is_ajax_request()){
			$customerId = $this->input->post('customer_id');
			$data = $this->saleModel->discountSelectData($customerId);
		echo json_encode($data);
		}
	}

	public function customarSuggetion(){
		if($this->input->is_ajax_request()){
			$text = $this->input->post('customarName');
			$data = $this->saleModel->selectCustomarName($text);
		echo json_encode($data);
		}
	}

	public function updateSale(){
		if($this->input->is_ajax_request()){
			$id = $this->input->post('id');
			$data = $this->saleModel->select_for_update($id);
			echo json_encode($data);
		}
	}

	public function updateSale_request(){
		if($this->input->is_ajax_request()){
			
			$this->form_validation->set_rules('id', 'SalePrice', 'required');
			$this->form_validation->set_rules('product_name', 'Product_name', 'required');
			$this->form_validation->set_rules('sale_price', 'SalePrice', 'required');
			$this->form_validation->set_rules('due', 'Due', 'required');

			if ($this->form_validation->run() == FALSE)
                {
                        $data = array('responce'=>'error', 'message' => validation_errors());
                }
                else
                {
					$ajax_data['id'] = $this->input->post('id');
					$ajax_data['product_name'] = $this->input->post('product_name');
					$ajax_data['sale_price'] = $this->input->post('sale_price');
					$ajax_data['due'] = $this->input->post('due');
					if($this->saleModel->update_single_entry($ajax_data)){
						$data = array('responce'=>'success', 'message' => "Insert is Successfull");
					}else{
						$data = array('responce'=>'error', 'message' => "Insert NOT Successfull");
					}
					
                }
		}else{
			
		}
		echo json_encode($data);
	}

	
}
