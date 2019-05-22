<?php
 if ( ! defined('BASEPATH')) exit('No direct script access allowed');//defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {


	 
	function __construct(){ 
	parent::__construct();  
 
} 
// function Datatables()  
// { 
//  /* define variable sent to views */
//  $data['content'] = "Datatables.";
// $this->load->view('content',$data); 
// }  

// function menu()  
// { 
//  /* define variable sent to views */
//  $data['content'] = "menu.";
// $this->load->view('content',$data); 
// }  

 
	public function index()
	{
 		$data['content'] = "index";
		$this->load->view('index',$data);
	}

 
	public function category($value,$value2)
	{
		 $data['content'] = $value.$value2;
		 $data['main'] = $value;
		 $data['sub'] = $value2;
		$this->load->view('pages',$data);
	}

	public function report($value,$value2,$value3)
	{
		$data['content'] = $value.'&'.$value2;
		 $data['main'] = $value;
		 $data['group'] = $value2;
		 $data['list'] = $value3;
 		$this->load->view('report',$data);
	}
 

	// public function test(){
	// 	$data['blog_text'] ="test";
	// 	$this->load->view('index',$data);
	// }
}
