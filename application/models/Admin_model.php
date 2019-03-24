<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class Admin_Model extends CI_Model {
	private $database;
	private $referencemaindata;
	private $referenceadmindata;
	function __construct(){
		$this->load->model('General');
		require '\xampp\htdocs\thriftshop\vendor\autoload.php';
		$serviceAccount = ServiceAccount::fromJsonFile('\xampp\htdocs\thriftshop\secret\thrftshp-firebase-adminsdk-4kx34-1b2fbcb683.json');
		$firebase = (new Factory)
		->withServiceAccount($serviceAccount)
		->withDatabaseUri('https://thriffshop.firebaseio.com')
		->create();
		$this->database = $firebase->getDatabase();
		// $this->referencemaindata = $this->database->getReference('maindata');
		// $snapshot = $reference->getSnapshot();
		// $value = $snapshot->getValue();
		// echo "<pre>";
		// print_r($value);
		// echo "</pre>";
	}

	public function login($username,$password){
		$result  = $this->database->getReference('admindata')->orderByChild('username')->equalTo($username); 
		foreach ($result->getValue() as $key => $value) { 
			if($value['password'] === $password){
				$return = array('status' => 2 ,'utype' => '','id' => '','data' => [array("status" => 1)],'data_profile' => [array("status" => 1)]);	
				return array('status' => 1 ,'utype' => 'admin','id' => $key,'data' => $value);
			}
		}
		return array('status' => 2 ,'utype' => '','id' => '','data' => null);
	}
	public function getallnewseller(){
		return $this->database->getReference('maindata')->getValue();
	}
	public function getnewseller($idkey){
		return $this->database->getReference('maindata/'.$idkey)->getValue();
	}
	public function updatesellerstatus($key){
		$this->database->getReference('maindata/'. $key . "/requirements")->update(['status'=>1]);
		return true;
	}	
	public function getmessages($key){
		return $this->database->getReference('admindata/messages/'. $key)->getValue();
	}
}	