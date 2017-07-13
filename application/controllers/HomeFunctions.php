2<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeFunctions extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('Home_lib','session'));
		$this->load->helper(array('url'));
		// $this->data = array();
		// $this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','color'=>'');
		// $this->data['top'] =  $this->load->view('admin/commonCode/top',$this->data,true);
		// $this->data['left'] =  $this->load->view('admin/commonCode/left',$this->data,true);
		// $this->data['bottom'] =  $this->load->view('admin/commonCode/bottom',$this->data,true);
		// $this->data['csrf_token_name'] = $this->security->get_csrf_token_name();
		// $this->data['csrf_token'] = $this->security->get_csrf_hash();
		$this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','class'=>'');
	}

	private function login($email, $password){
		$result = $this->home_lib->login($email,$password);
		if ($result){
			if($_SESSION['registrationLevel']=='1'){
				redirect(base_url('select-skills'));}
			if($_SESSION['registrationLevel']=='2'){
				redirect(base_url('skill-tests'));}
		}else{
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again12.','class'=>'error'));
			redirect(base_url());
		}
	}

	public function doLogin(){
		$email = '';
		$password = '';
		if($x = $this->input->post('email')){
			$email = $x;
		}
		if($x = $this->input->post('password')){
			$password = $x;
			$password = md5($password);
		}
		if($email == '' || $password == ''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again.','class'=>'error'));
			redirect(base_url());
		}
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again.','class'=>'error'));
			redirect(base_url());
		}
		if(!$this->home_lib->checkEMailExist($email)){
			$this->session->set_flashdata('message', array('content'=>'The entered E-Mail Address is not registered with us, try creating a New Account.','class'=>'error'));
			redirect(base_url());
		}
		else{
			if($this->home_lib->checkPasswordMatch($email, $password)){
				$this->login($email, $password);
			}
			else{
				$this->session->set_flashdata('message', array('content'=>'Password does not matches the one in our database, please Try Again.','class'=>'error'));
				redirect(base_url());
			}
		}
	}

	public function register(){
		$firstName='';
		$lastName='';
		$email='';
		$mobile='';
		$collegeID='';
		$courseID='';
		$batch='';
		$password='';
		$gender='';
		if($x = $this->input->post('firstName')){
			$firstName = $x;}
		if($x = $this->input->post('lastName')){
			$lastName = $x;}
		if($x = $this->input->post('email')){
			$email = $x;}
		if($x = $this->input->post('mobile')){
			$mobile = $x;}
		if($x = $this->input->post('collegeID')){
			$collegeID = $x;}
		if($x = $this->input->post('courseID')){
			$courseID = $x;}
		if($x = $this->input->post('batch')){
			$batch = $x;}
		if($x = $this->input->post('password')){
			$password = $x;}
		if($x = $this->input->post('gender')){
			$gender = $x;}
		$password = md5($password);
		if($firstName==''||$lastName==''||$email==''||$mobile==''||$collegeID==''||$courseID==''||$batch==''||$password==''||$gender==''){
			$this->session->set_flashdata('message', array('content'=>'Some Error Required. Please Try Again.','class'=>'error'));
			redirect(base_url());
		}
		if(filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again.','class'=>'error'));
			redirect(base_url());
		}
		if(strlen($mobile)!=10 || !ctype_digit($mobile)) {
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured, Please Try Again.','class'=>'error'));
			redirect(base_url());
		}
		if($this->home_lib->checkEMailExist($email)){
			$this->session->set_flashdata('message', array('content'=>'E-Mail Address already registered, try registering using another e-mail Address.','class'=>'error'));
			redirect(base_url());
		}
		if($this->home_lib->checkMobileExist($mobile)){
			$this->session->set_flashdata('message', array('content'=>'Mobile Number already registered, try registering using another mobile number.','class'=>'error'));
			redirect(base_url());
		}
		$data = array(
			'firstName' => $firstName,
			'lastName' => $lastName,
			'email' => $email,
			'mobile' => $mobile,
			'collegeID' => $collegeID,
			'courseID' => $courseID,
			'batch' => $batch,
			'password' => $password,
			'gender' => $gender,
			'registrationLevel' => '1'
		);
		$result = $this->home_lib->register($data);
		if($result){
			$this->login($email, $password);
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Some Error Required. Please Try Again.','class'=>'error'));
			redirect(base_url());
		}
	}

	public function logout(){
		$this->session->set_userdata('userData', false);
		$this->session->set_userdata('userData', []);
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function addUserDrivenSkill(){
		$skillID = '';
		if($x = $this->input->post('skillID')){
			$skillID = $x;
		}
		$userID = $_SESSION['userData']['userID'];
		$data = array(
			'skillID' => $skillID,
			'userID' => $userID
		);
		$testSetup = $this->home_lib->getTestSetup();
		$userDrivenSkillsAllowed = $testSetup[0]['skillsAllowed'];
		$countUserDrivenSkills = $this->home_lib->countUserDrivenSkills($_SESSION['userData']['userID']);
		if($userDrivenSkillsAllowed>$countUserDrivenSkills){
				$result = $this->home_lib->addUserDrivenSkill($data);
				if($result){
					$this->session->set_flashdata('message', array('content'=>'User Driven Skill Added Successfully.','class'=>'success'));
					redirect(base_url('select-skills'));
				}
				else{
					$this->session->set_flashdata('message', array('content'=>'Some Error Required. Please Try Again.','class'=>'error'));
					redirect(base_url('select-skills'));
				}
			}
			else{
				$this->session->set_flashdata('message', array('content'=>'You cannot add more than allowed number of User Driven Skills.','class'=>'error'));
				redirect(base_url('select-skills'));
			}
		}

	public function removeUserDrivenSkill($skillID){
		$result = $this->home_lib->removeUserDrivenSkill($skillID);
		if($result){
			$this->session->set_flashdata('message', array('content'=>'User Driven Skill Removed Successfully.','class'=>'success'));
			redirect(base_url('select-skills'));
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Some Error Required. Please Try Again.','class'=>'error'));
			redirect(base_url('select-skills'));
		}
	}

	public function goAhead(){
		$userID = $_SESSION['userData']['userID'];
		$compulsorySkills = $this->home_lib->getCompulsorySkills();
		foreach ($compulsorySkills as $key => $value){
			$data = array(
				'userID' => $userID,
				'skillID' => $value['skill_id']
			);
			$this->home_lib->addUserDrivenSkill($data);
			$this->session->set_userdata('registrationLevel', '2');
			$this->home_lib->updateRegistrationLevel($userID, '2');
		}
		redirect(base_url('skill-tests'));
	}

	public function submitTest(){
		$userID = $_SESSION['userData']['userID'];
		$result = $this->home_lib->updateRegistrationLevel($userID, '3');
		if($result){
			redirect(base_url('submit-test'));
		}
	}

	public function startTest(){
		$skill_id = $this->input->get('skillID');
		$skillStatus = $this->home_lib->getSkillStatus($skill_id, $_SESSION['userData']['userID']);
		// var_dump($skillStatus[0]['status']);die;
		if($skillStatus[0]['status']=='1'){
			redirect(base_url('test-guidelines/').$skill_id);
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured. Please Try Again.','class'=>'error'));
			redirect(base_url('skill-tests'));
		}
	}

	public function beginTest(){
		$skill_id = $this->input->get('skillID');
		$skillStatus = $this->home_lib->getSkillStatus($skill_id, $_SESSION['userData']['userID']);
		if($skillStatus[0]['status']=='1'){
			$_SESSION['userData']['currentSkill'] = $skill_id;
			$_SESSION['userData'][$skill_id]['totalScore'] = 0;
			$_SESSION['userData'][$skill_id]['skips'] = 3;
			$_SESSION['userData'][$skill_id]['skipStatus'] = 0;
			$this->home_lib->lockSkills($skill_id, $_SESSION['userData']['userID']);
			$this->home_lib->changeSkillStatusToResume($skill_id, $_SESSION['userData']['userID']);
			$level = 1;
			$_SESSION['questionData'] = $this->getQuestionDetails($level, $skill_id);
			redirect(base_url('test'));
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured. Please Try Again.','class'=>'error'));
			redirect(base_url('skill-tests'));
		}
	}

	public function nextQuestion(){
		$answer = $this->input->post('answer');
		$timeConsumed = $this->input->post('timeConsumed');
		$correct = $this->home_lib->checkAnswer($_SESSION['questionData']['question_id'], $answer);
		$score = $this->calculateScore($_SESSION['questionData']['difficulty_level'], $_SESSION['questionData']['expert_time'], $_SESSION['questionData']['timeConsumed'], $correct);
		$skill_id = $_SESSION['userData']['currentSkill'];
		$data = array(
			'userID' => $_SESSION['userData']['userID'],
			'question_id' => $_SESSION['questionData']['question_id'],
			'answer' => $answer,
			'score' => $score,
			'timeConsumed' => $timeConsumed,
			'$correct' => $correct
			);
		if($this->home_lib->updateResponse($data)){
			$this->getSkip($skill_id);
			$_SESSION['userData'][$skill_id]['totalScore'] += $score;
			$totalScore = $_SESSION['userData'][$skill_id]['totalScore'];
			$level = $this->getLevel($totalScore);
			if($totalScore > 100){
				echo "End the test.. That Guy is a Genius";
				$this->endTest($skill_id);
			}
			$_SESSION['questionData'] = $this->getQuestionDetails($level, $skill_id);
			redirect(base_url('test'));
		}else{
			$this->logout();
		}
	}

	public function getSkip($skill_id){
		if($_SESSION['userData'][$skill_id]['totalScore'] <= 30 && ($_SESSION['userData'][$skill_id]['totalScore'] + $score) <= 30 && $_SESSION['userData'][$skill_id]['skipStatus'] == 0){
			$_SESSION['userData'][$skill_id]['skipStatus'] = 1;
			$_SESSION['userData'][$skill_id]['skips'] +=1;
		}else{
			if($_SESSION['userData'][$skill_id]['totalScore'] <= 60 && ($_SESSION['userData'][$skill_id]['totalScore'] + $score) <= 60 && $_SESSION['userData'][$skill_id]['skipStatus'] == 1){
				$_SESSION['userData'][$skill_id]['skipStatus'] = 2;
				$_SESSION['userData'][$skill_id]['skips'] +=1;
			}
		}	
	}

	public function getLevel($totalScore){
		if($totalScore >=-10 || $totalScore <= 10){
			$level = 1;
		}elseif($totalScore >= 11 || $totalScore <= 20){
			$level = 2;
		}elseif($totalScore >= 21 || $totalScore <= 35){
			$level = 3;
		}elseif($totalScore >= 36 || $totalScore <= 45){
			$level = 4;
		}elseif($totalScore >= 46 || $totalScore <= 55){
			$level = 5;
		}elseif($totalScore >= 56 || $totalScore <= 75){
			$level = 6;
		}elseif($totalScore >= 76 || $totalScore <= 85){
			$level = 7;
		}else{
			$level = 8;
		}
		return $level;
	}

	public function endTest($skill_id){
		$_SESSION['questionData'] = NULL; 
		$_SESSION['userData']['currentSkill'] = NULL;
		$_SESSION['userData'][$skill_id]['totalScore'] = NULL;
		$_SESSION['userData'][$skill_id]['skips'] = NULL;
		$_SESSION['userData'][$skill_id]['skipStatus'] = NULL;
	}

	public function test(){
		 var_dump($this->getQuestionDetails('1'));
	}

<<<<<<< HEAD

	private function getQuestionDetails($questionID){
		$questionDetails = $this->home_lib->getQuestionDetails($questionID);
=======
	
	private function getQuestionDetails($level, $skillID){
		$questionDetails = $this->home_lib->getQuestionDetails($level, $skillID);
>>>>>>> 2bcd8fb11d58fcbc44fa7912f0a4a71e23b79bb3
		return $questionDetails;
	}

	private function calculateScore($difficulty_level, $expert_time, $timeConsumed, $correct){
		$score = 0;
		$score = pow(((pow(3, ($difficulty_level/2)) * ((2*$expert_time)-$timeConsumed))/(2*$expert_time)), (2/$difficulty_level));
		$score = $score * $correct;
		return $score;
	}

}
