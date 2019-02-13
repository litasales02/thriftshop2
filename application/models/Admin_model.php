<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_Model extends CI_Model {
	function __construct(){
		// $this->load->database();
		$this->load->model('General');
	}
	
}