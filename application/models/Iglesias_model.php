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
}