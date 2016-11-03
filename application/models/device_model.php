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
		return $this->db->delete("devices",array('id' => $id ));
	}

	// insert new device
	public function insert ($device) {
		$this->db->insert("devices", 
			array('location' => $device['location'],
				'device_name' => $device['name'],
				'device_type' => $device['type'],
				'allow_notif' => $device['notification'],
				'audioFile' => $device['audioFile']));
		return $this->db->insert_id();
	}

	// update existing device
	public function update ($device) {
		$this->db->where('id', $device['id']);
		return $this->db->update("devices", 
			array('location' => $device['location'],
				'device_name' => $device['name'],
				'device_type' => $device['type'],
				'allow_notif' => $device['notification'],
				'audioFile' => $device['audioFile']));
	}
}