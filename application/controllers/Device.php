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

	public function config() {
		$this->load->view('config');
	}

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
}
