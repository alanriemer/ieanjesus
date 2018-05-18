<?php
class Pastores_model extends CI_Model{

    public function __construct(){
        $this->load->database();
    }

    public function get_pastores(){
        $query = $this->db->get('tbl_pastor');
        return $query->result_array();
    }
}