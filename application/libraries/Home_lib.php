<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_lib {

	public function login($email,$password)
	{
		$CI =& get_instance();
		$CI->load->model('home_model','homeModel');
		$result = $CI->homeModel->login($email,$password);
		$userData = $CI->homeModel->getUserDetailsFromEMail($email);
		$userData = $userData[0];
		$gender = $userData['gender'];
		if($gender=='1'){
			$profileImage=base_url('assets/website/images/users/boy.png');
		}
		if($gender=='2'){
			$profileImage=base_url('assets/website/images/users/girl.png');
		}
		if ($result) {
			$data = array(
				'loggedIn' => true,
				'email' => $email,
				'name' => $userData['firstName'],
				'userID' => $userData['userID'],
				'profileImage' => $profileImage
				);
			$CI->session->set_userdata('userData', $data);
			$CI->session->set_userdata('registrationLevel', $userData['registrationLevel']);
			// $CI->session->set_userdata('registrationLevel', $registrationLevel);
			return 1;
		}
		return 0;
	}

	public function auth(){
		$CI = & get_instance();
		$CI->load->library('session');
		$data = $CI->session->userdata('userData');
		if (isset($data['loggedIn']) && $data['loggedIn']) {
			return 1;
		}
		return 0;
	}

	public function register($data){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->register($data);
	}

	public function checkEMailExist($email){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel-> checkEMailExist($email);
	}

	public function checkMobileExist($mobile){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel-> checkMobileExist($mobile);
	}

	public function checkPasswordMatch($email, $password){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->checkPasswordMatch($email, $password);
	}

	public function getCompulsorySkills(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getCompulsorySkills();
	}

	public function getAvailableUserDrivenSkills(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getAvailableUserDrivenSkills();
	}

	public function getTestSetup(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getTestSetup();
	}

	public function getUserSkillsSelected($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getUserSkillsSelected($userID);
	}

	public function addUserDrivenSkill($data){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->addUserDrivenSkill($data);
	}

	public function removeUserDrivenSkill($skillID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->removeUserDrivenSkill($skillID);
	}

	public function countUserDrivenSkills($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->countUserDrivenSkills($userID);
	}

	public function updateRegistrationLevel($userID, $value){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->updateRegistrationLevel($userID, $value);
	}

	public function getSkillStatus($skillID, $userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getSkillStatus($skillID, $userID);
	}

	public function lockSkills($skillID, $userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->lockSkills($skillID, $userID);
	}

	public function changeSkillStatusToResume($skillID, $userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->changeSkillStatusToResume($skillID, $userID);
	}

	public function getQuestionDetails($questionID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getQuestionDetails($questionID);
	}

}