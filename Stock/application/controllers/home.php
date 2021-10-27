<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
		$this->load->model('registerModel');
	}

	
	public function index()
	{

		$data = array(); 
		$data['header_src'] = $this->load->view('inc/header_src', '', true);
		$data['footer_src'] = $this->load->view('inc/footer_src', '', true);
		$data['header'] = $this->load->view('inc/header', '', true);
		$data['sidebar'] = $this->load->view('inc/sidebar', '', true);
		$data['content'] = $this->load->view('inc/content', '', true);
		
		$this->load->view('homePage', $data);
	}

	public function register(){
		$data = array();
		$data['header_src'] = $this->load->view('inc/header_src', '', true);
		$data['footer_src'] = $this->load->view('inc/footer_src', '', true);
		
		$this->load->view('Componants/ragistation', $data);

	}

	public function loginRequest(){
		if($this->input->is_ajax_request()){
			
				$ajax_data = [];
				$ajax_data['username'] = $this->input->post('username');
				$ajax_data['password'] = $this->input->post('password');
				if($this->registerModel->login_request($ajax_data)){
					$data = array('responce'=>'success', 'message'=>"Login Successfull");
				}else{
					$data = array('responce'=>'error', 'message'=>"Login Failed");
				}
				
				
			
			
		}else{
			echo "No direct script access allowed";
		}
		echo json_encode($data);
	}

	public function register_request(){
		if($this->input->is_ajax_request()){
			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run()==FALSE){
				$data = array('responce'=>'error', 'message'=> validation_errors());
			}else{
				$ajax_data = $this->input->post();
				if($this->registerModel->register_request($ajax_data)){
					
					$data = array('responce'=>'success', 'message'=> "Register Successfull");
				}else{
					$data = array('responce'=>'error', 'message'=> "Register Failed");
				}
			}

			
		}else{
			echo "No direct script access allowed";
		}
		echo json_encode($data);
		
	}
}
