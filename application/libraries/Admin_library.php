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

	public function getQuestions()
	{
		$CI = &get_instance();
		$CI->load->model('admin_model','adminModel');
		return $CI->adminModel->getQuestions();
	}

	public function getQuestionData($questionID)
	{
		$CI = &get_instance();
		$CI->load->model('admin_model','adminModel');
		return $CI->adminModel->getQuestionData($questionID);
	}

	public function getColleges()
	{
		$CI = &get_instance();
		$CI->load->model('admin_model','adminModel');
		return $CI->adminModel->getColleges();
	}

	public function getCompulsorySkills()
	{
		$CI = &get_instance();
		$CI->load->model('admin_model','adminModel');
		return $CI->adminModel->getCompulsorySkills();
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

	public function updateQuestion($questionData, $question_id)
	{
		$CI = &get_instance();
		$CI->load->model('admin_model','adminModel');
		return $CI->adminModel->updateQuestion($questionData, $question_id);
	}

	public function addSkill($skillData)
	{
		$CI = &get_instance();
		$CI->load->model('admin_model','adminModel');
		return $CI->adminModel->addSkill($skillData);
	}

	public function addCompulsorySkill($skillData)
	{
		$CI = &get_instance();
		$CI->load->model('admin_model','adminModel');
		return $CI->adminModel->addCompulsorySkill($skillData);
	}

	public function setupTest($testData)
	{
		$CI = &get_instance();
		$CI->load->model('admin_model','adminModel');
		return $CI->adminModel->setupTest($testData);
	}

}
