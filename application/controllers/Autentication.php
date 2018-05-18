<?php
if (!defined('BASEPATH'))
   exit('No direct script access allowed');
class Autentication extends CI_Controller {
   public function __construct() {
      parent::__construct();
	$this->load->helper('url');
   }
   public function iniciar_sesion() {
      $data = array();
      $this->load->view('autentication/login', $data);
   }
   public function iniciar_sesion_post() {
      if ($this->input->post()) {
         $nombre = $this->input->post('username');
         $contrasena = $this->input->post('password');
         $this->load->model('Login_model');
         $usuario = $this->Login_model->checkUser($nombre, $contrasena);
	      $usuarioId = $this->Login_model->getId($nombre, $contrasena);
         if ($usuario) {
            $usuario_data['id'] = $usuarioId;
            $usuario_data['logueado'] = TRUE;
            $this->session->set_userdata($usuario_data);
            redirect(base_url().'dashboard');
         } else {
            redirect(base_url().'login');
         }
      } else {
         $this->iniciar_sesion();
      }
   }
   public function logueado() {
      if($this->session->userdata('logueado')){
         $this->load->view('dashboard');
      }else{
         redirect(base_url().'login');
      }
   }
   public function cerrar_sesion() {
      $usuario_data = array(
         'logueado' => FALSE
      );
      $this->session->set_userdata($usuario_data);
      $this->session->sess_destroy();
      redirect(base_url().'login');
   }
}
