<?php

class Device_model extends CI_Model {
	public function __construct() {
        parent::__construct();
    }
	// get all devices
	function getAll() {
		$query = $this->db->get('devices');
		return $query->result('device');
	}

	// get single device
	function get ($id) {
		$query = $this->db->get_where('devices',array('id' => $id));
		return $query->row(0,'device');
	}

	// delete one device
	function delete ($id) {

	}

	// insert new device
	function insert ($newDevice) {

	}

	// update existing device
	function update ($deviceDetails) {
		
	}
}