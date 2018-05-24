<?php

class Api extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('actas_model');
        $this->load->model('users_model');
        $this->load->model('pastores_model');
    }
    public function get_congregaciones(){
        if(!$this->session->userdata('logueado')){
    		redirect(base_url().'login');	
    	}
        
        $congregaciones = $this->users_model->get_congregaciones(); 
        $data = array();
        foreach($congregaciones as $r) {
        
           $data[] = array(
                $r->id,
                $r->nombre_iglesia,
                $r->estado
           );
        }
         echo json_encode($data);
        exit();
    }

    public function get_users(){
    	if(!$this->session->userdata('logueado')){
    		redirect(base_url().'login');	
    	}

        // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));
        

          $users = $this->users_model->get_users();

          $data = array();

          foreach($users->result() as $r) {

               $data[] = array(
                    '',
                    $r->id,
                    $r->nombre_completo,
                    $r->correo,
                    $r->usuario,
                    $r->nombre_perfil,
                    $r->nombre_iglesia
               );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $users->num_rows(),
                 "recordsFiltered" => $users->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
            
    }
    public function get_congregaciones_datatable(){
        if(!$this->session->userdata('logueado')){
    		redirect(base_url().'login');	
    	}
            // Datatables Variables
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));
        
        $congregaciones = $this->users_model->get_congregaciones_datatable(); 
        $data = array();
        foreach($congregaciones->result() as $r) {
           $estado = ($r->estado == 's')? '<span class="label pull-center bg-success" style="background-color: #00a65a;" >Activo</span>':'<span class="label pull-center bg-success" style="background-color: #dd4b39;">Inactivo</span>';
           $data[] = array(
                '',
                $r->id,
                $r->nombre_iglesia,
                $estado
           );
        }
         $output = array(
                 "draw" => $draw,
                 "recordsTotal" => $congregaciones->num_rows(),
                 "recordsFiltered" => $congregaciones->num_rows(),
                 "data" => $data
            );
         echo json_encode($output);
        exit();
    }
    
    public function get_pastores(){
    	if(!$this->session->userdata('logueado')){
    		redirect(base_url().'login');	
    	}

        // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


          $users = $this->pastores_model->get_pastores();

          $data = array();
          
          foreach($users->result() as $r) {
               $foto_pastor = explode("/", $r->foto_pastor);

               $foto_pastor = ($foto_pastor[3] != '') ? "<img class='zoom' src='/uploads/foto_pastor/$foto_pastor[3]' width='90px;'>" : "No tiene foto";
               $data[] = array(
                    $r->id,
                    $foto_pastor,
                    $r->nombre_pastor,
                    $r->apellido_pastor,
                    $r->cedula,
                    $r->fcha_nac,
                    $r->nombre_iglesia
               );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $users->num_rows(),
                 "recordsFiltered" => $users->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
            
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

    public function alta_congregacion(){
        if(!$this->session->userdata('logueado')){
    		redirect(base_url().'login');	
    	}    
        $nombre_iglesia = 'IEANJESUS '. $this->input->post('nombre_iglesia');
	    $insert = array(
            'nombre_iglesia' =>strtoupper($nombre_iglesia),
            'estado' => $this->input->post('estado')
            );
            
		$this->users_model->alta_congregacion($insert);
		redirect(base_url().'dashboard/congregaciones');
	}	
	
    public function crear_usuario(){
        if(!$this->session->userdata('logueado')){
    		redirect(base_url().'login');	
    	}    
		$idprovincia = $this->input->post('provincia');
	    $insert = array(
	        'id_congregacion' =>$this->input->post('congregacion'),
            'firma' => '../archivos_ieanjesus/firma/',
            'nombre'=> $this->input->post('nombres'),
            'apellido' => $this->input->post('apellidos'),
            'usuario' => $this->input->post('usuario'),
            'passsword' => $this->input->post('password'),
            'id_perfil' =>$this->input->post('perfil'),
            'correo' =>$this->input->post('correo'),
            'nombre_completo' => $this->input->post('nombres'). $this->input->post('apellidos'),
            'foto_usuario' =>  $this->input->post('foto'),
            'estado' => $this->input->post('estado'),
            'junta' => $this->input->post('junta')
            );
		$this->users_model->alta_usuario($insert);
		redirect(base_url().'dashboard/users');
	}	
	
    public function eliminar_usuario( $id_user){
        if(!$this->session->userdata('logueado')){
    		redirect(base_url().'login');	
    	}    
		$this->users_model->eliminar_usuario($id_user);
		redirect(base_url().'dashboard/users');
	}
	
    public function modificar_usuario(){
        if(!$this->session->userdata('logueado')){
    		redirect(base_url().'login');	
    	}
    	
	    $update = array(
	        'id' => $this->input->post('id_user'),
	        'id_congregacion' =>$this->input->post('congregacion'),
            'nombre'=> $this->input->post('nombres'),
            'apellido' => $this->input->post('apellidos'),
            'usuario' => $this->input->post('usuario'),
            'id_perfil' =>$this->input->post('perfil'),
            'correo' =>$this->input->post('correo'),
            'nombre_completo' => $this->input->post('nombres'). $this->input->post('apellidos'),
            'estado' => $this->input->post('estado'),
            'junta' => $this->input->post('junta')
            );
        if ($this->input->post('password') != ''){
            $update['passsword'] = $this->input->post('password');
    	}
		$this->users_model->modificar_usuario($update);
		redirect(base_url().'dashboard/users');
	}
		
}