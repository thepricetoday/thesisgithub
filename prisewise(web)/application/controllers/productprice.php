<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

class ProductPrice extends REST_Controller {
/*
	function __construct() {

		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
		$method = $_SERVER['REQUEST_METHOD'];
		if($method == "OPTIONS") {
			die();
		}
		parent::__construct();
	} 
*/	
	public function index_options(){
		die();
	}
	public function index_get()
	{	
		
		$this->load->model('ProductPrice_model','productprice');
		$newUpdateID  = $this->productprice->get_all('latestupdates_view');
		foreach ( $newUpdateID as $datas => $data){
			$ID = $data->price_updateID;
			
		}
		var_dump($ID);
			$this->load->model('ProductPrice_model','updates');
			$data = $this->updates->get_latestupdates($ID);
			$this->response($data, 200);
	}
	
	public function index_post()
	{
		$data = $this->post();
		$this->load->model('ProductPrice_model','productprice');
		$id = $this->productprice->insert($data);
				
		$this->response(array('id' => $id), 200);
	}
	public function index_delete()
	{
		$id = (int) $this->get('id');
		$data = $this->post();
		$this->load->model('ProductPrice_model','productprice');
		if($this->productprice->delete($id))
			$this->response(array('ok' => 'Deleted'), 200);
		else
			$this->response(array('error' => 'Not deleted'), 400);
		
	}
	public function index()
	{
		$this->load->view('index');
	}
	public function place_get()
	{
		$this->load->model('ProductPrice_model','productprice');
		$newUpdateID  = $this->productprice->get_all('place');
		$this->response($newUpdateID, 200);
	}
	public function pricebyplace_get()
	{
		$id = $this->uri->segment(3);
		$this->load->model('ProductPriceUpdates_model','prices');
		$newUpdateID  = $this->prices->getMaxID('province_updateID',$id,'placeID','province_update');
		foreach ( $newUpdateID as $datas => $data){
			$ID = $data->province_updateID;
			
		}
		$data  = $this->prices->getID('province_price_update_view',$ID,'province_updateID');
		$this->response($data, 200);
	}

	public function uploaddata_get()
	{
		$id = $this->uri->segment(3);
		$this->load->model('ProductPriceUpdates_model','prices');
		$newUpdateID  = $this->prices->getMaxID('province_updateID',$id,'placeID','province_update');
		foreach ( $newUpdateID as $datas => $data){
			$ID = $data->province_updateID;
			
		}
		$latestupload  =$this->prices->getID('upload_updates',$ID,'province_updateID');
		foreach ( $latestupload as $datas => $data){
			$Id = $data->price_updateID;
			
		}
		$data  = $this->prices->getID('price_update',$Id,'price_updateID');
		$this->response($data, 200);
	}
	public function placeid_get()
	{
		$id = $this->uri->segment(3);
		$this->load->model('ProductPriceUpdates_model','prices');
		$data  = $this->prices->getID('place',$id,'ID');
		$this->response($data, 200);
	}
	
	public function addUserMobile_post()
	{
		$this->load->library('encrypt');	
		$completename = $this->post('completename');	
		$username = $this->post('username');
		$password = $this->encrypt->encode($this->post('password'));
		$email = $this->post('email');
		$contact = $this->post('contact');
		$address = $this->post('address');
		$this->load->model('ProductPriceUpdates_model','user');
		$data = $this->user->saveData('user_mobile',
			array(
                    'username'  => $username ,
                    'password' => $password,
                    'email' => $email,
                    'contact#' => $contact,
                    'address' => $address,
                    'completename' => $completename
                    )
			);
		$this->response($data, 200);
	}
	
}