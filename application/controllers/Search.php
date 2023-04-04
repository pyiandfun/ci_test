<?php

class Search extends CI_Controller {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('Search_model');

    }
    
    //display data with CI pagination
    public function index() {

        $this->load->library('pagination');
        $config['base_url'] = 'http://localhost/Projects/CISearch/Search/index';
        $config['total_rows'] = $this->Search_model->getUserCount();
 
        $data['records'] = $this->Search_model->getUser();
        $this->load->view('search_data', $data);
        
    }


    public function searchUser() {
        
        $key = $this->input->post('search');

        if(isset($key)){
            $data['records'] = $this->Search_model->searchRecord($key);
            $this->load->view('search_data' , $data);
        }
        else {
            redirect('Search') ;
        }
    }

    public function filterUser() {
        
        $key = $this->input->post('filter');

        if(isset($key)){
            $data['records'] = $this->Search_model->filterRecord();
            $this->load->view('search_data' , $data);
        }
        else {
            redirect('Search') ;
        }
    }
}

?>