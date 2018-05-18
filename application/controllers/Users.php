<?php
class Users extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        $this->load->helper('url');
    }

    public function index(){
        $data['users'] = $this->users_model->get_users();
        $this->load->view('dashboard/users/index', $data);
    }
}
