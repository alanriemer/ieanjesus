<?php
class Users_model extends CI_Model{
    
    public function __construct()
    {
        $this->load->database();
    }

    public function get_users()
    {
        $this->db->select('A.id as id,A.nombre as nombre, A.usuario as usuario ,A.apellido as apellido, A.nombre_completo as nombre_completo ,A.foto_usuario as foto_usuario,  A.correo as correo, B.nombre_iglesia as nombre_iglesia, D.nombre as nombre_perfil');
        $this->db->from('tbl_usuario AS A');
        $this->db->join('tbl_iglesia AS C', 'A.id_congregacion = C.id_congregacion', 'LEFT');
        $this->db->join('tbl_congregacionales AS B', 'B.id = C.id_congregacion', 'INNER');
        $this->db->join('tbl_perfil AS D', 'D.id = A.id_perfil', 'INNER');
        $this->db->where('A.estado', 's');
        return $this->db->get();
      
    }
    
    public function get_total_congregacion($id_congregacion)
    {
        $this->db->select('Count(*) as total');
        $this->db->from('tbl_personal');
        $this->db->where('estado', 's');
        $this->db->where('id_congregacion', $id_congregacion);
        return $this->db->get()->row();
          
    }
    public function get_userinfo($id)
    {
	    $this->db->select('A.nombre, A.apellido, A.nombre_completo ,A.foto_usuario,  A.correo, B.nombre_iglesia, D.nombre as nombre_perfil, A.id_congregacion as id_congregacion');
	    $this->db->from('tbl_usuario AS A');
        $this->db->join('tbl_iglesia AS C', 'A.id_congregacion = C.id_congregacion', 'LEFT');
        $this->db->join('tbl_congregacionales AS B', 'B.id = C.id_congregacion', 'INNER');
        $this->db->join('tbl_perfil AS D', 'D.id = A.id_perfil', 'INNER');
	    $this->db->where('A.id', $id);
	    $this->db->limit(1);
	    $query = $this->db->get();
	    foreach ($query->result() as $row){
	        $foto_pastor = explode("/", $row->foto_usuario);
            $foto_pastor = ($foto_pastor[3] != '') ? $foto_pastor[3] : "user2-160x160.jpg";
        	$results['nombre'] = $row->nombre;
       		$results['apellido'] = $row->apellido;
			$results['nombre_completo'] = $row->nombre_completo;
			$results['foto'] = $foto_pastor;
			$results['nombre_iglesia'] = $row->nombre_iglesia;
			$results['id_congregacion'] = $row->id_congregacion;
			$results['nombre_perfil'] = $row->nombre_perfil;
			$results['correo'] = $row->correo;
    	    }
	   
    	   return $results;
        
            
    }
	
	    public function get_cumpleaneros()
    {
	    $query = $this->db->query("select nombre_pastor,nombres_completos, correo, foto_pastor from tbl_pastor inner join tbl_usuario on tbl_pastor.cedula = tbl_usuario.usuario where DATE_FORMAT(fcha_nac, '%m-%d') = DATE_FORMAT(NOW(), '%m-%d') and tbl_pastor.estado = 's' and correo IS NOT NULL");
	    $result = $query->result();
    	 return $result;
        
            
    }
}
