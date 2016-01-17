<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class province extends MY_Controller{
 
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

    }

	
	 public function Updates()
    {
        $this->load->view('layout/header',['title' => 'Update Price']);
        $this->load->view('layout/navigation');
		$data = $this->ProductPriceUpdates_model->get_place();
		$dataproduct = $this->ProductPriceUpdates_model->get_product();
		$datauom = $this->ProductPriceUpdates_model->get_unitofmeasure();
        $this->load->view('product/productupdates',
        	array('place' => $data,
        		'product' =>$dataproduct,
        		'uom' =>$datauom
        		)
        	);
        $this->load->view('layout/footer');
    }
    
     public function addNewUpdate()
    {  
        // Remove form validation error message delimeter
            $date = date('y-m-d');
            $ID = $this->ProductPriceUpdates_model->save('province_update',
                array(
                    'placeID'  => $this->input->post('place', TRUE),
                    'date' => $date,
                    )
            );

            if ($this->input->post('productID')) { // returns false if no property 
                $productID  = $this->input->post('productID', TRUE);
                $price  = $this->input->post('price', TRUE);
                $unitofmeasure  = $this->input->post('unitofmeasureID', TRUE);

            foreach ($productID as $i => $a) { // need index to match other properties
                $data = array(
            'productID' =>isset($productID[$i]) ? $productID[$i] : '',
            'price' => isset($price[$i]) ? $price[$i] : '',
            'unitofmeasure' => isset($unitofmeasure[$i]) ? $unitofmeasure[$i] : '',
            'province_updateID' =>  $ID,
                );
                $this->ProductPriceUpdates_model->saveData('province_price_update',$data);
            
                }

            }
            else{
            echo 'No Data';
            }
    }
     public function viewCategory()
    {
        $id = $this->uri->segment(3);
        $data = $this->ProductPriceUpdates_model->getID('province_update_view',$id,'province_updateID');
        $this->load->view('layout/header');
        $this->load->view('layout/navigation');
        $province = $this->ProductPriceUpdates_model->get_where('province_price_update_view','province_updateID',$id);
        $product = $this->ProductPriceUpdates_model->get_product();
        $unitofmeasure = $this->ProductPriceUpdates_model->get_unitofmeasure();
        $this->load->view('product/provinceupdateview',
            array('provincedata' => $province,
                    'province' => $data,
                    'product' => $product,
                    'unitofmeasure' => $unitofmeasure,

                )
            );
        $this->load->view('layout/footer');
    }
    public function deleteProvincePriceUpdate()
    {
        $id = $this->uri->segment(3);
        $this->ProductPriceUpdates_model->delete('province_price_update','province_price_updateID',$id);
        $ID = $this->uri->segment(4);
        redirect("province/viewCategory/". $ID);
    }
	
    public function addNewUpdatePrice()
    {
         if($this->input->post('province_price_updateID') != ''){
      // Remove form validation error message delimeter
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run('productpriceupdate') === FALSE) {
            echo json_encode(
                array(
                    'notification' => 'Validation error',
                                                'error' => array(
                                            'productID'  => form_error('productID'),
                                            'price'  => form_error('price'),
                                            'unitofmeasureID'  => form_error('unitofmeasureID'),
                                            'province_updateID'  => form_error('province_updateID')
                    )
                )
            );
        } else {
            $id = $this->input->post('province_price_updateID');
            $dta = $this->ProductPriceUpdates_model->update($id,'province_price_updateID','province_price_update',
               array(
                    'productID'  => $this->input->post('productID', TRUE),
                    'price'  => $this->input->post('price', TRUE),
                    'unitofmeasure'  => $this->input->post('unitofmeasureID', TRUE),
                    'province_updateID'  => $this->input->post('province_updateID', TRUE),
                    )
            );
            
            echo ($dta) ? json_encode(array('notification' => 'Successfully Filled a Loan')) : json_encode(array('notification' => 'Failed to Filled a Loan'));
            
        }
    }
        else {
        // Remove form validation error message delimeter
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run('productpriceupdate') === FALSE) {
            echo json_encode(
                array(
                    'notification' => 'Validation error',
                                                'error' => array(
                                            'productID'  => form_error('productID'),
                                            'price'  => form_error('price'),
                                            'unitofmeasureID'  => form_error('unitofmeasureID'),
                                            'province_updateID'  => form_error('province_updateID')
                    )
                )
            );
        } else {
            $dta = $this->ProductPriceUpdates_model->saveData('province_price_update',
                array(
                    'productID'  => $this->input->post('productID', TRUE),
                    'price'  => $this->input->post('price', TRUE),
                    'unitofmeasure'  => $this->input->post('unitofmeasureID', TRUE),
                    'province_updateID'  => $this->input->post('province_updateID', TRUE),
                    )
            );
            
            echo ($dta) ? json_encode(array('notification' => 'Successfully Filled a Loan')) : json_encode(array('notification' => 'Failed to Filled a Loan'));
            
        }
    }
    }
    
    public function editProvincePriceUpdate()
    {
        $id = $this->uri->segment(3);
        $province_updateID = $this->uri->segment(4);
        $data = $this->ProductPriceUpdates_model->getID('province_update_view',$province_updateID,'province_updateID');
        $this->load->view('layout/header');
        $this->load->view('layout/navigation');
        $province = $this->ProductPriceUpdates_model->get_where('province_price_update_view','province_updateID',$province_updateID);
        $province_price_update = $this->ProductPriceUpdates_model->get_where('province_price_update_view','province_price_updateID',$id);
        $product = $this->ProductPriceUpdates_model->get_product();
        $unitofmeasure = $this->ProductPriceUpdates_model->get_unitofmeasure();
        $this->load->view('product/provinceupdateviewedit',
            array('provincedata' => $province,
                    'province' => $data,
                    'product' => $product,
                    'unitofmeasure' => $unitofmeasure,
                    'province_price_update' => $province_price_update

                )
            );
        $this->load->view('layout/footer');
    }
    public function Upload()
    {
        
            $id = $this->ProductPriceUpdates_model->save('price_update',
                array(
                    'date_start'  => $this->input->post('date_start', TRUE),
                    'date_end'  => $this->input->post('date_end', TRUE),
                    )
            );
       
            $province_updateID  = $this->input->post('province_updateID', TRUE);              
           
            foreach ( $province_updateID as $key)
                {
                        $data = array(
                            'price_updateID' =>$id,
                            'province_updateID' => $key );

                       $dta = $this->ProductPriceUpdates_model->saveData('upload_updates',$data);
                      $dtas = $this->ProductPriceUpdates_model->update($key,'province_updateID','province_update',
               array(
                    'status'  => 'Uploaded',
                    )
            );
                }

          redirect("home/latestUpdates");
            
            
        
    }
}
