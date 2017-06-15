<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
			$this->load->model('engine_model');
	}

	public function show(){
		$a = $this->session->userdata('login');
		
		$id1 = $this->engine_model->get_user_id($a);
		$id = $id1[0]['id'];

		$config['base_url'] = base_url().'index.php/login/show/';
		$config['total_rows'] = $this->db->get("bookmarks WHERE user_id='$id'")->num_rows();
		$config['per_page'] = 3; 
		
		$this->pagination->initialize($config);

		$res = $this->engine_model->show($id, $config['per_page'], $this->uri->segment(3));

			$data['id'] = $id;
			$data['login'] = $a;
			$data['output'] = $res;
		
			$this->load->view('homepage', $data);
	}

	public function check(){

		$newdata = array(
                   'login'  => $_POST['login'],
                   'password'     => $_POST['password'],
               );
		
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		$res = $this->engine_model->authorization($login, $password);

		if( $res>0 ){
			$this->session->set_userdata($newdata);

			if( !empty($_POST['remember']) ){
				$cookie = array(
				    'name'   => 'user',
				    'value'  => $login,
				    'expire' => '3600',
				    'path'   => '/',
				);
				$this->input->set_cookie($cookie);
			}
			
			// $config['base_url'] = base_url().'index.php/login/check';
			// $config['total_rows'] = 5;
			// $config['per_page'] = 3; 
			// $this->pagination->initialize($config);

			// $id1 = $this->engine_model->get_user_id($login);
			// $id = $id1[0]['id'];

			// $res = $this->engine_model->show($id, $config['per_page'], $this->uri->segment(3));

			// $data['id'] = $id;
			// $data['login'] = $login;
			// $data['output'] = $res;
		
			// $this->load->view('homepage', $data);
			$this->show();
		}
		else{
			echo '<h1 style="color:red;">Sxal mutqi tvyalner<h2>';
			header( "Refresh:3,url=http://localhost/Bookmark/" );
		}
	}

	public function reg(){
		$this->load->view('registration');
	}

	public function forget(){
		$this->load->view('forget');
	}

	public function registrate(){
		// if( isset($_POST['username']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['conf_password']) && $_POST['username']!='' && $_POST['mail']!='' && $_POST['password']!='' && $_POST['conf_password']!='' ){

		// 	if ( $_POST['password']==$_POST['conf_password'] ) {
		// 		$this->engine_model->registration($_POST['username'], $_POST['mail'], $_POST['password']);
		// 		$this->load->view('welcome_message');
		// 	}
		// 	else{
		// 		echo 'gaxtnabar@ ev hastatum@ chen hamnknum';
		// 	}
		// }
		if( isset($_POST['submit']) ){
			$this->load->model('rules_model');
			$this->form_validation->set_rules($this->rules_model->add_rules);
			$check = $this->form_validation->run();
			if ( $check==TRUE ) {
				$this->engine_model->registration($_POST['username'], $_POST['mail'], $_POST['password']);
				$this->load->view('welcome_message');
			}
			else{
				$this->load->view('registration');
			}
		}
	}

	public function restore_pass(){
		$res = $this->engine_model->mail_checker($_POST['mail']);

		if ( $res!=0 ) {
			$pass=0;
			$arr = array('a','b','c','d','e','f',
		                 'g','h','i','j','k','l',
		                 'm','n','o','p','r','s',
		                 't','u','v','x','y','z',
		                 'A','B','C','D','E','F',
		                 'G','H','I','J','K','L',
		                 'M','N','O','P','R','S',
		                 'T','U','V','X','Y','Z',
		                 '1','2','3','4','5','6',
		                 '7','8','9','0');

			for ($i=0; $i <= 8; $i++) { 
				$id = rand(0, count($arr)-1);
				$pass.=$arr[$id];
			}

			$this->engine_model->change_pass($pass, $_POST['mail']);
			//send_email('recipient', 'subject', 'message')
			echo '<h1 style="color:green;">check youre mail for new password</h1>';
			header( "Refresh:3,url=http://localhost/Bookmark/" );

		}
		else{
			echo 'nman mail chi haytnabervel';
		}
	}
}