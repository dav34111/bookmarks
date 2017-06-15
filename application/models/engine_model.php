<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Engine_model extends CI_Model {
	
	public function authorization($login, $password){
		$query = "SELECT * FROM users WHERE (name='$login' OR email ='$login') AND password='$password'";
		$result = $this->db->query($query);
		return $result->num_rows();
	}

	public function get_user_id($login){
		$query = "SELECT id FROM users WHERE name='$login' OR email='$login'";
		$result = $this->db->query($query)->result_array();
		return $result;
	}

	public function add_user_url($id, $url){
		$check = "SELECT * FROM bookmarks WHERE user_id = '$id' AND url = '$url'";
		$res = $this->db->query($check);
		if( $res->num_rows()==0 ){
		$query = "INSERT INTO bookmarks (user_id, url) VALUES ('$id', '$url')";
		$this->db->query($query);
		}
	}

	public function show($id, $num, $offset){
		//$query = "SELECT * FROM bookmarks WHERE user_id = '$id'";
		$result = $this->db->get("bookmarks WHERE user_id = '$id'", $num, $offset)->result_array();
		return $result;
	}

	public function remove_user_url($url){
		$query = "DELETE FROM bookmarks WHERE url = '$url'";
		$this->db->query($query);
	}

	public function registration($name, $mail, $pass){
		$check = "SELECT * FROM users WHERE email = '$mail'";
		$res = $this->db->query($check);
			if( $res->num_rows()==0 ){
				$query = "INSERT INTO users VALUES(null, '$name', '$mail', '$pass')";
				$this->db->query($query);
			}
			else{
				echo 'ayspisi email arden ka';
			}
	}

	public function mail_checker($mail){
		$check = "SELECT * FROM users WHERE email = '$mail'";
		$res = $this->db->query($check);
		return $res->num_rows();
	}

	public function change_pass($newpass,$mail){
		$query = "UPDATE users SET password = '$newpass' WHERE email = '$mail'";
		$this->db->query($query);
	}
}
