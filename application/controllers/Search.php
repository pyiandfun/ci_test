<?php

class Search extends CI_Controller {
    public function __construct()
    {
      parent::__construct();
      $this->load->model('Search_model');

    }
    
    public function index() {

        $config['base_url'] = 'http://localhost/Projects/CISearch/Search/index';
        $data['records'] = $this->Search_model->getProduct();
        $this->load->view('search_data', $data);
        
    }

    public function searchProduct() {
        
        $key = $this->input->post('search');

        if(isset($key) and !empty($key)){
            $data['records'] = $this->Search_model->searchRecord($key);
            $this->load->view('search_data' , $data);
        }
        else {
            redirect('Search') ;
        }
    }

    public function filterPrice() {
        
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