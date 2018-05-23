<?php
class Ajax extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('iglesias_model');
    }

	public function index()
	{
	}

	public function iglesias()
	{

		$res['iglesias'] = $this->iglesias_model->paraGoogleMaps();
		echo json_encode($res);
	}
	public function ajaxGetTotalMiembros(){
        //$data['miembros'] = $this->iglesias_model->paraGraficaTotalMiembros();
        //echo json_encode($data);
        $id = $this->input->get('id_congregacion');
		echo json_encode($this->iglesias_model->paraGraficaTotalMiembros($id));
    }

    public function paraGraficaTotalMiembrosPorcentaje(){
        //$data['miembros'] = $this->iglesias_model->paraGraficaTotalMiembros();
        //echo json_encode($data);
        $id = $this->input->get('id_congregacion');
        echo json_encode($this->iglesias_model->paraGraficaTotalMiembrosPorcentaje($id));
    }

    public function paraGraficaNacionalidad(){
        $id = $this->input->get('id_congregacion');
        echo json_encode($this->iglesias_model->paraGraficaNacionalidad($id));
    }

    public function paraGraficaPorEdad(){
        $id = $this->input->get('id_congregacion');
        echo json_encode($this->iglesias_model->paraGraficaPorEdad($id));
    }

    public function paraGraficaGenero(){
        $id = $this->input->get('id_congregacion');
        echo json_encode($this->iglesias_model->paraGraficaGenero($id));
    }

    public function paraGraficaEtnia(){
        $id = $this->input->get('id_congregacion');
        echo json_encode($this->iglesias_model->paraGraficaEtnia($id));
    }
    
    public function text(){
    	$data['miembros'] = $this->session->userdata('nombre_iglesia');
        echo json_encode($data);
    }

}
