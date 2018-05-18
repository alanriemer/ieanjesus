<?php
class Login_model extends CI_Model{
    
	public function __construct()
	{
	$this->load->database();
	}

	function checkUser($usuario, $contrasena){

	    $this->db->select('id, usuario');
	    $this->db->where('usuario', $usuario);
	    $this->db->where('passsword', $contrasena);
	    $this->db->limit(1);
	    $query = $this->db->get('tbl_usuario');
	    $autorized =  ($query->num_rows() > 0)? true : false;
	    return $autorized;
  }

	function getId($usuario, $contrasena){

	    $this->db->select('id');
	    $this->db->where('usuario', $usuario);
	    $this->db->where('passsword', $contrasena);
	    $this->db->limit(1);
	    $query = $this->db->get('tbl_usuario');
	    return $query->row()->id;;
  }

}
