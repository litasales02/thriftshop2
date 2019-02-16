<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	private $temp;
	function __construct(){
		parent::__construct();		
		$this->load->helper('url');
		$this->load->model('General');	 
		// print_r($this->General->sessions('data'));
		if( $this->General->authen_status() == 1 ){
			$temp = $this->General->sessions('data'); 
			$this->temp['user_name'] =  $temp['fullname'];
			$this->temp['title_page'] = 'Welcome Admin' ;//. $temp[0]['fullname'];			
			$target =  str_replace('/', '', $_SERVER['REQUEST_URI']);

			$this->load->model('Admin_model');	 
			$dataall = $this->Admin_model->getallnewseller();
			$buyer = 0;
			$seller = 0;
			$sellernew = 0;
			foreach ($dataall as $key => $value) { 
				if($value['usertype'] === 'buyer'){ 
					$buyer++;
				}else if($value['usertype'] === 'seller'  && $value['requirements']['status'] == 1){ 
					$seller++;
				}else if($value['usertype'] === 'seller'  && $value['requirements']['status'] == 0){ 
					$sellernew++;
				}
			}
			$this->temp['buyer'] = $buyer;
			$this->temp['seller'] = $seller;
			$this->temp['sellernew'] = $sellernew;
		}else{
			$target = $_SERVER['REQUEST_URI'];
			if($target == '/login' || $target == '/login/submit') {
				
			}else {
				redirect('login');
			}
		}
	}
	public function index(){	
		// require '\xampp\htdocs\thriftshop\vendor\autoload.php';
		// $serviceAccount = ServiceAccount::fromJsonFile('\xampp\htdocs\thriftshop\secret\thriffshop-firebase-adminsdk-z5a59-86e31646f8.json');
		// $firebase = (new Factory)
		// ->withServiceAccount($serviceAccount)
		// ->withDatabaseUri('https://thriffshop.firebaseio.com')
		// ->create();
		// $database = $firebase->getDatabase();

		// $reference = $database->getReference('maindata');
		// $snapshot = $reference->getSnapshot();
		// $value = $snapshot->getValue();
		// echo "<pre>";
		// print_r($value);
		// echo "</pre>";

		$this->load->view('inc/head',$this->temp);
		$this->load->view('inc/nav-top');
		$this->load->view('inc/nav-side');
		$this->load->view('pages/index'); 
		$this->load->view('inc/foot');
		// $this->logout();
	}
	public function login(){
		$this->load->view('inc/head2');
		$this->load->view('pages/login');
		$this->load->view('inc/foot2');
	} 
	public function sellerlist(){
		$this->load->model('Admin_model');	 
		$this->temp['data'] = $this->Admin_model->getallnewseller();
		$this->load->view('inc/head',$this->temp);
		$this->load->view('inc/nav-top');
		$this->load->view('inc/nav-side');
		$this->load->view('pages/sellerlist'); 
		$this->load->view('inc/foot');
	}
	public function selleradded(){
		$this->load->model('Admin_model');	 
		$this->temp['data'] = $this->Admin_model->getallnewseller();
		$this->load->view('inc/head',$this->temp);
		$this->load->view('inc/nav-top');
		$this->load->view('inc/nav-side');
		$this->load->view('pages/newseller'); 
		$this->load->view('inc/foot');
	}
	public function selleraddeddetails()
	{
		$this->load->model('Admin_model');
		$keyid = $this->uri->segment(6);

		$this->temp['data'] = $this->Admin_model->getnewseller($keyid);
		$this->temp['key'] = $keyid;
		$this->load->view('inc/head',$this->temp);
		$this->load->view('inc/nav-top');
		$this->load->view('inc/nav-side');
		$this->load->view('pages/newsellerdetails'); 
		$this->load->view('inc/foot');

	}
	public function sellerdetails()
	{
		$this->load->model('Admin_model');
		$keyid = $this->uri->segment(4);

		$this->temp['data'] = $this->Admin_model->getnewseller($keyid);
		$this->temp['key'] = $keyid;
		$this->load->view('inc/head',$this->temp);
		$this->load->view('inc/nav-top');
		$this->load->view('inc/nav-side');
		$this->load->view('pages/sellerdetails'); 
		$this->load->view('inc/foot');

	}
	public function selleraddedaccept(){
		$this->load->model('Admin_model');
		$keyid = $this->uri->segment(6);
		if ($this->Admin_model->updatesellerstatus($keyid)){
			redirect('/pages/new/added/sellers');
		}else{
			redirect('/pages/details/new/added/sellers/' . $keyid);			
		}
	}
	public function buyerlist(){
		$this->load->model('Admin_model');	 
		$this->temp['data'] = $this->Admin_model->getallnewseller(); 
		$this->load->view('inc/head',$this->temp);
		$this->load->view('inc/nav-top');
		$this->load->view('inc/nav-side');
		$this->load->view('pages/buyerlist'); 
		$this->load->view('inc/foot');
	}
	public function messageslist(){
		$this->load->model('Admin_model');	 
		$this->temp['data'] = $this->Admin_model->getallnewseller(); 
		$this->load->view('inc/head',$this->temp);
		$this->load->view('inc/nav-top');
		$this->load->view('inc/nav-side');
		$this->load->view('pages/messageslist'); 
		$this->load->view('inc/foot');
	} 
	public function messagepanel(){
		$this->load->model('Admin_model');	 
		$this->temp['data'] = $this->Admin_model->getallnewseller(); 
		$this->load->view('inc/head',$this->temp);
		$this->load->view('inc/nav-top');
		$this->load->view('inc/nav-side');
		$this->load->view('pages/messagepanel'); 
		$this->load->view('inc/foot');
	}  
	public function logout(){
		$this->General->logout();		
		header("location: " . base_url());
	}
}	