<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
			$this->load->model('engine_model');
	}

	public function add_url(){
		$url = $_POST['url'];
		$id = $_POST['id'];
		$this->engine_model->add_user_url($id, $url);
	}

	public function remove_url(){
		$url = $_POST['value'];
		$this->engine_model->remove_user_url($url);
	}

	public function logout(){
		if (!empty( $this->input->cookie('user') )) {
			delete_cookie('user');
		}
		$this->load->view('welcome_message');
	}
}