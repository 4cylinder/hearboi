<?php

class User_model extends CI_Model {
	
	public function __construct(){
        parent::__construct();
    }
    
	// get single user
	public function get($id) {
		$query = $this->db->get_where('users', array('id' => $id));
		return $query->row(0,'User_model');
	}

	// update single user
	public function update($user) {
		$this->db->where('id', $user->id);
		return $this->db->update("users", 
			array('fname' => $user->fname,
				'lname' => $user->lname, 
				'email' => $user->email, 
				'phone' => $user->phone,
				'photo' => $user->photo));
	}
}