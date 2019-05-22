<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');//defined('BASEPATH') OR exit('No direct script access allowed');

class Addmenu extends CI_Controller { 
	function __construct(){ 
	parent::__construct();  
 
} 

 
	public function index()
	{
 		$data['content'] = "index";
		$this->load->view('add_category',$data);
	}

 
	// public function category($value,$value2)
	// {
	// 	 $data['content'] = $value.$value2;
	// 	 $data['main'] = $value;
	// 	 $data['sub'] = $value2;
	// 	$this->load->view('pages',$data);
	// }
 
 
 
}
