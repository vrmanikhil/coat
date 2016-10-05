<?php

if(!defined('BASEPATH'))
	exit('Direct access of script is not allowed');

class Data_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function auth_check($data)
	{
		$result = $this->db->get_where('users', $data);
		if($result->num_rows == 1){
			$result = $result->result_array();
			return $result[0]['id'];
		}
		return 0;
	}

	public function get_user_detail($detail = '*', $user_id = null, $email = null)
	{
		($param = $user_id) || ($param = $email);
		$key = (!is_null($user_id)) ? 'id' : 'email';
		$this->db->select($detail);
		$res = $this->db->get_where('users', [$key=> $param])->result_array();
		if($detail != '*' && count(explode(",", $detail)) == 1){
			return (empty($res)) ? $res : $res[0][$detail];
		}else{
			return (empty($res)) ? $res : $res[0];
		}
	}


	public function check_duplicate($email, $mobile)
	{
		return $this->count_email($email) ? 1 : $this->count_mobile($mobile);
	}

	public function count_email($email)
	{
		$result = $this->db->get_where('users', ['email'=> $email])->num_rows();
		if($result > 0)
			return 1;
		return 0;
	}

	public function count_mobile($mobile)
	{
		$result = $this->db->get_where('users', ['mobile'=> $mobile])->num_rows();
		if($result > 0)
			return 2;
		return 0;
	}

	public function signup($details)
	{
		$this->db->insert('users', $details);
	}


}