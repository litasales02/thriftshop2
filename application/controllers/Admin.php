<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	private $temp;
	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		// $this->load->model('General');	 
		// if( $this->General->authen_status() == 1 ){
		// 	$temp = $this->General->sessions('data');
		// 	$this->temp['user_name'] = 'Admin';//$temp[0]['fullname'];
		// 	$this->temp['title_page'] = 'Welcome Admin' ;//. $temp[0]['fullname'];			
		// 	$target =  str_replace('/', '', $_SERVER['REQUEST_URI']);
		// }else{
		// 	$target = $_SERVER['REQUEST_URI'];
		// 	if($target == '/login' || $target == '/login/submit') {
				
		// 	}else {
		// 		redirect('login');
		// 	}
		// }
	}
	public function index(){	
		$this->load->view('inc/head',$this->temp);
		$this->load->view('inc/nav-top');
		$this->load->view('inc/nav-side');
		$this->load->view('pages/index'); 
		$this->load->view('inc/foot');
	}
	public function login(){
		$this->load->view('inc/head2');
		$this->load->view('pages/login');
		$this->load->view('inc/foot2');
	}
	
	public function logout(){
		$this->General->logout();		
		header("location: " . base_url());
	}
}	