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

	public function getQuestionDetails($level, $skillID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getQuestionDetails($level, $skillID);
	}

	public function getSkillData($skill_id){
		$CI = &get_instance();
		$CI->load->model('home_model', 'homeModel');
		return $CI->homeModel->getSkillData($skill_id);
	}
	public function getInTestSkill($userID){
		$CI = &get_instance();
		$CI->load->model('home_model', 'homeModel');
		return $CI->homeModel->getInTestSkill($userID);
	}
	public function getSkips($userID, $skill_id){
		$CI = &get_instance();
		$CI->load->model('home_model', 'homeModel');
		return $CI->homeModel->getSkips($userID, $skill_id);
	}

	public function getTotalScore($userID, $skill_id){
		$CI = &get_instance();
		$CI->load->model('home_model', 'homeModel');
		return $CI->homeModel->getTotalScore($userID, $skill_id);
	}

	public function getTimeConsumed($userID, $skill_id){
		$CI = &get_instance();
		$CI->load->model('home_model', 'homeModel');
		return $CI->homeModel->getTimeConsumed($userID, $skill_id);
	}

	public function updateResponse($data){
		$CI = &get_instance();
		$CI->load->model('home_model', 'homeModel');
		return $CI->homeModel->updateResponse($data);
	}

	public function checkAnswer($questionID, $answer){
		$CI = &get_instance();
		$CI->load->model('home_model', 'homeModel');
		$correctAnswer = $CI->homeModel->getTestAnswer($questionID)[0]['answer'];
		if($answer == $correctAnswer){
			return 1;
		}else{
			return 0;
		}
	}

	public function unlockSkills($skillID, $userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->unlockSkills($skillID, $userID);
	}

	public function changeSkillStatusToComplete($skillID, $userID, $totalScore){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->changeSkillStatusToComplete($skillID, $userID, $totalScore);
	}

	public function getResponses($skillID, $userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getResponses($skillID, $userID);
	}

	public function getColleges(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getColleges();
	}

	public function getCourses(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getCourses();
	}

	public function insertSessionData($timestamp){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->insertSessionData($timestamp);
	}

	public function updateSessionData($timestamp){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->updateSessionData($timestamp);
	}

	public function checkSessionData($userID){
		$CI = &get_instance();
		$CI->load->model('home_model', 'homeModel');
		$sessionData = $CI->homeModel->getSessionData($userID);
		if(empty($sessionData)){
			return false;
		}
		if((time()-$sessionData[0]['currentTimestamp']) > 10){
			$this->deleteSessionData($userID);
			return false;
		}else{
			return true;
		} 
	}

	public function deleteSessionData($userID){
		$CI = &get_instance();
		$CI->load->model('home_model', 'homeModel');
		$CI->homeModel->deleteSessionData($userID);
	} 

	public function getSponsoredTestSetup(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getSponsoredTestSetup();
	}

	public function getSponsoredTestSettings($testID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getSponsoredTestSettings($testID);
	}

	public function getSponsoredTest(){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getSponsoredTest();
	}

	public function addUserSponsoredTest($data){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->addUserSponsoredTest($data);
	}

	public function getUserSponsoredTest($userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getUserSponsoredTest($userID);
	}

	public function getTestStatus($testID, $userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getTestStatus($testID, $userID);
	}

	public function changeTestStatusToResume($testID, $userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->changeTestStatusToResume($testID, $userID);
	}

	public function changeTestStatusToComplete($testID, $userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->changeTestStatusToComplete($testID, $userID);
	}

	public function lockTests($testID, $userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->lockTests($testID, $userID);
	}

	public function unlockTests($testID, $userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->unlockTests($testID, $userID);
	}

	public function getTestData($testID){
		$CI = &get_instance();
		$CI->load->model('home_model', 'homeModel');
		return $CI->homeModel->getTestData($testID);
	}

	public function getSponsoredQuestionDetails($testID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getSponsoredQuestionDetails($testID);
	}

	public function getInTest($userID){
		$CI = &get_instance();
		$CI->load->model('home_model', 'homeModel');
		return $CI->homeModel->getInTest($userID);
	}

	public function updateSponsoredTestResponse($data){
		$CI = &get_instance();
		$CI->load->model('home_model', 'homeModel');
		return $CI->homeModel->updateSponsoredTestResponse($data);
	}

	public function updateTime($userID, $testID, $time){
		$CI = &get_instance();
		$CI->load->model('home_model', 'homeModel');
		return $CI->homeModel->updateTime($userID, $testID, $time);
	}

	public function getSponsoredTestTimeConsumed($userID, $testID){
		$CI = &get_instance();
		$CI->load->model('home_model', 'homeModel');
		return $CI->homeModel->getSponsoredTestTimeConsumed($userID, $testID);
	}

	public function getSponsoredTestResponses($testID, $userID){
		$CI = &get_instance();
		$CI->load->model('home_model','homeModel');
		return $CI->homeModel->getSponsoredTestResponses($testID, $userID);
	}

}
