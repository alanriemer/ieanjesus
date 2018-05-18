<?php

class Api extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('actas_model');
        $this->load->model('users_model');
    }

    public function get_provincias(){
    	if(!$this->session->userdata('logueado')){
    		redirect(base_url().'login');	
    	}
            echo json_encode($this->actas_model->get_provincias(1));
            
    }

    public function get_canton(){
    	if(!$this->session->userdata('logueado')){
    		redirect(base_url().'login');	
    	}
    	$provincia = $this->input->post('id_provincia');
        echo json_encode($this->actas_model->get_canton($provincia)); 
        
    }
    public function get_provincia_by_id($id){
    	if(!$this->session->userdata('logueado')){
    		redirect(base_url().'login');	
    	}
        $result = $this->actas_model->get_provincia_by_id($id); 
        return $result;    
    }
    
    public function alta_acta(){
    if(!$this->session->userdata('logueado')){
		redirect(base_url().'login');	
	}    
	    $id_user = $this->session->userdata('id');
		$infouser = $this->users_model->get_userinfo($id_user);  
		$idprovincia = $this->input->post('provincia');
	    $insert = array(
	        'numero_acta' =>$this->input->post('numero_acta'),
            'tema' =>$this->input->post('tema'),
            'tipo'=> $this->input->post('tipo'),
            'fecha_acta' => $this->input->post('fecha_acta'),
            'hora_acta' => '00:00',
            'pais' => $this-> input->post('pais'),
            'provincia' =>$this->get_provincia_by_id($idprovincia),
            'canton' =>$this->input->post('canton'),
            'direccion' => $this->input->post('direccion'),
            'cuerpo' =>  $this->input->post('cuerpo'),
            'generado' => 'si',
            'elemento' => 'procesado',
           
            'usuario' => $infouser['nombre_completo'],
            'estado' => 's'
            
           
            );
		$this->actas_model->alta_acta($insert);
		redirect(base_url().'dashboard/actas');
	}
	
}