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
}