<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
			$this->load->model('engine_model');

			
	}

	public function show($id){
		return $this->engine_model->show($id);
	}

	public function check(){
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		$res = $this->engine_model->authorization($login, $password);

		if( $res>0 ){
			if( !empty($_POST['remember']) ){
				$cookie = array(
				    'name'   => 'user',
				    'value'  => $login,
				    'expire' => '3600',
				    'path'   => '/',
				);
				$this->input->set_cookie($cookie);
			}

			$id = $this->engine_model->get_user_id($login);

			$data['id'] = $id[0]['id'];
			$data['login'] = $login;
			$data['output'] = $this->show($id[0]['id']);
			
			$this->load->view('homepage', $data);
		}
		else{
			echo 'sxal mutqi tvyalner';
		}
	}
}