<?php
    class saleModel extends CI_Model {

       
        public function get_entries()
        {
                $query = $this->db->query("select * from table_product order by id DESC");
                // $query = $this->db->get('table_product');
                return $query->result();
        }
        public function select_brand()
        {
                $query = $this->db->query("select * from table_brand order by id DESC");
                return $query->result();     
        }
        public function select_for_invoice($id)
        {
                $query = $this->db->query("select * from table_sale WHERE customer_id = '$id'");
                //$this->session->unset_userdata('customer_id');
                
                return $query->result();
                
        }

        public function select_discount($id)
        {
                $query = $this->db->query("select * from table_customer WHERE customer_id = '$id'");
                //$this->session->unset_userdata('customer_id');
                
                return $query->result();
                
        }

        public function selectnameprice($data)
        {
                
                $query = $this->db->query("select name,price from table_product WHERE name LIKE '$data%'");
                if($query == true){
                        return $query->result();
                }else{
                        return "Item Not Stock"; 
                }
               
                  
        }

        public function insert_entry($data)
        {

                if(!$this->session->has_userdata('customer_id')){

                        $customerData['name'] = $data['customarName'];
                        $customerData['phone'] = $data['contact'];
                        $this->db->insert('table_customer', $customerData);
                        $customerId = $this->db->insert_id();

                        $this->session->set_userdata('customer_id',$customerId);

                }
                


                $data['customer_id'] = $this->session->userdata('customer_id');
                return $this->db->insert('table_sale', $data);
                 
               

        }

        public function update_discount($data){
                
                return $this->db->update('table_customer', $data, array('customer_id' => $data['customer_id']));   
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
        }

        public function selectTodaySale($data)
        {
                
                $query = $this->db->query("select * from table_sale WHERE created LIKE '%$data%' order by id DESC");
                if($query == true){
                        return $query->result();
                }else{
                        return "Item Not Stock"; 
                }
               
                  
        }
        public function select_for_update($id)
        {
                $this->db->select('*');
                $this->db->from('table_sale');
                $this->db->where('id', $id);
                $query_result = $this->db->get();
                $result = $query_result->row();
                return $result;       
        }

        public function selectCustomarName($data){
                 
                $query = $this->db->query("select DISTINCT customarName,contact from table_sale WHERE customarName LIKE '$data%'");
              
                return $query->result();
               
        }
        public function discountSelectData($id){
                
                 $query = $this->db->query("select * from table_sale WHERE customer_id = '$id'");
              
                return $query->result();
               
        }
        public function update_single_entry($data){
                return $this->db->update('table_sale', $data, array('id' => $data['id'])); 
        }

}


?>