<?php
class Users_model extends CI_Model{
    
    public function __construct()
    {
        $this->load->database();
    }

    public function get_users()
    {
        $this->db->select('id,  nombre_completo , correo, usuario, id_congregacion');
        return $this->db->get('tbl_usuario');

            
    }
    public function get_userinfo($id)
    {
	    $this->db->select('nombre, apellido, nombre_completo ,foto_usuario,  correo');
	    $this->db->from('tbl_usuario');
	    //$this->db->join('tbl_pastor', 'tbl_pastor.cedula = tbl_usuario.usuario');
	    $this->db->where('tbl_usuario.id', $id);
	    $this->db->limit(1);
	    $query = $this->db->get();
	    foreach ($query->result() as $row){
        	 $results['nombre'] = $row->nombre;
       		 $results['apellido'] = $row->apellido;
			$results['nombre_completo'] = $row->nombre_completo;
			$results['foto'] = $row->foto_usuario;
			$results['foto'] = $row->foto_usuario;
			//$results['fecha_nacimiento'] = $row->fcha_nac;
			//$results['fecha_ingreso'] = $row->fecha_ingreso;
			$results['correo'] = $row->correo;
    	    }
	   
    	   return $results;
        
            
    }
	
	    public function get_cumpleaneros()
    {
	    $query = $this->db->query("select nombres_completos, correo from tbl_pastor inner join tbl_usuario on tbl_pastor.cedula = tbl_usuario.usuario where DATE_FORMAT(fcha_nac, '%m-%d') = DATE_FORMAT(NOW(), '%m-%d') and tbl_pastor.estado = 's' and correo IS NOT NULL");
	    $result = $query->result();
    	 return $result;
        
            
    }
}
