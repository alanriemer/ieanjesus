<?php
class Pastores_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function get_pastores(){
        $this->db->select('*');
        $this->db->from('tbl_pastor AS A');// I use aliasing make joins easier
        $this->db->join('tbl_iglesia AS C', 'A.id_congregacion = C.id_congregacion', 'INNER');
        $this->db->join('tbl_congregacionales AS B', 'B.id = C.id_congregacion', 'INNER');
        $this->db->where('A.estado', 's');
        return $query = $this->db->get();
    }
}