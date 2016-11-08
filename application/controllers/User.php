<?php
class User extends CI_Controller {
	function __construct() {
		// Call the Controller constructor
    	parent::__construct();
    }

    // load view for profile edit page
	public function profile() {
		$this->load->model('user_model');
		$data['user'] = $this->user_model->get(1);
		$this->load->view('profile', $data);
	}

	// save user details (grab data from AJAX)
	public function save() {
		//$config['upload_path'] = './images/users/';
		//$config['file_name'] = "1.jpg";
		$this->load->model('user_model');

		$user['id'] = 1;
		$user['fname'] = $this->input->post('fname');
		$user['lname'] = $this->input->post('lname');
		$user['email'] = $this->input->post('email');
		$user['phone'] = $this->input->post('phone');

		// uploaded files
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|png';
		$this->load->library('upload', $config);
		$this->upload->do_upload('photo');

		if (empty($_FILES['photo']['name'])) {
			$curr = $this->user_model->get(1);
			$user['photo'] = $curr->photo;
		} else {
			$filename = $_FILES['photo']['name'];
			$array = explode('.', $filename);
			$extension = end($array);
			$user['photo'] = "1".".".$extension;
			rename("./uploads/".$filename, "./images/users/".$user['photo']);
		}
		
		$this->user_model->update($user);
		$response['status'] = true;
        $response['message'] = 'success';
        echo json_encode($response);
	}
}