<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends MY_Controller {
 
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('ProductPriceUpdates_model');
        $this->load->model('ProductPrice_model');
    }
    public function latestUpdates(){
        $this->load->view('layout/header',['title' => 'Latest Price Update']);
        $this->load->view('layout/navigation');
        $data = $this->ProductPriceUpdates_model->get_where('province_update_view','status','Pending');
            $this->load->view('product/provincelatestupdates',
            array('latest' =>$data
                )
            );
        $this->load->view('layout/footer');
     
    }
    public function Component(){
        $this->load->view('layout/header',['title' => 'Components']);
        $this->load->view('layout/navigation');
        $this->load->view('price/component');
        $this->load->view('layout/footer');
     
    }
     
}	
