<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class expenseController extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
		$this->load->model('expenseModel');
	}

	
	public function index(){
		$data = array(); 
		$data['header_src'] = $this->load->view('inc/header_src', '', true);
		$data['footer_src'] = $this->load->view('inc/footer_src','', true);
		$data['header'] = $this->load->view('inc/header', '', true);
		$data['sidebar'] = $this->load->view('inc/sidebar', '', true);
		
		$this->load->view('Componants/expense_info', $data);
	}

    public function inserExpense(){
        if($this->input->is_ajax_request()){
			$this->form_validation->set_rules('amount', 'Amount', 'required');
			$this->form_validation->set_rules('expense_for', 'Expense_for', 'required');

			if ($this->form_validation->run() == FALSE)
                {
                        $data = array('responce'=>'error', 'message' => validation_errors());
                }
                else
                {
					$ajax_data = $this->input->post();
					if($this->expenseModel->insert_entry($ajax_data)){
						$data = array('responce'=>'success', 'message' => "Insert is Successfull");
					}else{
						$data = array('responce'=>'error', 'message' => "Insert NOT Successfull");
					}
					
                }
		}else{
			
		}
		echo json_encode($data);
    }


	public function todayExpenseSelect(){
		if($this->input->is_ajax_request()){
			$text = $this->input->post('created');
			$data = $this->expenseModel->selectExpense($text);
		echo json_encode($data);
		}
	}

	public function monthlyExpenseSelect(){
		if($this->input->is_ajax_request()){
			$text = $this->input->post('created');
			$data = $this->expenseModel->selectExpense($text);
			echo json_encode($data);
		}
	}

    

	
	
}
