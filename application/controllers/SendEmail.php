<?php


class SendEmail extends CI_Controller{
    	public function __construct(){
        	parent::__construct();
        	$this->load->model('users_model');
	}
	
	public function sendemail($token){
        	if ($token != 'passphrase'){
        		redirect(base_url().'404');
        	}
	        $this->load->library('email');
		
		$config = array(
		    'protocol'  => 'smtp',
		    'smtp_host' => 'ssl://mail.ieanjesusoficial.org',
		    'smtp_port' => 465,
		    'smtp_user' => 'administrador@ieanjesusoficial.org',
		    'smtp_pass' => 'iiiith8fvlf0',
		    'mailtype'  => 'html',
		    'charset'   => 'utf-8'
		);
		$this->email->initialize($config);
		$this->email->set_mailtype("html");
		$this->email->set_newline("\r\n");
		$cumpleaneros = $this->users_model->get_cumpleaneros(); 
		foreach ($cumpleaneros as $row){ 		
			$data['pastor'] =  ucwords(strtolower($row->nombre_pastor));
			$destinatario = $row->correo;
			$htmlContent = $this->load->view('email_view', $data, TRUE);
			$this->email->to($destinatario);
			$this->email->from('administrador@ieanjesusoficial.org','administrador');
			$this->email->subject('IEANJESUS-ECUADOR le desea un feliz cumpleaños!');
			$this->email->message($htmlContent);
			$this->email->send();
		} 
		
    	}
     
}





?>