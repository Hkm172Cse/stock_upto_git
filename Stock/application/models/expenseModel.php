<?php
    class expenseModel extends CI_Model {

       
        
        public function insert_entry($data)
        {
                return $this->db->insert(' table_expense', $data);
        }

        public function BrandSelectMethod(){
                $query = "select * from table_brand order by id DESC";
               return $this->db->query($query);
        }

        public function update_entry()
        {
                $this->title    = $_POST['title'];
                $this->content  = $_POST['content'];
                $this->date     = time();

                $this->db->update('entries', $this, array('id' => $_POST['id']));
        }

        public function selectExpense($data)
        {
                
                $query = $this->db->query("select id,expense_for,amount from table_expense WHERE created LIKE '%$data%'");
                if($query == true){
                        return $query->result();
                }else{
                        return "Item Not Stock"; 
                }
               
                  
        }

}


?>