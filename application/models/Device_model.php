<?php

class Device_model extends CI_Model {
	
	public function __construct() {
        parent::__construct();
    }

	// get all devices
	public function getAll() {
		$query = $this->db->get('devices');
		return $query->result('device');
	}

	// get single device
	public function get ($id) {
		$query = $this->db->get_where('devices',array('id' => $id));
		return $query->row(0,'device');
	}

	// delete one device
	public function delete ($id) {

	}

	// insert new device
	public function insert ($newDevice) {

	}

	// update existing device
	public function update ($deviceDetails) {
		
	}
}