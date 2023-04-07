<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model{

    public function getUser() {
        
            $this->db->select('*');
            $this->db->from('users');
            $this->db->order_by('indexno');
            $query = $this->db->get();
            return $query->result();        
    }

    public function searchRecord($key)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->like('username',$key);
        $this->db->or_like('email',$key);
        $this->db->or_like('indexno',$key);
        $query = $this->db->get();

        if($query->num_rows()>0){
          return $query->result();
        }
    }

    public function filterRecord()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->order_by('username', 'desc');
        $query = $this->db->get();

        if($query->num_rows()>0){
          return $query->result();
        }
    }
}