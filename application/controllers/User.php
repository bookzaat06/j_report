<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

function __construct() {
parent::__construct();
 
 // path to simple_html_dom
}
 
public function index() {
    $this->load->view('login');
    }

    public function check(){
 
        $emp_username=$this->input->post('username');
		$emp_password=$this->input->post('password');

		if($emp_username=='admin' && $emp_password=='admin'){
		$data['result'] = "Success";
		$data['url'] = base_url();
 		$this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($data));
 	}else{

		$response['result'] = "Error";
        $this->output->set_status_header(200)->set_content_type('application/json')->set_output(json_encode($response));
 
 	}

    }
}
?>