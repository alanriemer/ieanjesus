<?php
if (!defined('BASEPATH'))
   exit('No direct script access allowed');
class Autentication extends CI_Controller {
   public function __construct() {
      parent::__construct();
      $this->load->helper('url');
      $this->load->model('Login_model');
      $this->load->model('Iglesias_model');
   }
   public function iniciar_sesion() {
      $data = array();
      $this->load->view('autentication/login', $data);
   }
   public function iniciar_sesion_post() {
      if ($this->input->post()) {
         $nombre = $this->input->post('username');
         $contrasena = $this->input->post('password');

         $usuario   = $this->Login_model->checkUser($nombre, $contrasena);
         $usuarioId = $this->Login_model->getId($nombre, $contrasena);

         $id_congregacion = $this->Iglesias_model->getId_congregacion($usuarioId);
         $nombre_iglesia  = $this->Iglesias_model->get_Congregacion($id_congregacion);
         
         if ($usuario) {
            $usuario_data['id'] = $usuarioId;
            $usuario_data['logueado'] = TRUE;
            $usuario_data['id_congregacion'] = $id_congregacion;
            $usuario_data['nombre_iglesia'] = $nombre_iglesia;
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
