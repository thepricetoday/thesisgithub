<?php

class user_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    
    public function getUsersCredential ($username)
    {
        $query = $this->db->limit(1)
                          ->where('userNAME', $username)
                          ->get('user');
        
        return $query->row();
    }
}

