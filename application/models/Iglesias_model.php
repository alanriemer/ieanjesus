<?php
class Iglesias_model extends CI_Model {

    public function __construct(){
        $this->load->database();
    }

    public function get_iglesias(){
        $query = $this->db->get('tbl_iglesia');
        return $query->result_array();
    }

    public function get_iglesia_pastor_congregacion(){
        $iglesias = $this->db->get('tbl_iglesia');
        //$pastores = $this->db->get('tbl_pastor');
        $congregaciones = $this->db->get('tbl_congregacionales');
        $arreglo = [];
        $i=0;
        foreach($congregaciones->result() as $congregacion){
            
            foreach($iglesias->result() as $iglesia){
                if($iglesia->id_congregacion == $congregacion->id){
                    $arreglo[$i] = [
                        'id'=>$iglesia->id, 
                        'direccion'=>$iglesia->direccion,
                        'congregacion'=>$congregacion->nombre_iglesia,
                        'latitud'=>$iglesia->latitud,
                        'longitud'=>$iglesia->longitud
                    ];
                    $i=$i+1;
                }
            }
        }
        return $arreglo;
    }

    public function paraGoogleMaps(){
        $query = $this->db->query("Select i.id, direccion, c.`nombre_iglesia` as congregacion, latitud, longitud
from `tbl_iglesia` i INNER JOIN `tbl_congregacionales` c on i.`id_congregacion` = c.id ");
        $result = $query->result();
        return $result;
    }
    
    public function paraGraficaTotalMiembros($id){
        $query = $this->db->query("
            Select l.id_congregacion, year(l.fcha_bautizo) as fcha_bautizo, count(*) as total
            from tbl_personal l
            where l.id_congregacion = ".$id." 
                   and l.fcha_bautizo is not NULL 
                   and l.fcha_bautizo != '0000-00-00'
            group by year(l.fcha_bautizo)
            order by l.fcha_bautizo");
    return $query->result_array();
    }

    public function get_Congregacion($id){
        $this->db->select('nombre_iglesia');
        $this->db->where('id', $id);
        $this->db->limit(1);
        $query = $this->db->get('tbl_congregacionales');
        return $query->row()->nombre_iglesia;
    }

    public function porcentajeCrecimiento($id_congregacion){
        $query = $this->db->query("Select round((miembrosEsteAnio/ miembrosAnteriorAnio), 2)  as porcentaje
                                    from (
                                    select 
                                    ( select count(ll.id_congregacion) 
                                      from tbl_personal ll 
                                      where year(ll.fcha_bautizo) = year(Now()) and ll.id_congregacion=".$id_congregacion." and ll.fcha_bautizo != '0000-00-00'
                                    ) as miembrosEsteAnio,
                                    ( Select count(l.id_congregacion) 
                                      from tbl_personal l
                                      where year(l.fcha_bautizo)= year(Now())-1  and l.id_congregacion=".$id_congregacion." and l.fcha_bautizo != '0000-00-00'
                                    ) as miembrosAnteriorAnio
                                    ) t1");
        $result = $query->row();
    return $result->porcentaje;
    }

      function getId_congregacion($id_usuario){
        $this->db->select('id_congregacion');
        $this->db->where('id', $id_usuario);
        $this->db->limit(1);
        $query = $this->db->get('tbl_usuario');
        return $query->row()->id_congregacion;
  }
}