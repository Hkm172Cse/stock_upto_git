<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class saleExpenseController extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
		$this->load->model('SaleExpense_Model');
	}

	
	public function index(){
		$data = array(); 
		$data['header_src'] = $this->load->view('inc/header_src', '', true);
		$data['footer_src'] = $this->load->view('inc/footer_src','', true);
		$data['header'] = $this->load->view('inc/header', '', true);
		$data['sidebar'] = $this->load->view('inc/sidebar', '', true);
		
		$this->load->view('Componants/saleExpense_info', $data);
	}

    

	

	public function monthly_Expense_Sale_Select(){
		if($this->input->is_ajax_request()){
			$text = $this->input->post('created');
			$data['expense'] = $this->SaleExpense_Model->select_Expense($text);
			$data['sale']	 = $this->SaleExpense_Model->select_Sale($text);
			//$data['abc']	 = $this->SaleExpense_Model->select_Sale($text);
			echo json_encode($data);
		}
	}

    

	
	
}
