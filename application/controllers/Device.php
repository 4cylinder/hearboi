<?php

class Device extends CI_Controller {
	function __construct() {
		// Call the Controller constructor
    	parent::__construct();
    }
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		$this->load->model('device_model');
		$data['devices'] = $this->device_model->getAll();
		$this->load->view('home', $data);
	}

	// load view for edit device page
	public function edit($id) {
		$this->load->model('device_model');
		$data['title'] = "EDIT DEVICE";
		$data['device'] = $this->device_model->get($id);
		$this->load->view('deviceForm',$data);
	}

	// load view for new device page
	public function create() {
		$data['title'] = "NEW DEVICE";
		$this->load->view('deviceForm', $data);
	}

	// create new device
	public function insert(){
		// normal form elements
		$device['device_name'] = $this->input->post('device_name');
		$device['location'] = $this->input->post('location');
		$device['sound_type'] = $this->input->post('sound_type');
		$device['audioFile'] = $this->input->post('audioFile');

		if($this->input->post('allow_notif')){
			$device['allow_notif'] = "on";
		} else {
			$device['allow_notif'] = "off";
		}
		
		$this->load->model('device_model');
		$id = $this->device_model->insert($device);
		$device['id'] = $id;

		// uploaded files
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|bmp';
		$this->load->library('upload', $config);
		$this->upload->do_upload('photo');

		if (empty($_FILES['photo']['name'])) {
			$device['photo'] = "default.jpg";
		} else {
			$filename = $_FILES['photo']['name'];
			$array = explode('.', $filename);
			$extension = end($array);
			$device['photo'] = $id.".".$extension;
			rename("./uploads/".$filename, "./images/devices/".$device['photo']);
		}

		// if a new recording was made
		if ($device['audioFile']=="output.wav") {
			$device['audioFile'] = $id.".wav";
			rename("./audio/output.wav", "./audio/".$device['audioFile']);
		}
		
		$this->device_model->update($device);
		redirect(base_url().'device/index');
	}

	// save device details (grab data from AJAX)
	public function save(){
		$this->load->model('device_model');
		$device = Array();
		$device['id'] = $this->input->post('deviceId');
		$device['device_name'] = $this->input->post('device_name');
		$device['location'] = $this->input->post('location');
		$device['sound_type'] = $this->input->post('sound_type');
		$device['audioFile'] = $this->input->post('audioFile');

		if($this->input->post('allow_notif')){
			$device['allow_notif'] = "on";
		} else {
			$device['allow_notif'] = "off";
		}
		
		// uploaded files
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png|bmp';
		$this->load->library('upload', $config);
		$this->upload->do_upload('photo');
		

		if (empty($_FILES['photo']['name'])) {
			$curr = $this->device_model->get($device['id']);
			$device['photo'] = $curr->photo;
		} else {
			$filename = $_FILES['photo']['name'];
			$filename = str_replace(' ','_',$filename);
			$array = explode('.', $filename);
			$extension = end($array);
			$device['photo'] = $device['id'].".".$extension;
			rename("./uploads/".$filename, "./images/devices/".$device['photo']);
		}

		// if a new recording was made
		if ($device['audioFile']=="output.wav") {
			$device['audioFile'] = $device['id'].".wav";
			rename("./audio/output.wav", "./audio/".$device['audioFile']);
		}

		$this->device_model->update($device);

		$response['status'] = true;
        $response['message'] = 'success';
        echo json_encode($response);
	}

	// delete device
	public function delete($id) {
		$this->load->model('device_model');
		$this->device_model->delete($id);
		redirect(base_url().'device/index');
	}

	// Call SMS Gateway to send alert text
	public function sendSMS($deviceId, $soundType) {
		// Number to text
		$this->load->model('user_model');
		$this->load->model('device_model');
		$user = $this->user_model->get(1);
		$device = $this->device_model->get($deviceId);

		if ($device->allow_notif=="on") {
			$phone = $user->phone;

			$msg = urlencode("Hearboi Alert: Heard ".$soundType);
			$username = $this->config->item('sms_username');
			$password = $this->config->item('sms_password');
			$url = "https://www.textmagic.com/app/api?username=".$username."&password=".$password."&cmd=send&text=".$msg."&phone=".$phone."&unicode=1";

			echo file_get_contents($url);

		} else {
			echo "Sorry, notifications are not enabled.";
		}	
	}

	// remote control of audio recording, and status display
	public function record($cmd) {
		if ($cmd=="start") { // start recording audio
			// first disable commit-ability
			$this->db->where('id',3);
			$this->db->update("record", array('status'=>'NO'));
			// then allow recording
			$this->db->where('id',1);
			if ($this->db->update("record", array('status'=>'START'))){
				$response['status'] = true;
		        $response['message'] = 'success';
		        // delete existing upload file so that a reupload can take place
		        if (file_exists("./audio/output.wav")) {
					unlink("./audio/output.wav");
				}
		        echo json_encode($response);
			} else {
				$response['status'] = false;
		        $response['message'] = 'failure';
		        echo json_encode($response);
			}
			$sound_type = "".$this->input->get('sound_type');
			if ($sound_type=="") 
				$sound_type = "Doorbell";
			// set sound type for hearboi to listen on
			$this->db->where('id',2);
			$this->db->update("record", array('status'=>$sound_type));
		} else if ($cmd=="stop") { // stop recording audio
			$this->db->where('id',1);
			if ($this->db->update("record", array('status'=>'STOP'))){
				$response['status'] = true;
		        $response['message'] = 'success';
		        echo json_encode($response);
			} else {
				$response['status'] = false;
		        $response['message'] = 'failure';
		        echo json_encode($response);
			}
		} else if ($cmd=="status") { // is a recording in progress or not?
			$query = $this->db->get_where('record',array('id' => 1));
			$data = $query->result_array();
			echo($data[0]['status']);
		} else if ($cmd=="upload") {// device uploads its new recording to the server
			// uploaded files
			$config['upload_path'] = './audio/';
			$config['allowed_types'] = 'mp3|wav|ogg|midi';
			$this->load->library('upload', $config);
			$this->upload->do_upload('audioFile');
			
		} else if ($cmd=="download"){ // deviceForm view queries this to let user test recordings
			if (file_exists("./audio/output.wav")) {
				echo "output.wav";
			} else {
				echo "default.mp3";
			}
		} else if ($cmd=="sound") {
			// echo sound type for hearboi device
			$query = $this->db->get_where('record',array('id' => 2));
			$data = $query->result_array();
			echo($data[0]['status']);
		} else if ($cmd=="allow_commit") {
			// allow committing of new sound
			$this->db->where('id',3);
			$this->db->update("record", array('status'=>'YES'));
		} else if ($cmd=="commit") {
			// echo commit-ability for hearboi device
			$query = $this->db->get_where('record',array('id' => 3));
			$data = $query->result_array();
			echo($data[0]['status']);
		}
	}
}
