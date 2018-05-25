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
		$data['total_congregacion'] = $this->users_model->get_total_congregacion( $data['infouser']['id_congregacion']);
		$data['total_congregacion_hombres'] = $this->users_model->get_total_congregacion_hombres( $data['infouser']['id_congregacion']);
		$data['total_congregacion_mujeres'] = $this->users_model->get_total_congregacion_mujeres( $data['infouser']['id_congregacion']);
		$data['cumpleaneros'] = $this->users_model->get_cumpleaneros(); 	
		$data['iglesias'] = $this->iglesias_model->get_iglesias();
        $data['arreglo'] = $this->iglesias_model->get_iglesia_pastor_congregacion();
        $data['pastores'] = $this->pastores_model->get_pastores();
        $data['nombre_iglesia'] = $this->session->userdata('nombre_iglesia');
        $data['porcentaje'] = $this->iglesias_model->porcentajeCrecimiento($this->session->userdata('id_congregacion'));
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
    		$data['total_congregacion'] = $this->users_model->get_total_congregacion( $data['infouser']['id_congregacion']);
    		$data['total_congregacion_hombres'] = $this->users_model->get_total_congregacion_hombres( $data['infouser']['id_congregacion']);
		    $data['total_congregacion_mujeres'] = $this->users_model->get_total_congregacion_mujeres( $data['infouser']['id_congregacion']);
    		$data['cumpleaneros'] = $this->users_model->get_cumpleaneros(); 	
    		$data['iglesias'] = $this->iglesias_model->get_iglesias();
            $data['arreglo'] = $this->iglesias_model->get_iglesia_pastor_congregacion();
            $data['pastores'] = $this->pastores_model->get_pastores();
            $data['nombre_iglesia'] = $this->session->userdata('nombre_iglesia');
            $data['porcentaje'] = $this->iglesias_model->porcentajeCrecimiento($this->session->userdata('id_congregacion'));
            
            $data['congregaciones'] = $this->users_model->get_congregaciones(); 
            $data['perfiles'] = $this->users_model->get_perfiles(); 
    		$data['page'] = $this->load->view('dashboard/users', $data, TRUE);
            $this->load->view('dashboard/index', $data);
	}
	public function crear_usuario(){
		if(!$this->session->userdata('logueado')){
			redirect(base_url().'login');
		}
    		$data['users'] = $this->users_model->get_users();
    		$id_user = $this->session->userdata('id');
    		$data['infouser'] = $this->users_model->get_userinfo($id_user); 
    		$data['total_congregacion'] = $this->users_model->get_total_congregacion( $data['infouser']['id_congregacion']);
    		$data['total_congregacion_hombres'] = $this->users_model->get_total_congregacion_hombres( $data['infouser']['id_congregacion']);
		    $data['total_congregacion_mujeres'] = $this->users_model->get_total_congregacion_mujeres( $data['infouser']['id_congregacion']);
    		$data['cumpleaneros'] = $this->users_model->get_cumpleaneros(); 	
    		$data['iglesias'] = $this->iglesias_model->get_iglesias();
            $data['arreglo'] = $this->iglesias_model->get_iglesia_pastor_congregacion();
            $data['pastores'] = $this->pastores_model->get_pastores();
            $data['nombre_iglesia'] = $this->session->userdata('nombre_iglesia');
            $data['porcentaje'] = $this->iglesias_model->porcentajeCrecimiento($this->session->userdata('id_congregacion'));
            
            $data['congregaciones'] = $this->users_model->get_congregaciones(); 
            $data['perfiles'] = $this->users_model->get_perfiles(); 
    		$data['page'] = $this->load->view('users/alta_user', $data, TRUE);
            $this->load->view('dashboard/index', $data);
	}	
	
	public function modificar_usuario(){
		if(!$this->session->userdata('logueado')){
			redirect(base_url().'login');
		}
    		$data['users'] = $this->users_model->get_users();
    		$id_user = $this->session->userdata('id');
    		$data['infouser'] = $this->users_model->get_userinfo($id_user); 
    		$data['total_congregacion'] = $this->users_model->get_total_congregacion( $data['infouser']['id_congregacion']);
    		$data['total_congregacion_hombres'] = $this->users_model->get_total_congregacion_hombres( $data['infouser']['id_congregacion']);
		    $data['total_congregacion_mujeres'] = $this->users_model->get_total_congregacion_mujeres( $data['infouser']['id_congregacion']);
    		$data['cumpleaneros'] = $this->users_model->get_cumpleaneros(); 	
    		$data['iglesias'] = $this->iglesias_model->get_iglesias();
            $data['arreglo'] = $this->iglesias_model->get_iglesia_pastor_congregacion();
            $data['pastores'] = $this->pastores_model->get_pastores();
            $data['nombre_iglesia'] = $this->session->userdata('nombre_iglesia');
            $data['porcentaje'] = $this->iglesias_model->porcentajeCrecimiento($this->session->userdata('id_congregacion'));
            
            $data['congregaciones'] = $this->users_model->get_congregaciones(); 
            $data['perfiles'] = $this->users_model->get_perfiles(); 
            
            $id_modificar = $this->input->post('id');
            $data['user_modif'] = $this->users_model->get_userinfo($id_modificar); 
    		$data['page'] = $this->load->view('users/modificar_user', $data, TRUE);
            $this->load->view('dashboard/index', $data);
	}		
	
	

	public function pastores(){
		if(!$this->session->userdata('logueado')){
			redirect(base_url().'login');
		}
    		$data['users'] = $this->users_model->get_users();
    		$id_user = $this->session->userdata('id');
    		$data['infouser'] = $this->users_model->get_userinfo($id_user); 
    		$data['total_congregacion'] = $this->users_model->get_total_congregacion( $data['infouser']['id_congregacion']);
    		$data['total_congregacion_hombres'] = $this->users_model->get_total_congregacion_hombres( $data['infouser']['id_congregacion']);
		    $data['total_congregacion_mujeres'] = $this->users_model->get_total_congregacion_mujeres( $data['infouser']['id_congregacion']);
    		$data['cumpleaneros'] = $this->users_model->get_cumpleaneros(); 	
    		$data['iglesias'] = $this->iglesias_model->get_iglesias();
            $data['arreglo'] = $this->iglesias_model->get_iglesia_pastor_congregacion();
            $data['pastores'] = $this->pastores_model->get_pastores();
            $data['nombre_iglesia'] = $this->session->userdata('nombre_iglesia');
            $data['porcentaje'] = $this->iglesias_model->porcentajeCrecimiento($this->session->userdata('id_congregacion'));
            
            
            $data['licencia_combo'] = $this->pastores_model->get_licencias();
            $data['zona_asignada_combo'] = $this->pastores_model->get_zonas();
            $data['cargo_combo'] = $this->pastores_model->get_cargo();
            
            $data['crear_pastor'] = $this->load->view('pastores/crear_pastor', $data);
    		$data['page'] = $this->load->view('dashboard/pastores', $data, TRUE);
            $this->load->view('dashboard/index', $data);
	}	


	public function congregaciones(){
		if(!$this->session->userdata('logueado')){
			redirect(base_url().'login');
		}
    		$data['users'] = $this->users_model->get_users();
    		$id_user = $this->session->userdata('id');
    		$data['infouser'] = $this->users_model->get_userinfo($id_user); 
    		$data['total_congregacion'] = $this->users_model->get_total_congregacion( $data['infouser']['id_congregacion']);
    		$data['total_congregacion_hombres'] = $this->users_model->get_total_congregacion_hombres( $data['infouser']['id_congregacion']);
		    $data['total_congregacion_mujeres'] = $this->users_model->get_total_congregacion_mujeres( $data['infouser']['id_congregacion']);
    		$data['cumpleaneros'] = $this->users_model->get_cumpleaneros(); 	
    		$data['iglesias'] = $this->iglesias_model->get_iglesias();
            $data['arreglo'] = $this->iglesias_model->get_iglesia_pastor_congregacion();
            $data['pastores'] = $this->pastores_model->get_pastores();
            $data['nombre_iglesia'] = $this->session->userdata('nombre_iglesia');
            $data['porcentaje'] = $this->iglesias_model->porcentajeCrecimiento($this->session->userdata('id_congregacion'));
    		$data['page'] = $this->load->view('dashboard/congregaciones', $data, TRUE);
            $this->load->view('dashboard/index', $data);
	}	
















	
	public function actas(){
		if(!$this->session->userdata('logueado')){
			redirect(base_url().'login');
		}
    		$data['users'] = $this->users_model->get_users();
    		$id_user = $this->session->userdata('id');
    		$data['infouser'] = $this->users_model->get_userinfo($id_user); 
    		$data['total_congregacion'] = $this->users_model->get_total_congregacion( $data['infouser']['id_congregacion']);
    		$data['total_congregacion_hombres'] = $this->users_model->get_total_congregacion_hombres( $data['infouser']['id_congregacion']);
		    $data['total_congregacion_mujeres'] = $this->users_model->get_total_congregacion_mujeres( $data['infouser']['id_congregacion']);
    		$data['cumpleaneros'] = $this->users_model->get_cumpleaneros(); 	
    		$data['iglesias'] = $this->iglesias_model->get_iglesias();
            $data['pastores'] = $this->pastores_model->get_pastores();
            $data['actas'] = $this->actas_model->get_actas();
            $data['nombre_iglesia'] = $this->session->userdata('nombre_iglesia');
            $data['porcentaje'] = $this->iglesias_model->porcentajeCrecimiento($this->session->userdata('id_congregacion'));
            
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
	
	public function echart(){
		if(!$this->session->userdata('logueado')){
			redirect(base_url().'login');
		}
		$data['users'] = $this->users_model->get_users();
		$id_user = $this->session->userdata('id');
		$data['infouser'] = $this->users_model->get_userinfo($id_user);  
		$data['total_congregacion'] = $this->users_model->get_total_congregacion( $data['infouser']['id_congregacion']);
		$data['total_congregacion_hombres'] = $this->users_model->get_total_congregacion_hombres( $data['infouser']['id_congregacion']);
		$data['total_congregacion_mujeres'] = $this->users_model->get_total_congregacion_mujeres( $data['infouser']['id_congregacion']);
		$data['cumpleaneros'] = $this->users_model->get_cumpleaneros(); 
		$data['nombre_iglesia'] = $this->session->userdata('nombre_iglesia');
		$data['porcentaje'] = $this->iglesias_model->porcentajeCrecimiento($this->session->userdata('id_congregacion'));
		$data['id_congregacion'] = $this->session->userdata('id_congregacion');
		$data['iglesias'] = $this->iglesias_model->get_iglesias();
        $data['arreglo'] = $this->iglesias_model->get_iglesia_pastor_congregacion();
        $data['pastores'] = $this->pastores_model->get_pastores();
		$data['page'] = $this->load->view('dashboard/echart', $data, TRUE);
        $this->load->view('dashboard/index', $data);
	}
	
	public function echart_membresia(){
		if(!$this->session->userdata('logueado')){
			redirect(base_url().'login');
		}
		$data['users'] = $this->users_model->get_users();
		$id_user = $this->session->userdata('id');
		$data['infouser'] = $this->users_model->get_userinfo($id_user);  
		$data['total_congregacion'] = $this->users_model->get_total_congregacion( $data['infouser']['id_congregacion']);
		$data['total_congregacion_hombres'] = $this->users_model->get_total_congregacion_hombres( $data['infouser']['id_congregacion']);
		$data['total_congregacion_mujeres'] = $this->users_model->get_total_congregacion_mujeres( $data['infouser']['id_congregacion']);
		$data['cumpleaneros'] = $this->users_model->get_cumpleaneros(); 
		$data['nombre_iglesia'] = $this->session->userdata('nombre_iglesia');
		$data['porcentaje'] = $this->iglesias_model->porcentajeCrecimiento($this->session->userdata('id_congregacion'));
		$data['id_congregacion'] = $this->session->userdata('id_congregacion');
		$data['iglesias'] = $this->iglesias_model->get_iglesias();
        $data['arreglo'] = $this->iglesias_model->get_iglesia_pastor_congregacion();
        $data['pastores'] = $this->pastores_model->get_pastores();
		$data['page'] = $this->load->view('dashboard/echart_membresia', $data, TRUE);
        $this->load->view('dashboard/index', $data);
	}	
	
}
