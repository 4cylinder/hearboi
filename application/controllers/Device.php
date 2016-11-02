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
		$this->load->view('home');
	}

	// load view for new device page
	public function edit() {
		$this->load->view('editDevice');
	}

	// load view for edit device page
	public function newDevice() {
		$this->load->view('newDevice');
	}

	// save device details (grab data from AJAX)
	public function saveDevice(){

	}

	// Call SMS Gateway to send alert text
	public function doorbell(){
		$this->load->library('sms/TextMagicAPI');
		$api = new TextMagicAPI(array(
		    "username" => "tsyew", 
		    "password" => "JsOg2Lf2eF"
		));

		$text = "Interactive Device Design SMS Gateway Test";

		// Use this number for testing purposes. This is absolutely free.
		$phones = array(13105337308);

		$results = $api->send($text, $phones, true);
		echo json_encode($results);
	}

	// load view for profile edit page
	public function user() {
		$this->load->view('profile');
	}

	// save user details (grab data from AJAX)
	public function saveUser() {

	}
}
