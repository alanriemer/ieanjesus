<?php
class Pastores_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function get_pastores(){
        $this->db->select('A.id, A.nombre_pastor, A.foto_pastor,A.apellido_pastor, A.cedula,  A.fcha_nac, B.nombre_iglesia, A.estado');
        $this->db->from('tbl_pastor AS A');// I use aliasing make joins easier
        $this->db->join('tbl_iglesia AS C', 'A.id_congregacion = C.id_congregacion', 'left outer');
        $this->db->join('tbl_congregacionales AS B', 'B.id = C.id_congregacion', 'left outer');
        $this->db->where('A.estado !=', '');
        return $query = $this->db->get();
    }
    
    public function get_pastor($id){
        $this->db->from('tbl_pastor');
        $this->db->where('id', $id);
        return $query = $this->db->get();
    }
        
    public function get_licencias(){
        $this->db->select('id_licencia, nombre_licencia');
        $this->db->from('tbl_licencia');
        $this->db->where('estado', 's');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_zonas(){
        $this->db->select('id_zona, nombre_zona');
        $this->db->from('tbl_zona');
        $this->db->where('estado', 's');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_cargo(){
        $this->db->select('id_cargos, nombre_cargo');
        $this->db->from('tbl_cargos');
        $this->db->where('estado', 's');
        $query = $this->db->get();
        return $query->result();
    }
    public function crear_pastor($insert){
        return $this->db->insert('tbl_pastor', $insert);
    } 
    public function editar_pastor($update){
        extract($update);
        $this->db->where('id', $id);
        return $this->db->update('tbl_pastor', $update);
    }  
    public function estado_pastor($update){
        extract($update);
        $this->db->where('id', $id);
        return $this->db->update('tbl_pastor', $update);
    }
    
    public function cambiar_foto_pastor($update){
        extract($update);
        $this->db->where('id', $id);
        return $this->db->update('tbl_pastor', $update);
    }   
        
    public function asignar_congregacion_pastor($update){
        extract($update);
        $this->db->where('id', $id);
        return $this->db->update('tbl_pastor', $update);
    }   
    
    

}
