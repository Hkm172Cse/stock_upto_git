<?php
    class SaleExpense_Model extends CI_Model {

       
        
        public function select_Expense($data)
        {
            $query = $this->db->query("select amount from table_expense WHERE created LIKE '%$data%'");
              
            return $query->result();
               
        }

        public function select_Sale($data){
             $query = $this->db->query("select sale_price from table_sale WHERE created LIKE '%$data%'");
              
             return $query->result();
        }

    

}


?>