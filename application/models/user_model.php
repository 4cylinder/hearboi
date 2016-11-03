<?php

class User_model extends CI_Model {
	public function __construct(){
        parent::__construct();
    }
    
	// get single user
	function get($id) {
		$query = $this->db->get_where('users',array('id' => $id));
		return $query->row(0,'User');
	}

	// update single user
	function update($userDetails) {
		$this->db->where('id', $userDetails->id);
		//return $this->db->update("product", array('name' => $product->name,'description' => $product->description, 'price' => $product->price));
	}
}