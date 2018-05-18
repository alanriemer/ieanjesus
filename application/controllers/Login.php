<?php
class Login extends CI_Controller {

	public function index()
	{

        // $this->form_validation->set_rules('username', 'Username', 'required');
        // $this->form_validation->set_rules('password', 'Password', 'required',
        // array('required' => 'You must provide a %s.')
		$this->load->view('login_view');
	}
}
