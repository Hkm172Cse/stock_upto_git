<?php
    class registerModel extends CI_Model {

       
       

        
        public function register_request($data)
        {
               
              return $this->db->insert('table_register', $data);

        }

        public function login_request($data){
            $this->db->select('*');
            $this->db->from('table_register');
            $this->db->where('username', $data['username']);
            $this->db->where('password', $data['password']);
            $query_result = $this->db->get();
            $result = $query_result->row();
            return $result;
        }

}


?>