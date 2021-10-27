<?php
    class prodduct_insert_model extends CI_Model {

       
        public function get_entries()
        {
                $query = $this->db->query("select * from table_product order by id DESC");
                return $query->result();
        }

        public function select_brand()
        {
                $query = $this->db->query("select * from table_brand order by id DESC");
                return $query->result();     
        }

        public function selectnameprice($data)
        {
               $brand = $data['brand'];
               $name = $data['name'];
                $query = $this->db->query("select id,name,price,stock from table_product WHERE name LIKE '$name%' AND brand = '$brand'");
                if($query == true){
                        return $query->result();
                }else{
                        return "Item Not Stock"; 
                }
               
                  
        }

        public function insert_entry($data)
        {
               
              return $this->db->insert('table_product', $data);
        }

        public function update_entry($data)
        {
               

               return $this->db->update('table_product', $data, array('id' => $data['id']));
        }

        public function delete_entry($id){
             return $this->db->delete('table_product', array('id'=>$id)); 
        }

        public function single_entry($id){
                $this->db->select("*");
                $this->db->from("table_product");
                $this->db->where("id", $id);
                $query = $this->db->get();
                if(count($query->result())>0){
                        return $query->row();
                }

        }

        public function update_single_entry($data){
                return $this->db->update('table_product', $data, array('id' => $data['id'])); 
        }

}


?>