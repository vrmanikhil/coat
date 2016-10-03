<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_library {

	// public function login($username,$password)
	// {
	// 	$CI =& get_instance();
	// 	$CI->load->model('data_model','home');
	// 	$result = $CI->home->login($username,$password);
	// 	if ($result) {
	// 		$data = array(
	// 			'loggedIn' => true,
	// 			'username' => $username
	// 			);
	// 		$CI->session->set_userdata('user_data', $data);
	// 		return 1;
	// 	}
	// 	return 0;
	// }
	//
	// public function auth()
	// {
	// 	$CI = & get_instance();
	// 	$CI->load->library('session');
	// 	$data = $CI->session->userdata('user_data');
	// 	if (isset($data['loggedIn']) && $data['loggedIn']) {
	// 		return 1;
	// 	}
	// 	return 0;
	// }

	public function getSkills()
	{
		$CI = &get_instance();
		$CI->load->model('admin_model','adminModel');
		return $CI->adminModel->getSkills();
	}

	public function getTestSetupDetails()
	{
		$CI = &get_instance();
		$CI->load->model('admin_model','adminModel');
		return $CI->adminModel->getTestSetupDetails();
	}

	public function addQuestion($questionData)
	{
		$CI = &get_instance();
		$CI->load->model('admin_model','adminModel');
		return $CI->adminModel->addQuestion($questionData);
	}

}
