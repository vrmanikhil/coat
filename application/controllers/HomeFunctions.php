<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeFunctions extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('Home_lib','session'));
		$this->load->helper(array('url'));
		$this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','class'=>'');
	}

	private function login($email, $password){
		$result = $this->home_lib->login($email,$password);
		if ($result){
			redirect(base_url('select-skills'));
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
		$_SESSION['registrationLevel'] = 3;
		$result = $this->home_lib->updateRegistrationLevel($userID, '3');
		if($result){
			redirect(base_url('submit-test'));
		}
	}

	public function startTest(){
		$skill_id = $this->input->get('skillID');
		$skillStatus = $this->home_lib->getSkillStatus($skill_id, $_SESSION['userData']['userID']);
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
			$this->home_lib->lockSkills($skill_id, $_SESSION['userData']['userID']);
			$this->home_lib->changeSkillStatusToResume($skill_id, $_SESSION['userData']['userID']);
			$_SESSION['userData']['intest'] = false;
			$_SESSION['userData']['currentSkill'] = $skill_id;
			$_SESSION['userData']['currentSkillName'] = $this->getSkillData($skill_id)[0]['skill'];
			$_SESSION['userData'][$skill_id]['totalScore'] = 0;
			$_SESSION['userData'][$skill_id]['skips'] = 3;
			$_SESSION['userData'][$skill_id]['skipStatus'] = 0;
			$_SESSION['userData'][$skill_id]['level'] = 1;
			$testTime = $this->home_lib->getTestSetup()[0]['timeAllowed'];
			$_SESSION['userData'][$skill_id]['totalTime'] = $testTime*60;
			$_SESSION['userData'][$skill_id]['responses'] = array();
			$_SESSION['questionData'] = $this->getQuestionDetails(1, $skill_id);
			redirect(base_url('test'));
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured. Please Try Again.','class'=>'error'));
			redirect(base_url('skill-tests'));
		}
	}

	public function nextQuestion(){
		if(!$_SESSION['userData']['intest']){
			$this->session->set_flashdata('message', array('content'=>'You Need to Start or Resume a test to Answer.','class'=>'error'));
			redirect(base_url('skill-tests'));
		}
		$answer = $this->input->post('answer');
		$timeConsumed = $this->input->post('timeConsumed');
		$correct = $this->home_lib->checkAnswer($_SESSION['questionData'][0]['question_id'], $answer);
		$skill_id = $_SESSION['userData']['currentSkill'];
		$_SESSION['userData'][$skill_id]['totalTime'] = $this->input->post('totalTime');
		$score = $this->calculateScore($_SESSION['userData'][$skill_id]['level'], $_SESSION['questionData'][0]['expert_time'], $timeConsumed, $correct);
		if($correct == 1){
			$correct = '1';
		}else{
			$correct = '0';
		}
		if($answer == 0){
			$timeConsumed++;
		}
		$data = array(
			'userID' => $_SESSION['userData']['userID'],
			'questionID' => $_SESSION['questionData'][0]['question_id'],
			'answer' => $answer,
			'score' => $score,
			'timeConsumed' => $timeConsumed,
			'correct' => $correct
			);
		if($this->home_lib->updateResponse($data, $score)){
			$this->updateSkip($skill_id, $score);
			$_SESSION['userData'][$skill_id]['totalScore'] += $score;
			$totalScore = $_SESSION['userData'][$skill_id]['totalScore'];
			$level = $this->getLevel($totalScore);
			$_SESSION['userData'][$skill_id]['level'] = $level;
			if($totalScore > 100){
				$this->endTest($skill_id);
			}
			array_push($_SESSION['userData'][$skill_id]['responses'], $_SESSION['questionData'][0]['question_id']);
			$_SESSION['questionData'] = $this->getQuestionDetails($level, $skill_id);
			$testData['questionData'] = $_SESSION['questionData'][0];
				if($_SESSION['userData'][$skill_id]['skips'] > 0){
					$testData['skipsLeft'] = $_SESSION['userData'][$skill_id]['skips'];
					$testData['skips'] = true;
				}
				else{
					$testData['skipsLeft'] = 0;
					$testData['skips'] = false;
				}
				$testData['level'] = $level;
				$testData['totalScore'] = $totalScore;
				$testData['totalTime'] = $_SESSION['userData'][$skill_id]['totalTime'];
				echo json_encode($testData);
		}else{
			echo "string"; die;
			$this->logout();
		}
	}

	public function resumeTest(){
		$userID = $_SESSION['userData']['userID'];
		$_SESSION['userData']['intest'] = false;
		$currentSkill = $this->home_lib->getInTestSkill($userID)[0]['skillID'];
		$_SESSION['userData']['currentSkill'] = $currentSkill;
		$_SESSION['userData']['currentSkillName'] = $this->home_lib->getSkillData($currentSkill)[0]['skill'];
		$_SESSION['userData'][$currentSkill]['totalScore'] = $this->home_lib->getTotalScore($userID, $currentSkill)[0]['total'];
		$_SESSION['userData'][$currentSkill]['skipStatus'] = $this->getSkipStatus($_SESSION['userData'][$currentSkill]['totalScore']);
		$_SESSION['userData'][$currentSkill]['skips'] = $this->getSkips($userID, $currentSkill);
		$timeConsumed = $this->home_lib->getTimeConsumed($userID, $currentSkill)[0]['time'];
		$testTime = $this->home_lib->getTestSetup()[0]['timeAllowed'];
		$_SESSION['userData'][$currentSkill]['totalTime'] = $testTime*60 - $timeConsumed;
		$level = $this->getLevel($_SESSION['userData'][$currentSkill]['totalScore']);
		$_SESSION['userData'][$currentSkill]['level'] = $level;
		$_SESSION['userData'][$currentSkill]['responses'] = $this->home_lib->getResponses($currentSkill, $userID);
		$_SESSION['questionData'] = $this->getQuestionDetails($level, $currentSkill);
		redirect(base_url('test'));
	}

	public function getSkips($userID, $skillID){
		$skips = $this->home_lib->getSkips($userID, $skillID)[0]['skips'];
		$skipStatus = $_SESSION['userData'][$skillID]['skipStatus'];
		if($skipStatus == 0){
			$skips = 3 - $skips;
		}elseif($skipStatus == 1){
			$skips = 4 - $skips;
		}elseif($skipStatus == 2){
			$skips = 5 - $skips;
		}else{
			return false;
		}
		return $skips;
	}

	public function getSkipStatus($totalScore){
		if($totalScore>=-10 && $totalScore < 30)
			$skipStatus = 0;
		elseif($totalScore >= 30 && $totalScore < 60){
			$skipStatus = 1;
		}elseif($totalScore >= 60){
			$skipStatus = 2;
		}else{
			return false;
		}
		return $skipStatus;
	}

	public function skipQuestion(){
		if(!$_SESSION['userData']['intest'] || !isset($_SESSION['userData']['intest'])){
			$this->session->set_flashdata('message', array('content'=>'Sorry, Some Error Occured. You May resume the Test to Continue.','class'=>'error'));
			redirect(base_url('skill-tests'));
		}
		if(!$timeConsumed = $this->input->post('timeConsumed')){
			$timeConsumed = 0;
		}
		$answer = $this->input->post('answer');
		$skill_id = $_SESSION['userData']['currentSkill'];
		$_SESSION['userData'][$skill_id]['totalTime'] = $this->input->post('totalTime');
		if($_SESSION['userData'][$skill_id]['skips'] > 0){
			$_SESSION['userData'][$skill_id]['skips']--;
			$data = array(
				'userID' => $_SESSION['userData']['userID'],
				'questionID' => $_SESSION['questionData'][0]['question_id'],
				'answer' => $answer,
				'score' => 0,
				'timeConsumed' => $timeConsumed,
				'correct' => '-1'
				);
			if($this->home_lib->updateResponse($data)){	
				$totalScore = $_SESSION['userData'][$skill_id]['totalScore'];
				$level = $this->getLevel($totalScore);
				array_push($_SESSION['userData'][$skill_id]['responses'], $_SESSION['questionData'][0]['question_id']);
				$_SESSION['questionData'] = $this->getQuestionDetails($level, $skill_id);
				$testData['questionData'] = $_SESSION['questionData'][0];
				if($_SESSION['userData'][$skill_id]['skips'] > 0){
					$testData['skipsLeft'] = $_SESSION['userData'][$skill_id]['skips'];
					$testData['skips'] = true;
				}
				else{
					$testData['skipsLeft'] = 0;
					$testData['skips'] = false;
				}
				$testData['totalTime'] = $_SESSION['userData'][$skill_id]['totalTime'];
				echo json_encode($testData);
			}else{
				$this->logout();
			}
		}else{
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured Resume Test to Continue.','class'=>'Error'));
			echo 'false';
		}
	}

	private function updateSkip($skill_id, $score){
		if($_SESSION['userData'][$skill_id]['totalScore'] <= 30 && ($_SESSION['userData'][$skill_id]['totalScore'] + $score) >= 30 && $_SESSION['userData'][$skill_id]['skipStatus'] == 0){
			$_SESSION['userData'][$skill_id]['skipStatus'] = 1;
			$_SESSION['userData'][$skill_id]['skips'] +=1;
		}else{
			if($_SESSION['userData'][$skill_id]['totalScore'] <= 60 && ($_SESSION['userData'][$skill_id]['totalScore'] + $score) >= 60 && $_SESSION['userData'][$skill_id]['skipStatus'] == 1){
				$_SESSION['userData'][$skill_id]['skipStatus'] = 2;
				$_SESSION['userData'][$skill_id]['skips'] +=1;
			}
		}
	}

	private function getLevel($totalScore){
		if($totalScore < -10){
			$this->updateInfo();
			$this->session->set_flashdata('message', array('content'=>'You have Completed the Test.','class'=>'success'));
			echo 'false'; die;
		}
		if(($totalScore >=-10 && $totalScore < 10) || $totalScore == NULL){
			$level = 1;
		}
		if($totalScore >= 10 && $totalScore < 20){
			$level = 2;
		}
		if($totalScore >= 20 && $totalScore < 35){
			$level = 3;
		}
		if($totalScore >= 35 && $totalScore < 45){
			$level = 4;
		}
		if($totalScore >= 45 && $totalScore < 55){
			$level = 5;
		}
		if($totalScore >= 55 && $totalScore < 75){
			$level = 6;
		}
		if($totalScore >= 75 && $totalScore < 85){
			$level = 7;
		}
		if($totalScore > 85){
			$level = 8;
		}
		return $level;
	}

	public function endTest(){
		$this->updateInfo();
		$this->session->set_flashdata('message', array('content'=>'You have Completed the Test.','class'=>'success'));
		redirect('skill-tests');
	}

	public function updateInfo(){
		$skill_id = $_SESSION['userData']['currentSkill'];
		$totalScore = $_SESSION['userData'][$skill_id]['totalScore'];
		$_SESSION['questionData'] = NULL;
		$_SESSION['userData']['currentSkill'] = NULL;
		$_SESSION['userData']['currentSkillName'] = NULL;
		$_SESSION['userData'][$skill_id]['totalScore'] = NULL;
		$_SESSION['userData'][$skill_id]['skips'] = NULL;
		$_SESSION['userData'][$skill_id]['skipStatus'] = NULL;
		$_SESSION['userData'][$skill_id]['totalTime'] = NULL;
		$_SESSION['userData'][$skill_id]['level'] = NULL;
		$_SESSION['userData'][$skill_id]['responses'] = NULL;
		$_SESSION['userData']['intest'] = false;
		$this->home_lib->unlockSkills($skill_id, $_SESSION['userData']['userID']);
		$this->home_lib->changeSkillStatusToComplete($skill_id, $_SESSION['userData']['userID'], $totalScore);
	}
	public function test(){
		 var_dump( $_SESSION['userData'][19]['responses']);
	}

	private function getQuestionDetails($level, $skillID){
		$questionDetails = $this->home_lib->getQuestionDetails($level, $skillID);
		return $questionDetails;
	}

	private function getSkillData($skill_id){
		return $this->home_lib->getSkillData($skill_id);
	}

	private function calculateScore($difficulty_level, $expert_time, $timeConsumed, $correct){
		$score = 0;
		if($correct == 0){
			$correct = -1;
		}
		$score = pow(((pow(3, ($difficulty_level/2)) * ((2*$expert_time)-$timeConsumed))/(2*$expert_time)), (2/$difficulty_level));
		$score = $score * $correct;
		return $score;
	}

	public function hello(){
		// $difficulty_level = '1';
		// $expert_time = '10';
		// $timeConsumed = '1';
		// $correct = '1';
		// $score =  $this->calculateScore($difficulty_level, $expert_time, $timeConsumed, $correct);
		// echo $score;
	}




}
