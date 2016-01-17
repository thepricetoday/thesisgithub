<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductPriceUpdates_model extends CI_Model {
	
	public function get_place(){
		return $this->db->get('place')->result_object();
	}
	public function get_product(){
		return $this->db->get('product')->result_object();
	}
	public function get_unitofmeasure(){
		return $this->db->get('unitofmeasure')->result_object();
	}
	public function get($data){
		return $this->db->get($data)->result_object();
	}
	public function getID($data,$ID,$field){
		$this->db->where($field, $ID);
		return $this->db->get($data)->result_object();
	}

	///Save data and return last Id inserted
    public function saveUOM($table,$data)
    {
        $this->db->insert($table, $data);

    }	
	 public function saveBatch($table,$data)
    {
        $this->db->insert_batch($table, $data);

    }
     public function saveData($table,$data)
    {
        $this->db->insert($table, $data);

    }
    public function save($table,$data)
    {
       $this->db->insert($table, $data);
       return $this->db->insert_id();
    }
    
    public function delete($table,$field,$id)
    {
        $this->db->delete($table, array($field => $id)); 

    }
    public function edit($table,$field,$id)
    {
        $this->db->delete($table, array($field => $id)); 

    }
    public function update($id,$idfield,$table,$data)
    {
       
        $this->db->where($idfield, $id);
		$this->db->update($table, $data); 

    }
    public function get_where($table,$field,$data)
    {
       	$this->db->where($field,$data); 
        return $this->db->get($table)->result_object();
		

    }

 
    
}