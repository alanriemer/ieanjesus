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
}
