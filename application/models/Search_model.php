<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search_model extends CI_Model{

    public function getUser() {
        
            $this->db->select('*');
            $this->db->from('products');
            $this->db->order_by('id');
            $query = $this->db->get();
            return $query->result();        
    }

    public function searchRecord($key)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->like('Product_name',$key);
        $this->db->or_like('price',$key);
        $this->db->or_like('id',$key);
        $query = $this->db->get();

        if($query->num_rows()>0){
          return $query->result();
        }
    }

    public function filterRecord()
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->order_by('price', 'asc');
        $query = $this->db->get();

        if($query->num_rows()>0){
          return $query->result();
        }
    }
}