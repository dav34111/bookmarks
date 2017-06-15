<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index(){
		$cook = $this->input->cookie('user');

		if( isset($cook) ){
			
			$newdata = array(
                   'login'  => $cook,
               );
			$this->session->set_userdata($newdata);
			
			header('Location:index.php/login/show');
			
		}
		else{
			$this->load->view('welcome_message');
		}
		
	}

}
