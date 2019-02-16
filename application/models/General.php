<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General extends CI_Model {
	function __construct(){
		$this->load->database();			
		// $this->load->helper('email');
		$this->load->library('session');	
	}
	public function RandomString($length = 5) {
		$randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, $length);
		return $randomString;
	}
	public function date($def = "m/d/Y"){
		date_default_timezone_set("Asia/Manila");
		$nowDate = date($def);
		return $nowDate;	
	}
	public function email_validation($email){
		if ( valid_email($email) ){
		    return true;
		} else {
		    return false;
		}
	}
	public function AES_encry($str){		
		$this->load->library('aesmcrypt');	
		return $this->aesmcrypt->encrypt($str);
	}
	public function AES_dencry($str){		
		$this->load->library('aesmcrypt');	
		return $this->aesmcrypt->decrypt($str);
	}
	public function pagination_page_query($query,$page = 0,$limit = 10,$target){

		$total_count_divider = 0;	
		$total_count = 0;	
		$return = null;
		$offset = 1;
		$get = $this->db->query($query);
		if($get->num_rows()){
			$total_count = $get->num_rows();
		}
		
		$count = ceil($total_count / $limit);
		for($x=0;$x<=$count - 1;$x++){
			$return[$x] = ($total_count_divider);
			$total_count_divider = $total_count_divider + $limit;
		}
		if(count($return) > 1){
			$offset = $return[$page - 1];
		}else{
			$offset = 0;
		}
		
		$getdata = $this->db->query($query . " LIMIT $offset,$limit");
		
		$return2 = null;
		$over_size = false;
		$count_button = 0;
		$limit_button = 10;
		$count2 = ceil($total_count / $limit);
		$previous = ($page - 1)==0?1:($page - 1);
		$next = ($page + 1)>$count2?$count2:($page + 1);
		$return2[0] = "<li ><a href=\"$target"."?page=" . $previous . "\">Previous</a></li>";
		$x=1;
		if( $page > ($limit_button - 5) ){
			$return2[1] = "<li ><a href=\"$target"."?page=1\">First</a></li>";
			$x = $page - 5;
		}
		$xx=0;
		for($x;$x<=$count2;$x++){
			if( $xx <= $limit_button ){
				$return2[$x + 1] = "<li ". ($page==($x)?"class=\"active\"":"") ."><a href=\"$target"."?page=".($x)."\">". ($x)."</a></li>";
				$count_button = $x + 1;
			}else{
				$over_size = true;
			}		
			$xx++;	
		}
		if($over_size == true){
			$return2[$count_button] = "<li><a href=\"$target"."?page=" . $count2 . "\">Last</a></li>";
		}
		$return2[$count_button + 1] = "<li><a href=\"$target"."?page=" . $next . "\">Next</a></li>";
		$return2 = count($return2)>=4?$return2:null;	

		return array('result' => $getdata->result_array(),'pagination' => $return2);

	}
	public function pagination_page($table,$page,$limit){
		$total_count = $this->db->count_all_results($table);
		$total_count_divider = 0;
		$return = null;
		$count = ceil($total_count / $limit);
		for($x=0;$x<=$count - 1;$x++){
			$return[$x] = ($total_count_divider);
			$total_count_divider = $total_count_divider + $limit;
		}
		if(count($return) > 1){
			return $return[$page - 1];
		}else{
			return 0;
		}
	}
	public function pagination_button($table,$page,$limit,$target){
		$total_count = $this->db->count_all_results($table);
		$total_count_divider = 0;
		$return;
		$over_size = false;
		$count_button = 0;
		$limit_button = 10;
		$count = ceil($total_count / $limit);
		$previous = ($page - 1)==0?1:($page - 1);
		$next = ($page + 1)>$count?$count:($page + 1);
		$return[0] = "<li ><a href=\"$target"."?page=" . $previous . "\">Previous</a></li>";
		$x=1;
		if( $page > ($limit_button - 5) ){
			$return[1] = "<li ><a href=\"$target"."?page=1\">First</a></li>";
			$x = $page - 5;
		}
		$xx=0;
		for($x;$x<=$count;$x++){
			if( $xx <= $limit_button ){
				$return[$x + 1] = "<li ". ($page==($x)?"class=\"active\"":"") ."><a href=\"$target"."?page=".($x)."\">". ($x)."</a></li>";
				$count_button = $x + 1;
			}else{
				$over_size = true;
			}		
			$xx++;	
		}
		if($over_size == true){
			$return[$count_button] = "<li><a href=\"$target"."?page=" . $count . "\">Last</a></li>";
		}
		$return[$count_button + 1] = "<li><a href=\"$target"."?page=" . $next . "\">Next</a></li>";
		return count($return)>=4?$return:null;	
	}
	public function sessions($sesid){
		return  $this->session->userdata($sesid);
	}
	public function session_unset($data){
		$this->session->unset_userdata($data);
	}
	public function authen_session($data){
		$this->session->set_userdata($data);
	}
	public function set_session($data){
		$this->session->set_userdata($data);
	}
	public function sms_send($number,$messages){
		include BASEPATH . 'libraries/Chikka.php' ;
		$credentials = array(
		'client_id' => 'bb7d100591a3c37762cfa9db8e083e65bed740a212e2eb113d5018a5df5f6ca1',
		'secret_key'=> '88ed08311ff3ce819004d213e56516cf1289c6ec9cd0c16657bfa2ea2b25f7a1',
		'shortcode' => '2929034298'
		);

		$chikkaAPI = new Chikka($credentials);
		$send = $chikkaAPI->send($number, $messages);
		$messageId = $send->msg->message_id;
		if ( $send->success() ) {
			return 1;
		} else {
			return 0;
		}
		
	}
	public function authen_status(){
		$result = 0;
		if($this->session->userdata('status') != null || $this->session->userdata('status') != ""){
			$result = 1;
		}
		return  $result;
	}
	public function set_sect(){
		$data = md5($this->date());
		$this->session->set_userdata(array('sects' => $data));	
	}
	public function countvisit(){
		$count = $this->session->userdata('visit') ;
		$this->session->set_userdata(array('visit' => ($count + 1)));
	}
	public function getcountvisit(){
		return $this->session->userdata('visit');
	}
	public function login_no_data(){
		$this->session->set_userdata(array('nodata_login' => true));	
	}
	public function login_no_data_get(){
		$this->session->userdata('nodata_login');	
	}
	public function login_no_data_remove(){		
		$this->session_unset('nodata_login');
	}
	public function logout(){
		$this->session_unset('status');
		$this->session_unset('data');
		$this->session_unset('utype');
		$this->session_unset('nodata_login');
		$this->session_unset('visit');
	}

	public function distance($lat1, $lon1, $lat2, $lon2, $unit) {
	  $theta = $lon1 - $lon2;
	  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
	  $dist = acos($dist);
	  $dist = rad2deg($dist);
	  $miles = $dist * 60 * 1.1515;
	  $unit = strtoupper($unit);

	  if ($unit == "K") {
	    return ($miles * 1.609344);
	  } else if ($unit == "N") {
	      return ($miles * 0.8684);
	    } else {
	        return $miles;
	      }
	}
}