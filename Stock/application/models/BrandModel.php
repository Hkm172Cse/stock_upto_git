<?php
    class BrandModel extends CI_Model {

       
        
        public function insert_entry($data)
        {
               $query = "INSERT INTO `table_brand` (`brand`) VALUES ('$data')";
              
                return $this->db->query($query);
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

}


?>