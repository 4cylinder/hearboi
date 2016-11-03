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
	public function editDevice() {
		$this->load->model('Device_model');
		$data['title'] = "EDIT DEVICE";
		$this->load->view('deviceForm',$data);
	}

	// load view for new device page
	public function newDevice() {
		$data['title'] = "NEW DEVICE";
		$this->load->view('deviceForm', $data);
	}

	// create new device
	public function createDevice(){
		// normal form elements
		$device['device_name'] = $this->input->post('device_name');
		$device['location'] = $this->input->post('location');
		$device['device_type'] = $this->input->post('device_type');
		$device['allow_notif'] = $this->input->post('allow_notif');
		
		$this->load->model('device_model');
		$id = $this->device_model->insert($device);
		$device['id'] = $id;

		// uploaded files
		$config['upload_path'] = './images/devices/';
		$config['allowed_types'] = 'gif|jpg|png';

		if (empty($_FILES['audioFile']['name'])) {
			$device['audioFile'] = "default.mp3";
		} else {
			$this->upload->do_upload('audioFile');
			$filename = $_FILES['audioFile']['name'];
			$device['audioFile'] = $filename;
		}

		if (empty($_FILES['photo']['name'])) {
			$device['photo'] = "default.jpg";
		} else {
			$this->upload->do_upload('photo');
			$filename = $_FILES['photo']['name'];
			$device['photo'] = $filename;
		}
		
		$this->device_model->update($device);
		redirect(base_url().'device/index');
	}

	// save device details (grab data from AJAX)
	public function saveDevice(){
		//$config['upload_path'] = './images/devices/';
		//$config['file_name'] = "1.jpg";
		$device = Array();
		$device['id'] = $this->input->post('deviceId');
		$device['name'] = $this->input->post('deviceName');
		$device['location'] = $this->input->post('location');
		$device['type'] = $this->input->post('deviceType');
		$device['notification'] = $this->input->post('notification');
		$device['audioFile'] = $this->input->post('audioFile');
		$device['photo'] = $this->input->post('photo');

		$this->load->model('device_model');
		$this->device_model->update($device);

		redirect(base_url().'device/index');
	}

	// Call SMS Gateway to send alert text
	public function sendSMS(){
		$this->load->library('sms/TextMagicAPI');
		$api = new TextMagicAPI(array(
		    "username" => "tsyew", 
		    "password" => "JsOg2Lf2eF"
		));

		$text = "Interactive Device Design SMS Gateway Test";

		// Number to text
		$this->load->model('user_model');
		$user = $this->user_model->get(1);
		$phones = array($user->phone);

		$results = $api->send($text, $phones, true);
		echo json_encode($results);
	}

	// load view for profile edit page
	public function user() {
		$this->load->model('user_model');
		$data['user'] = $this->user_model->get(1);
		$this->load->view('profile', $data);
	}

	// save user details (grab data from AJAX)
	public function saveUser() {
		//$config['upload_path'] = './images/users/';
		//$config['file_name'] = "1.jpg";
		$user = Array();
		$user['id'] = 1;
		$user['fname'] = $this->input->post('fname');
		$user['lname'] = $this->input->post('lname');
		$user['email'] = $this->input->post('email');
		$user['phone'] = $this->input->post('phone');
		$this->load->model('user_model');
		$this->user_model->update($user);
		$response['status'] = true;
        $response['message'] = 'success';
        echo json_encode($response);
	}
}
