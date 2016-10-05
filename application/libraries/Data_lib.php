<?php
if( ! defined('BASEPATH'))
exit('No direct script access allowed');

class Data_lib
{
	public function all_fields_filled($data, $except = [])
	{
		if(empty($data))
			return false;
		$value = true;
		foreach ($data as $key => $val) {
			if(!in_array($key, $except) && ($val == '')){
				$value = false;
				$missing = ucwords(str_replace('_', ' ', $key));
				break;
			}
		}
		if(!$value){
			$this->set_flashdata('error', $missing.' is missing', $data);
			$this->redirect_back();
		}
	}

	public function login($data)
	{
		$CI = & get_instance();
		$CI->load->model('Data_model', 'datamodel');
		$user_id = $CI->datamodel->auth_check($data);
		if($user_id){
			$college_id = $CI->datamodel->get_user_detail('college_id', $user_id);
			$session_data = ['logged_in'=> true, 'email'=> $data['email'], 
							'college_id'=> $college_id, 'user_id'=>$user_id];
			$this->set_session_data($session_data);
		}
		return $user_id;
	}

	public function set_session_data($session_data)
	{
		$CI = &get_instance();
		$CI->load->library('session');
		$CI->session->set_userdata($session_data);
	}

	public function set_flashdata($class, $content, $data = [])
	{
		$CI = &get_instance();
		$CI->load->library('session');
		$CI->session->set_flashdata('message', ['content'=>$content, 'class'=>$class, 'data_prev'=> $data]);
	}

	public function is_valid_email($email, $redirect = true)
	{
		$result = filter_var($email, FILTER_VALIDATE_EMAIL);
		if($redirect && !$result){
			$this->set_flashdata('error', 'This is not a valid email');
			$this->redirect_back();
		}
	}

	public function signup($details)
	{
		$CI = & get_instance();
		$CI->load->model('data_model', 'datamodel');
		$duplicate = $CI->datamodel->check_duplicate($details['email'], $details['mobile']);
		if(!$duplicate){
			$CI->datamodel->signup($details);
			$id = $CI->datamodel->get_user_detail('user_id', null, $details['email']);
			$session_data = ['logged_in'=> true, 'email'=> $details['email'],
							'college_id'=> $details['college_id'], 'user_id'=>$id];
			$this->set_session_data($session_data);
			return 0;
		}else{
			$field = ($duplicate - 1) ? 'mobile number' : 'email';  
			$msg = 'This '.$field.' is already registered with us.';
			$this->set_flashdata('error', $msg);
			$this->redirect_back();
		}
	}

	public function redirect_back()
	{
		if(isset($_SERVER['HTTP_REFERER']))
		{
			redirect($_SERVER['HTTP_REFERER']);
		}
		redirect(base_url());
	}

}