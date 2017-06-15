<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rules_model extends CI_Model {

	public $add_rules = array(
			array(
				'field'=>'username',
				'label'=>'',
				'rules'=>'required|min_length[5]|max_length[10]|trim',
			),
			array(
				'field'=>'mail',
				'label'=>'',
				'rules'=>'required|trim|valid_email',
			),
			array(
				'field'=>'password',
				'label'=>'',
				'rules'=>'required|trim|min_length[3]|max_length[6]',
			),
			array(
				'field'=>'conf_password',
				'label'=>'',
				'rules'=>'required|trim|min_length[3]|max_length[6]|matches[password]',
			),
	);

}