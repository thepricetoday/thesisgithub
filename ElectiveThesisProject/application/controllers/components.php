<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class components extends MY_Controller {
 
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
	public function categories()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/navigation');
        $category = $this->ProductPriceUpdates_model->get('category');
		$this->load->view('components/category',
            array('category' => $category
                )
            );
        $this->load->view('layout/success');
		$this->load->view('layout/footer');
	}
    public function addNewCategory()
    {
        if($this->input->post('categoryid') != ''){
      // Remove form validation error message delimeter
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run('category') === FALSE) {
            echo json_encode(
                array(
                    'notification' => 'Validation error',
                                                'error' => array(
                                            'category'  => form_error('category')
                    )
                )
            );
        } else {
            $id = $this->input->post('categoryid');
            $dta = $this->ProductPriceUpdates_model->update($id,'categoryID','category',
                array(
                    'categoryNAME'  => $this->input->post('category', TRUE),
                    )
            );
            
            echo ($dta) ? json_encode(array('notification' => 'Successfully Filled a Loan')) : json_encode(array('notification' => 'Failed to Filled a Loan'));
            
        }
    }
        else {
        // Remove form validation error message delimeter
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run('category') === FALSE) {
            echo json_encode(
                array(
                    'notification' => 'Validation error',
                                                'error' => array(
                                            'category'  => form_error('category')
                    )
                )
            );
        } else {
            $dta = $this->ProductPriceUpdates_model->saveData('category',
                array(
                    'categoryNAME'  => $this->input->post('category', TRUE),
                    )
            );
            
            echo ($dta) ? json_encode(array('notification' => 'Successfully Filled a Loan')) : json_encode(array('notification' => 'Failed to Filled a Loan'));
            
        }
    }
    }
    public function deleteCategory()
    {
        $id = $this->uri->segment(3);
        $this->ProductPriceUpdates_model->delete('category','categoryID',$id);
        $this->load->view('layout/success');
        redirect("components/categories");

    }
    public function editCategory()
    {
        $id = $this->uri->segment(3);
        $data = $this->ProductPriceUpdates_model->getID('category',$id,'categoryID');
        $this->load->view('layout/header');
        $this->load->view('layout/navigation');
        $category = $this->ProductPriceUpdates_model->get('category');
        $this->load->view('components/categoryedit',
            array('category' => $category,
                    'categorydata' => $data
                )
            );
        $this->load->view('layout/footer');
    }
	 

    //Markets
    public function markets()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navigation');
        $marketdata = $this->ProductPriceUpdates_model->get('market_view');
        $placedata = $this->ProductPriceUpdates_model->get('place');
        $this->load->view('components/market',
            array('marketdata' => $marketdata,
                    'placedata' => $placedata
                )
            );
        $this->load->view('layout/footer');
    }
    public function addNewMarket()
    {
         if($this->input->post('marketID') != ''){
      // Remove form validation error message delimeter
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run('market') === FALSE) {
            echo json_encode(
                array(
                    'notification' => 'Validation error',
                                                'error' => array(
                                            'marketNAME'  => form_error('marketNAME'),
                                            'address'  => form_error('address'),
                                            'longitude'  => form_error('longitude'),
                                            'latitude'  => form_error('latitude'),
                                            'placeID'  => form_error('placeID'),
                    )
                )
            );
        } else {
            $id = $this->input->post('marketID');
            $dta = $this->ProductPriceUpdates_model->update($id,'marketID','market',
                array(
                    'marketNAME'  => $this->input->post('marketNAME', TRUE),
                    'Address'  => $this->input->post('address', TRUE),
                    'longitude'  => $this->input->post('longitude', TRUE),
                    'latitude'  => $this->input->post('latitude', TRUE),
                    'placeID'  => $this->input->post('place', TRUE),
                    )
            );
            
            echo ($dta) ? json_encode(array('notification' => 'Successfully Filled a Loan')) : json_encode(array('notification' => 'Failed to Filled a Loan'));
            
        }
    } else {
        
        // Remove form validation error message delimeter
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run('market') === FALSE) {
            echo json_encode(
                array(
                    'notification' => 'Validation error',
                                                'error' => array(
                                            'marketNAME'  => form_error('marketNAME'),
                                            'address'  => form_error('address'),
                                            'longitude'  => form_error('longitude'),
                                            'latitude'  => form_error('latitude'),
                                            'placeID'  => form_error('placeID'),
                    )
                )
            );
        } else {
            $dta = $this->ProductPriceUpdates_model->saveData('market',
                array(
                    'marketNAME'  => $this->input->post('marketNAME', TRUE),
                    'Address'  => $this->input->post('address', TRUE),
                    'longitude'  => $this->input->post('longitude', TRUE),
                    'latitude'  => $this->input->post('latitude', TRUE),
                    'placeID'  => $this->input->post('place', TRUE),
                    )
            );
            
            echo ($dta) ? json_encode(array('notification' => 'Successfully Filled a Loan')) : json_encode(array('notification' => 'Failed to Filled a Loan'));
            
        }
       
        
}
    }

    public function deleteMarket()
    {
        $id = $this->uri->segment(3);
        $this->ProductPriceUpdates_model->delete('market','marketID',$id);
        redirect("components/markets");

    }

    public function editMarket()
    {
        $id = $this->uri->segment(3);
        $data = $this->ProductPriceUpdates_model->getID('market',$id,'marketID');
        $this->load->view('layout/header');
        $this->load->view('layout/navigation');
        $market = $this->ProductPriceUpdates_model->get('market_view');
        $placedata = $this->ProductPriceUpdates_model->get('place');
        $this->load->view('components/marketedit',
            array('marketdata' => $market,
                    'marketsdata' => $data,
                    'placedata' => $placedata
                )
            );
        $this->load->view('layout/footer');
    }



     //Place
    public function places()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navigation');
        $placedata = $this->ProductPriceUpdates_model->get('place');
        $this->load->view('components/place',
            array('placedata' => $placedata
                )
            );
        $this->load->view('layout/footer');
    }
    public function addNewPlace()
    {
      if($this->input->post('ID') != ''){
      // Remove form validation error message delimeter
        // Remove form validation error message delimeter
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run('place') === FALSE) {
            echo json_encode(
                array(
                    'notification' => 'Validation error',
                                                'error' => array(
                                            'placeNAME'  => form_error('placeNAME'),
                    )
                )
            );
        } else {
           $id = $this->input->post('ID');
            $dta = $this->ProductPriceUpdates_model->update($id,'ID','place',
                 array(
                    'placeNAME'  => $this->input->post('placeNAME', TRUE),
                    )
            );
            
            echo ($dta) ? json_encode(array('notification' => 'Successfully Filled a Loan')) : json_encode(array('notification' => 'Failed to Filled a Loan'));
            
        }
    } else {
        
        // Remove form validation error message delimeter
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run('place') === FALSE) {
            echo json_encode(
                array(
                    'notification' => 'Validation error',
                                                'error' => array(
                                            'placeNAME'  => form_error('placeNAME'),
                    )
                )
            );
        } else {
            $dta = $this->ProductPriceUpdates_model->saveData('place',
                array(
                    'placeNAME'  => $this->input->post('placeNAME', TRUE),
                    )
            );
            
            echo ($dta) ? json_encode(array('notification' => 'Successfully Filled a Loan')) : json_encode(array('notification' => 'Failed to Filled a Loan'));
           } 
        }
    }
    public function deletePlace()
    {
        $id = $this->uri->segment(3);
        $this->ProductPriceUpdates_model->delete('place','ID',$id);
        redirect("components/places ");

    }
    public function editPlace()
    {
        $id = $this->uri->segment(3);
        $data = $this->ProductPriceUpdates_model->getID('place',$id,'ID');
        $this->load->view('layout/header');
        $this->load->view('layout/navigation');
        $placedata = $this->ProductPriceUpdates_model->get('place');
        $this->load->view('components/placeedit',
            array('place' => $placedata,
                    'placedata' => $data
                )
            );
        $this->load->view('layout/footer');
    }



    //Products
     public function products()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navigation');
        $productdata = $this->ProductPriceUpdates_model->get('product_view_category');
        $category = $this->ProductPriceUpdates_model->get('category');
        $this->load->view('components/product',
            array('productdata' => $productdata,
                'categorydata' => $category
                )
            );
        $this->load->view('layout/footer');
    }
    public function addNewProduct()
    {
      if($this->input->post('productID') != ''){
      // Remove form validation error message delimeter
        // Remove form validation error message delimeter
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run('product') === FALSE) {
            echo json_encode(
                array(
                    'notification' => 'Validation error',
                                                'error' => array(
                                            'name'  => form_error('name'),
                                            'description'  => form_error('description'),
                                            'imageURL'  => form_error('imageURL'),
                                            'categoryID'  => form_error('categoryID'),
                    )
                )
            );
        } else {
             $id = $this->input->post('productID');
            $dta = $this->ProductPriceUpdates_model->update($id,'productID','product',
                array(
                    'name'  => $this->input->post('name', TRUE),
                    'description'  => $this->input->post('description', TRUE),
                    'imageURL'  => $this->input->post('imageURL', TRUE),
                    'categoryID'  => $this->input->post('categoryID', TRUE),
                    )
            );
            
            echo ($dta) ? json_encode(array('notification' => 'Successfully Filled a Loan')) : json_encode(array('notification' => 'Failed to Filled a Loan'));
           } 
    } else {
        
        // Remove form validation error message delimeter
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run('product') === FALSE) {
            echo json_encode(
                array(
                    'notification' => 'Validation error',
                                                'error' => array(
                                            'name'  => form_error('name'),
                                            'description'  => form_error('description'),
                                            'imageURL'  => form_error('imageURL'),
                                            'categoryID'  => form_error('categoryID'),
                    )
                )
            );
        } else {
            $dta = $this->ProductPriceUpdates_model->saveData('product',
                array(
                    'name'  => $this->input->post('name', TRUE),
                    'description'  => $this->input->post('description', TRUE),
                    'imageURL'  => $this->input->post('imageURL', TRUE),
                    'categoryID'  => $this->input->post('categoryID', TRUE),
                    )
            );
            
            echo ($dta) ? json_encode(array('notification' => 'Successfully Filled a Loan')) : json_encode(array('notification' => 'Failed to Filled a Loan'));
           } 
        }
    }

    public function deleteProduct()
    {
        $id = $this->uri->segment(3);
        $this->ProductPriceUpdates_model->delete('product','productID',$id);
        redirect("components/products ");

    }
    public function editProduct()
    {
        $id = $this->uri->segment(3);
        $data = $this->ProductPriceUpdates_model->getID('product_view_category',$id,'productID');
        $this->load->view('layout/header');
        $this->load->view('layout/navigation');
        $productdata = $this->ProductPriceUpdates_model->get('product_view_category');
        $category = $this->ProductPriceUpdates_model->get('category');
        $this->load->view('components/productedit',
            array('productdata' => $productdata,
                'categorydata' => $category,
                'product' =>$data
                )
            );
        $this->load->view('layout/footer');
    }
     public function uom()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navigation');
        $uomdata = $this->ProductPriceUpdates_model->get('unitofmeasure');
        $this->load->view('components/uom',
            array('uomdata' => $uomdata,
                )
            );
        $this->load->view('layout/footer');
        
    }
    public function addNewUOM()
    {
      if($this->input->post('unitofmeasureID') != ''){
      // Remove form validation error message delimeter
        // Remove form validation error message delimeter
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run('unitofmeasure') === FALSE) {
            echo json_encode(
                array(
                    'notification' => 'Validation error',
                                               'error' => array(
                                            'unitofmeasure'     => form_error('unitofmeasure')
                    )
                )
            );
        } else {
             $id = $this->input->post('unitofmeasureID');
            $dta = $this->ProductPriceUpdates_model->update($id,'unitofmeasureID','unitofmeasure',
                array(
                    'unitofmeasure'  => $this->input->post('unitofmeasure', TRUE),
                    )
            );
            
            echo ($dta) ? json_encode(array('notification' => 'Successfully Filled a Loan')) : json_encode(array('notification' => 'Failed to Filled a Loan'));
           } 
    } else {
        
       $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run('unitofmeasure') === FALSE) {
            echo json_encode(
                array(
                    'notification' => 'Validation error',
                                                'error' => array(
                                            'unitofmeasure'     => form_error('unitofmeasure')
                    )
                )
            );
        } else {
            $dta = $this->ProductPriceUpdates_model->saveData('unitofmeasure',
                array(
                    'unitofmeasure'  => $this->input->post('unitofmeasure', TRUE),
                    )
            );
            
            echo ($dta) ? json_encode(array('notification' => 'Successfully Filled a Loan')) : json_encode(array('notification' => 'Failed to Filled a Loan'));
           } 
        }
    }
    public function deleteUOM()
    {
        $id = $this->uri->segment(3);
        $this->ProductPriceUpdates_model->delete('unitofmeasure','unitofmeasureID',$id);
        redirect("components/uom ");

    }
    public function editUOM()
    {
        $id = $this->uri->segment(3);
        $data = $this->ProductPriceUpdates_model->getID('unitofmeasure',$id,'unitofmeasureID');
        $this->load->view('layout/header');
        $this->load->view('layout/navigation');
        $uomdata = $this->ProductPriceUpdates_model->get('unitofmeasure');
        $this->load->view('components/uomedit',
            array('uomdata' => $uomdata,
                'uom' =>$data
                )
            );
        $this->load->view('layout/footer');
    }
    public function users(){
        $this->load->view('layout/header',['title' => 'Add User']);
        $this->load->view('layout/navigation');
        $user = $this->ProductPriceUpdates_model->get('user');
        $this->load->view('users/user',
            array('userdata' => $user
                )
            );
        $this->load->view('layout/footer');
    }   
     public function addNewUser(){
        $this->form_validation->set_error_delimiters('', '');

        if ($this->form_validation->run('user') === FALSE) {
            echo json_encode(
                array(
                    'notification' => 'Validation error',
                                                'error' => array(
                                            'userNAME'  => form_error('userNAME'),
                                            'userPASSWORD'  => form_error('userPASSWORD'),
                                            'employeeName'  => form_error('employeeName')
                    )
                )
            );
        } else {
            $this->load->library('encrypt');
            $Pass = $this->encrypt->encode($this->input->post('userPASSWORD'));
            $dta = $this->ProductPriceUpdates_model->saveData('user',
                array(
                    'userNAME'  => $this->input->post('userNAME', TRUE),
                    'userPASSWORD'  => $Pass,
                    'employeeName'  => $this->input->post('employeeName', TRUE),
                     )
            );
            
            echo ($dta) ? json_encode(array('notification' => 'Successfully Filled a Loan')) : json_encode(array('notification' => 'Failed to Filled a Loan'));
            
        }
    }
    public function deleteUser()
    {
        $id = $this->uri->segment(3);
        $this->ProductPriceUpdates_model->delete('user','userID',$id);
        $this->load->view('layout/success');
        redirect("components/users");

    }
     public function editUser()
    {
        $id = $this->uri->segment(3);
        $data = $this->ProductPriceUpdates_model->getID('user',$id,'userID');
        $this->load->view('layout/header');
        $this->load->view('layout/navigation');
        $user = $this->ProductPriceUpdates_model->get('user');
        $this->load->view('users/useredit',
            array('userdata' => $user,
                'user' => $data
                )
            );
        $this->load->view('layout/footer');
    }  
}	
