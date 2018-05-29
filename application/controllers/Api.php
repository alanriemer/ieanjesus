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
               $foto_pastor_parse = end($foto_pastor);

               $foto_pastor = ($foto_pastor[3] != '') ? "<img class='zoom img-circle' src='/uploads/foto_pastor/$foto_pastor_parse' width='70px;'>" : "No tiene foto";
               

               if ($r->estado == 'n') { 
                   $estado = '<span class="label pull-center bg-danger" style="background-color: #dd4b39;">Inactivo</span>';
               }
                              
               else if ($r->estado == 's') {  
                   $estado = '<small class="label pull-center bg-success" style="background-color: #00a65a;" >Activo</small>';
               }
               
                else if ($r->estado == 'Fallecido') {  
                   $estado = '<small class="label pull-center bg-success" style="background-color: black;" >Fallecido</small>';
               }
                else if ($r->estado == 'Destituido' or $r->estado == 'Cesado') {  
                   $estado = '<small class="label pull-center bg-success" style="background-color:  #428bca;" >'.$r->estado.'</small>';
               }
              
               else {
                   $estado = '<span class="label pull-center bg-danger" style="background-color: #dd4b39;">'. $r->estado .'</span>';
               }
               $nombre_iglesia = ($r->nombre_iglesia != '')? '<small class="label pull-center bg-info" style="background-color: #428bca;" >'.$r->nombre_iglesia.'</small>' :  '<span class="label pull-center bg-danger" style="background-color: #dd4b39;">No asignado</span>';
               $data[] = array(
                    '',
                    $r->id,
                    $foto_pastor,
                    $estado,
                    $r->nombre_pastor,
                    $r->apellido_pastor,
                    $r->cedula,
                    $r->fcha_nac,
                    $nombre_iglesia
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
    
    public function get_pastor($id_pastor){
    	if(!$this->session->userdata('logueado')){
    		redirect(base_url().'login');	
    	}

          $pastor = $this->pastores_model->get_pastor($id_pastor);

          $data = array();
          
          foreach($pastor->result() as $r) {
             $data[] = array(
                    "id"=>$r->id,
                    "nombre_pastor"=>$r->nombre_pastor,
                    "apellido_pastor"=> $r->apellido_pastor,
                    "cedula"=>$r->cedula,
                    "fecha_nacimiento"=>$r->fcha_nac,
                    "celular"=> $r->celular,
                    "cargo"=>$r->cargo,
                    "titulo"=>$r->titulo,
                    "licencia"=>$r->licencia,
                    "zona"=>$r->zona,
                    "aporte_iess"=>$r->aporte_iess,
                    "valor_iess"=>$r->valor_iess,
                    "aporte_cambia"=>$r->aporte_cambia,
                    "valor_cambia"=>$r->valor_cambia,
                    "observacion"=>$r->observacion
                    );
          }

          echo json_encode($data);
          exit();
            
    }  
    
    public function get_notifications_by_user($id_user){
    	if(!$this->session->userdata('logueado')){
    		redirect(base_url().'login');	
    	}

        $notificaciones = $this->users_model->get_notification($id_user);

        $data = array();
          
        foreach($notificaciones->result() as $r) {
             $data[] = array(
                    "id"=>$r->id,
                    "fecha_creacion"=>$r->creation_date_time,
                    "fecha_finalizacion"=> $r->view_date_time,
                    "user_id"=>$r->user_id,
                    "notificacion"=>$r->notification_text,
                    "visto"=> $r->is_viewed,
                    "tipo"=> $r->type
                    );
          }

        echo json_encode($data);
        exit();
            
    }      

    public function update_notifications_by_user($id){
    	if(!$this->session->userdata('logueado')){
    		redirect(base_url().'login');	
    	}
        $data = array(
            "user_id"=>$id,
            "is_viewed"=> "si"
            );

        $this->users_model->update_notification($data);

            
    }   


    public function crear_pastor(){
        if(!$this->session->userdata('logueado')){
    		redirect(base_url().'login');	
    	}    
        $config['upload_path'] = 'uploads/foto_pastor/';
        $config['allowed_types'] = 'gif|jpg|png';
        $path = $_FILES['foto_pastor']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $new_name = date('Ymd').rand().'.'.$ext;
        $config['file_name'] = $new_name;
    
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('foto_pastor'))
        {

            echo  $this->upload->display_errors();
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
    
           echo 'carga exitosa';
        }
	
		$foto_pastor = ($_FILES["foto_pastor"]['name'] != '')?  '/archivos_ieanjesus/foto_pastor/'.$new_name : '/archivos_ieanjesus/foto_pastor/sin_foto.jpg';
	    $insert = array(
	        
            'foto_pastor' => $foto_pastor,
            'nombre_pastor' => $this->input->post('nombre_pastor'),
            'apellido_pastor' => $this->input->post('apellido_pastor'),
            'nombres_completos' => $this->input->post('nombre_pastor'). ' ' .$this->input->post('apellido_pastor'),
            'cedula' =>$this->input->post('cedula'),
            'fcha_nac' => $this->input->post('fecha_nacimiento'),
            'celular' =>$this->input->post('celular'),
            'titulo' =>$this->input->post('titulo_profesional'),
            'cargo' =>$this->input->post('cargo_asignado'),
            'licencia' =>$this->input->post('licencia'),
            'zona' =>$this->input->post('zona_asignada'),
            'aporte_iess' =>$this->input->post('aporte_iess'),
            'valor_iess' =>$this->input->post('valor_iess'),
            'aporte_cambia' =>$this->input->post('aporte_cambia'),
            'valor_cambia' =>$this->input->post('valor_cambia'),            
            
            'observacion' =>  $this->input->post('observacion'),
            'estado' => $this->input->post('estado')
            );
		$this->pastores_model->crear_pastor($insert);
		redirect(base_url().'dashboard/pastores');
	}

    public function editar_pastor(){
            if(!$this->session->userdata('logueado')){
        		redirect(base_url().'login');	
        	}
        	
    	    $update = array(
    	        'id' => $this->input->post('modificar_id_pastor'),
                'nombre_pastor' => $this->input->post('modificar_nombre_pastor'),
                'apellido_pastor' => $this->input->post('modificar_apellido_pastor'),
                'nombres_completos' => $this->input->post('modificar_nombre_pastor'). ' ' .$this->input->post('modificar_apellido_pastor'),
                'cedula' =>$this->input->post('modificar_cedula_pastor'),
                'fcha_nac' => $this->input->post('modificar_fecha_nacimiento_pastor'),
                'celular' =>$this->input->post('modificar_celular_pastor'),
                'titulo' =>$this->input->post('modificar_titulo_pastor'),
                'cargo' =>$this->input->post('modificar_cargo_pastor'),
                'licencia' =>$this->input->post('modificar_licencia_pastor'),
                'zona' =>$this->input->post('modificar_zona_pastor'),
                'aporte_iess' =>$this->input->post('modificar_aporte_iess_pastor'),
                'valor_iess' =>$this->input->post('modificar_valor_iess_pastor'),
                'aporte_cambia' =>$this->input->post('modificar_aporte_cambia_pastor'),
                'valor_cambia' =>$this->input->post('modificar_valor_cambia_pastor'),            
                'observacion' =>  $this->input->post('modificar_observacion_pastor')
                );

    		$this->pastores_model->editar_pastor($update);
    		redirect(base_url().'dashboard/pastores');
    	}
	
    public function estado_pastor(){
        if(!$this->session->userdata('logueado')){
    		redirect(base_url().'login');	
    	}
    	
	    $update = array(
	        'id' => $this->input->post('id_pastor'),
	        'estado' =>$this->input->post('estado'),
	        'id_congregacion' =>'',
            'observacion' => $this->input->post('motivo').' - ' .$this->input->post('estado').' EN FECHA: '. $this->input->post('fecha')
            );
		$this->pastores_model->estado_pastor($update);
		redirect(base_url().'dashboard/pastores');
	}

    public function cambiar_foto_pastor(){
        if(!$this->session->userdata('logueado')){
    		redirect(base_url().'login');	
    	}
    	$config['upload_path'] = 'uploads/foto_pastor/';
        $config['allowed_types'] = 'gif|jpg|png';
        
        $path = $_FILES['foto_pastor']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $new_name = date('Ymd').rand().'.'.$ext;
        $config['file_name'] = $new_name;
    
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('foto_pastor'))
        {

            echo  $this->upload->display_errors();
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
    
           echo 'carga exitosa';
        }
	
		$foto_pastor = ($_FILES["foto_pastor"]['name'] != '')?  '/archivos_ieanjesus/foto_pastor/'.$new_name : '/archivos_ieanjesus/foto_pastor/sin_foto.jpg';
    	
	    $update = array(
	        'id' => $this->input->post('id_pastor_foto'),
	        'foto_pastor' => $foto_pastor
            );
		$this->pastores_model->cambiar_foto_pastor($update);
		redirect(base_url().'dashboard/pastores');
	}

    public function asignar_congregacion_pastor(){
        if(!$this->session->userdata('logueado')){
    		redirect(base_url().'login');	
    	}
    	
	    $update = array(
	        'id' => $this->input->post('id_pastor_congregacion'),
	        'asignado' => 'a',
            'id_congregacion' => $this->input->post('id_congregacion'),
            'observacion' => $this->input->post('observacion'),
            'estado' => 's'
            );
		$this->pastores_model->asignar_congregacion_pastor($update);
		redirect(base_url().'dashboard/pastores');
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