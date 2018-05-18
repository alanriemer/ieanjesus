<?php
class Actas_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function get_actas(){
        $this->db->select('id, usuario ,numero_acta, iglesia, tema ,fecha_acta, hora_acta, pais,provincia,canton, tipo');
        $this->db->where('estado', 's');
        $query = $this->db->get('tbl_actas');
        
        return $query->result();
    }
    
    
    public function update_acta($id){
        $update = array(
            'iglesia' => $this->input->post('iglesia'),
            'tema' => $this->input->post('tema'),
            'fecha_acta' => $this->input->post('fecha_acta'),
            'hora_acta' => $this->input->post('hora_acta'),
            'pais' => $this->input->post('pais'),
            'provincia' => $this->input->post('provincia'),
            'canton' => $this->input->post('canton')
            );
        $this->db->where('id',$id);
        return $this->db->update('tbl_actas', $update);
    }
    
    public function alta_acta($insert){
        return $this->db->insert('tbl_actas', $insert);
    }


    public function get_provincias(){
        $this->db->select('id, id_pais, provincia');
        $query = $this->db->get('tbl_provincia');
        return $query->result();
    }
    
    public function get_provincia_by_id($id){
        $this->db->select('provincia');
        $this->db->where('id',$id);
        $query = $this->db->get('tbl_provincia');
        return $query->row()->provincia;
    }
    public function get_nroacta(){
        $this->db->select_max('id');
        $this->db->limit(1);
        $query = $this->db->get('tbl_actas');
        $result = $query->row();
        return $result->id;
    }
    
    public function get_canton($id_provincia){
        $this->db->select('id, canton');
        $this->db->where('id_provincia', $id_provincia);
        $query = $this->db->get('tbl_canton');
        
    return $query->result();
    }
    
    
}