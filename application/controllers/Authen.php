<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Authen extends CI_Controller {
	private $temp;
	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->model('General');	  
	}  
	public function loginsubmit(){
		$this->temp['page_error'] = "";
		$this->load->model('Admin_model');	 
		$this->load->model('general');	 
		if ( $this->input->post('txtuser') != "" && $this->input->post('txtpss') != ""  ) {
			$result = $this->Admin_model->login($this->input->post('txtuser'),$this->input->post('txtpss'));
			print_r($result);
			if($result['utype'] == "admin" && $result['status'] == 1){
				$this->general->authen_session($result);
                print_r($this->General->sessions('data'));
				if($result['utype'] == "admin")	{
					redirect('/');
				}
			}else{
				$this->temp['page_error'] = 3;
			}
		}elseif( $this->input->post('txtuser') == "" || $this->input->post('txtpss') == "" ){
			$this->temp['page_error'] = 1;
		}else{
			$this->temp['page_error'] = 2;
		}	

		// $this->temp['usr'] = $this->input->post('txtuser'); 
		// $this->load->view('inc/head2',$this->temp);
		// $this->load->view('pages/login');
		// $this->load->view('inc/foot2');
	}
	public function logout(){
		$this->General->logout();		
		header("location: " . base_url());
	}
}	