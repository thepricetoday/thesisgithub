<?php

$config = array(
    'unitofmeasure' => array(
        array('field' => "unitofmeasure", 'label' => "unit of measure", 'rules' => "required|trim|alpha"),
    ),
    'category' => array(
        array('field' => "category", 'label' => "category", 'rules' => "required|trim"),
    ),
     'market' => array(
        array('field' => "marketNAME", 'label' => "market", 'rules' => "required|trim"),
        array('field' => "address", 'label' => "address", 'rules' => "required|trim"),
        array('field' => "latitude", 'label' => "latitude", 'rules' => "required|trim|numeric"),
        array('field' => "longitude", 'label' => "longitude", 'rules' => "required|trim|numeric"),
        array('field' => "place", 'label' => "place", 'rules' => "required|trim"),
    ),
    'place' => array(
        array('field' => "placeNAME", 'label' => "City/Province", 'rules' => "required|trim"),
    ),
    'product' => array(
        array('field' => "name", 'label' => "name", 'rules' => "required|trim"),
        array('field' => "description", 'label' => "description", 'rules' => "required"),
        array('field' => "imageURL", 'label' => "URL", 'rules' => "required|trim"),
        array('field' => "categoryID", 'label' => "ID", 'rules' => "required|trim|numeric"),
    ),
    'user' => array(
        array('field' => "userNAME", 'label' => "Username", 'rules' => "required|trim"),
        array('field' => "userPASSWORD", 'label' => "Password", 'rules' => "required"),
        array('field' => "employeeName", 'label' => "Name", 'rules' => "required|trim"),
    ),
    'priceupdate' => array(
        array('field' => "place", 'label' => "field", 'rules' => "required|trim"),
        array('field' => "productID", 'label' => "field", 'rules' => "required"),
        array('field' => "price", 'label' => "field", 'rules' => "required|trim"),
        array('field' => "unitofmeasureID", 'label' => "field", 'rules' => "required|trim"),
    ),
    'productpriceupdate' => array(
        array('field' => "productID", 'label' => "field", 'rules' => "required"),
        array('field' => "price", 'label' => "field", 'rules' => "required|trim"),
        array('field' => "unitofmeasureID", 'label' => "field", 'rules' => "required|trim"),
        array('field' => "province_updateID", 'label' => "field", 'rules' => "required|trim"),
    ),
    'upload' => array(
        array('field' => "date_start", 'label' => "field", 'rules' => "required|trim"),
        array('field' => "date_end", 'label' => "field", 'rules' => "required|trim"),
    ),

);