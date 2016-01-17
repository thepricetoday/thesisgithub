<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users extends MY_Controller {
 

	public function __construct()
    {
        parent::__construct();
        $this->load->library('auth');
        $this->load->model('ProductPrice_model');
        $this->load->model('ProductPriceUpdates_model');
    }
     
    public function login ()
    {

        if ($_POST) {
            // Authenticate user credentials
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);

            $confirm = $this->auth->validateLogin($username, $password);
            // If authenticated redirect the user to the dashboard page.
            // If authentication fails, redirect the user to the login page
            // with an error notification.
            if ($confirm) {
                redirect('/users/dashboard');
            } else {
                $this->load->view('layout/header',
                    array(
                        'title' => 'Login Failed',
                        'err' => 'Invalid Username/Password :(',
                    )
                );
                $this->load->view('auth/login');
                $this->load->view('layout/footer');
            }
        } else {
            // Show the login page
            $this->load->view('layout/header',
                array(
                    'title' => 'Login',
                    'err' => '',
                )
            );
            $this->load->view('auth/login');
            $this->load->view('layout/footer');
        }
    }

    public function logout ()
    {
       // Clear session array
       $sessData = array('id' => '', 'username' => '', 'is_logged_in' => '');
       $sessData = array();

       // Remove session data
       $this->session->unset_userdata($sessData);

       // Destroy session
       $this->session->sess_destroy();

       // Redirect to the login page.
       redirect('login');
    }

   public function dashboard ()
    {
       $this->load->view('layout/header');
        $this->load->view('layout/navigation');
        $latestupdates = $this->ProductPrice_model->get_all('latestupdates_view');
        foreach ( $latestupdates as $datas => $data){
            $latest = $data->latest;
        }
       
        $price_updates = $this->ProductPriceUpdates_model->getID('upload_updates',$latest,'upload_updatesID');
        foreach ( $price_updates as $datas => $data){
            $price_updateID = $data->price_updateID;
            $province_updateID = $data->province_updateID;   
        }
        $price_update = $this->ProductPriceUpdates_model->getID('price_update',$price_updateID,'price_updateID');
        $this->load->view('dashboardheader',
             array(
                'price_update' => $price_update,
                )
             );
        $upload_updates = $this->ProductPriceUpdates_model->getID('upload_updates',$price_updateID,'price_updateID');
        foreach ( $upload_updates as $datas => $data){
            $province_updateID = $data->province_updateID;
            $province_update_view = $this->ProductPriceUpdates_model->getID('province_update_view',$province_updateID,'province_updateID');
            //var_dump($province_update_view);
             foreach ( $province_update_view as $datas => $data){
            $province_updateID = $data->province_updateID;
            $province_price_update_view = $this->ProductPriceUpdates_model->getID('province_price_update_view',$province_updateID,'province_updateID');
           // var_dump($province_price_update_view);
            $this->load->view('dashboard',
             array(
                'province_update_view'=>$province_update_view,
                'province_price_update_view'=>$province_price_update_view
                )
             );
        }
        }
       
        
        
        $this->load->view('layout/footer');
    }
}
	
