<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Authen extends CI_Model {
	function __construct(){
		//parent::__construct();
		$this->load->database();
	}
	public function load_data(){
		$get = $this->db->get('tbllogin');
		return $get->result_array();
	}
	public function Authenticate($uname,$pass){
		$return = array('status' => 0 ,'utype' => '','id' => '','data' => [array("status" => 1)],'data_profile' => [array("status" => 1)]);
		$clean_user = $this->db->escape_str($uname);
		$clean_pass = $this->db->escape_str($pass);

		$this->db->where('uname',$clean_user);
		$this->db->where('upass',md5($clean_pass));
		$get = $this->db->get('tbllogin');

		if($get->num_rows() == 1){
			$utype = $get->result_array()[0]['type'];
			$PID = $get->result_array()[0]['UID'];
			$ID = $get->result_array()[0]['ID'];
			$status = $get->result_array()[0]['status'];


			$this->db->where('ID',$PID);
			$getu = $this->db->get('tblusers');

			$data = $get->result_array();
			$get_profile = $getu->result_array();;
			$return = array('status' => $status ,'utype' => $utype,'id' => $ID,'data' => $data,'data_profile' => $get_profile);
		}else{
			$return = array('status' => 2 ,'utype' => '','id' => '','data' => [array("status" => 0)],'data_profile' => [array("status" => 0)]);
		}
		return $return;
	}
	
}