<?php

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('users_model');
        $this->load->model('iglesias_model');
        $this->load->model('pastores_model');
        $this->load->model('actas_model');
    }

    public function index(){
	if(!$this->session->userdata('logueado')){
		redirect(base_url().'login');	
	}

        $data['users'] = $this->users_model->get_users();
		$id_user = $this->session->userdata('id');
		$data['infouser'] = $this->users_model->get_userinfo($id_user);    
		$data['cumpleaneros'] = $this->users_model->get_cumpleaneros(); 	
		$data['iglesias'] = $this->iglesias_model->get_iglesias();
        $data['arreglo'] = $this->iglesias_model->get_iglesia_pastor_congregacion();
        $data['pastores'] = $this->pastores_model->get_pastores();
		$data['page'] = $this->load->view('dashboard/home', $data, TRUE);
        $this->load->view('dashboard/index', $data);
        
    }
	public function users(){
		if(!$this->session->userdata('logueado')){
			redirect(base_url().'login');
		}
		$data['users'] = $this->users_model->get_users();
		$id_user = $this->session->userdata('id');
		$data['infouser'] = $this->users_model->get_userinfo($id_user);    
		$data['cumpleaneros'] = $this->users_model->get_cumpleaneros(); 	
		$data['iglesias'] = $this->iglesias_model->get_iglesias();
        $data['arreglo'] = $this->iglesias_model->get_iglesia_pastor_congregacion();
        $data['pastores'] = $this->pastores_model->get_pastores();
		$data['page'] = $this->load->view('dashboard/users', $data, TRUE);
        $this->load->view('dashboard/index', $data);
	}
	
	public function actas(){
		if(!$this->session->userdata('logueado')){
			redirect(base_url().'login');
		}
		$data['users'] = $this->users_model->get_users();
		$id_user = $this->session->userdata('id');
		$data['infouser'] = $this->users_model->get_userinfo($id_user);    
		$data['cumpleaneros'] = $this->users_model->get_cumpleaneros(); 	
		$data['iglesias'] = $this->iglesias_model->get_iglesias();
        $data['pastores'] = $this->pastores_model->get_pastores();
        $data['actas'] = $this->actas_model->get_actas();
        
        $data['provincias'] =  $this->actas_model->get_provincias();
        $data['nro_acta'] =  $this->actas_model->get_nroacta();
        $data['alta_acta'] = $this->load->view('actas/alta_acta', $data);
        $data['modificar_acta'] = $this->load->view('actas/modificar_acta');
        $data['enviar_acta'] = $this->load->view('actas/enviar_acta');
		
		$data['page'] = $this->load->view('dashboard/actas', $data, TRUE);
        $this->load->view('dashboard/index', $data);
	}	
		public function alta_acta(){
		   $this->actas_model->alta_acta();
		}
	
}
