<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class add_productModel extends CI_Model {

	public function insertProduct($product_name,$product_price,$brand,$product_group){
        $data = array(
            'procut_name' 	=> $procut_name,
            'product_price' => $product_price,
            'brand' 		=> $brand,
            'product_group' => $product_group
            
    );
    
    return $this->db->insert('add_product ', $data);

    }
	
	
}
