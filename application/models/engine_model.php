<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Engine_model extends CI_Model {
	public function authorization($login, $password){
		$query = "SELECT * FROM users WHERE name='$login' AND password='$password'";
		$result = $this->db->query($query);
		return $result->num_rows();
	}

	public function get_user_id($login){
		$query = "SELECT id FROM users WHERE name='$login'";
		$result = $this->db->query($query)->result_array();
		return $result;
	}

	public function add_user_url($id, $url){
		$check = "SELECT * FROM bookmarks WHERE url = '$url'";
		$res = $this->db->query($check);
		if( $res->num_rows()==0 ){
		$query = "INSERT INTO bookmarks (user_id, url) VALUES ('$id', '$url')";
		$this->db->query($query);
		}
	}

	public function show($id){
		$query = "SELECT * FROM bookmarks WHERE user_id = '$id'";
		$result = $this->db->query($query)->result_array();
		return $result;
	}
}
