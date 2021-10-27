<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductMasterController extends CI_Controller {
	public function __construct(){
		parent::__construct();

		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
		$this->load->model('prodduct_insert_model');
	}

	
	public function index()
	{

		$data = array(); 
		$data['header_src'] = $this->load->view('inc/header_src', '', true);
		$data['footer_src'] = $this->load->view('inc/footer_src','', true);
		$data['header'] = $this->load->view('inc/header', '', true);
		$data['sidebar'] = $this->load->view('inc/sidebar', '', true);
		//$data['content'] = $this->load->view('inc/content', '', true);
		
		$this->load->view('Componants/productMuster', $data);

        
	}

	public function order(){
		
		$data = array(); 
		$data['header_src'] = $this->load->view('inc/header_src', '', true);
		$data['footer_src'] = $this->load->view('inc/footer_src','', true);
		$data['header'] = $this->load->view('inc/header', '', true);
		$data['sidebar'] = $this->load->view('inc/sidebar', '', true);
		//$data['content'] = $this->load->view('inc/content', '', true);
		
		$this->load->view('Componants/purches', $data);
	}

	public function product(){
		$data = array(); 
		$data['header_src'] = $this->load->view('inc/header_src', '', true);
		$data['footer_src'] = $this->load->view('inc/footer_src','', true);
		$data['header'] = $this->load->view('inc/header', '', true);
		$data['sidebar'] = $this->load->view('inc/sidebar', '', true);
		$data['brnads'] = $this->prodduct_insert_model->select_brand();
		$this->load->view('Componants/product_info', $data);
	}

	public function product_insert(){
		if($this->input->is_ajax_request()){
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('brand', 'Brand', 'required');
			$this->form_validation->set_rules('price', 'Price', 'required');

			if ($this->form_validation->run() == FALSE)
                {
                        $data = array('responce'=>'error', 'message' => validation_errors());
                }
                else
                {
					$ajax_data = $this->input->post();
					if($this->prodduct_insert_model->insert_entry($ajax_data)){
						$data = array('responce'=>'success', 'message' => "Insert is Successfull");
					}else{
						$data = array('responce'=>'error', 'message' => "Insert NOT Successfull");
					}
					
                }
		}else{
			
		}
		echo json_encode($data);
	}

	public function fetch(){
		if($this->input->is_ajax_request()){
			$data = $this->prodduct_insert_model->get_entries();

			echo json_encode($data);
		}
	}

	public function sale_fetch(){
		
		if($this->input->is_ajax_request()){
			$text['brand'] = $this->input->post('brand');
			$text['name'] = $this->input->post('name');
			$data = $this->prodduct_insert_model->selectnameprice($text);
		echo json_encode($data);
		}
	}

	public function updateStock(){
		if($this->input->is_ajax_request()){
			$this->form_validation->set_rules('id', 'Id', 'required');
			$this->form_validation->set_rules('stock', 'Stock', 'required');

			if ($this->form_validation->run() == FALSE)
                {
                        $data = array('responce'=>'error', 'message' => validation_errors());
                }
                else
                {
					$data['id'] = $this->input->post('id');
					$data['stock'] = $this->input->post('stock');
					if($this->prodduct_insert_model->update_entry($data)){
						$data = array('responce'=>'success', 'message' => "Update is Successfull");
					}else{
						$data = array('responce'=>'error', 'message' => "Update is NOT Successfull");
					}
					
                }
		}else{
			
		}
		echo json_encode($data);
	}

	public function deleteProduct(){
		if($this->input->is_ajax_request()){
			$del_id = $this->input->post('id');
			if($this->prodduct_insert_model->delete_entry($del_id)){
				$data = array('responce'=>'success'); 
			}else{
				$data = array('responce'=> 'error');
			}

		}

		echo json_encode($data);
	}

	public function editallSingleProduct(){
		if($this->input->is_ajax_request()){
			$editId = $this->input->post('id');
			if($post = $this->prodduct_insert_model->single_entry($editId)){
				$data = array('responce'=>'succsess', 'post' => $post);
			}else{
				$data = array('responce'=>'error', 'message'=>'Failed');
			}
		}

		echo json_encode($data);
	}

	public function updateSingleRow(){
		if($this->input->is_ajax_request()){

			$this->form_validation->set_rules('id', 'Id', 'required');
			$this->form_validation->set_rules('stock', 'Stock', 'required');

			if($this->form_validation->run()== FALSE){
				$data = array('responce'=>'error', 'message'=>validation_errors());
			}else{
				$data['id'] = $this->input->post('id');
				$data['name'] = $this->input->post('name');
				$data['price'] = $this->input->post('price');
				$data['stock'] = $this->input->post('stock');
				
				if($this->prodduct_insert_model->update_single_entry($data)){
					$data = array('responce'=>'success', 'message'=>'Update is Successfull');
				}else{
					$data = array('responce'=>'error', 'message'=>'Update is Fail');
				}
			
			}
		}
		echo json_encode($data);
	}
}
