<?php

class Iglesias extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('iglesias_model');
        $this->load->helper('url');
    }

    public function ajaxGetIglesias(){
        
        $data['iglesias'] = $this->iglesias_model->get_iglesia_pastor_congregacion();
        
        echo json_encode($data);
    }
}