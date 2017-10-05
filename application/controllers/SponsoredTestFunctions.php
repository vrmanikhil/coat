<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SponsoredTestFunctions extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('Home_lib','session'));
		$this->load->helper(array('url'));
		$this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','class'=>'');
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
		$testID = $this->input->get('testID');
		$testStatus = $this->home_lib->getTestStatus($testID, $_SESSION['userData']['userID']);
		if($testStatus[0]['status']=='1'){
			redirect(base_url('sponsored-test-guidelines/').$testID);
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured. Please Try Again.','class'=>'error'));
			redirect(base_url('skill-tests'));
		}
	}

	public function beginTest(){
		$testID = $this->input->get('testID');
		$testStatus = $this->home_lib->getTestStatus($testID, $_SESSION['userData']['userID']);
		if($testStatus[0]['status']=='1'){
			$this->home_lib->lockSkills(0, $_SESSION['userData']['userID']);
			$this->home_lib->changeTestStatusToResume($testID, $_SESSION['userData']['userID']);
			$this->home_lib->lockTests($testID,$_SESSION['userData']['userID']);
			$_SESSION['userData']['intest'] = false;
			$_SESSION['userData']['currentTest'] = $testID;
			$testdata = $this->getTestData($testID)[0];
			$_SESSION['userData']['currentTestName'] =$testdata['name'];
			$testTime = $this->home_lib->getSponsoredTestSettings($testID)[0]['timeBound'];
			$_SESSION['userData'][$testID]['timeBound'] = $testTime;
			$testTime = $this->home_lib->getSponsoredTestSettings($testID)[0]['time'];
			$_SESSION['userData'][$testID]['totalTime'] = $testTime*60;
			$_SESSION['userData'][$testID]['responses'] = array();
			$_SESSION['questionData'] = $this->getSponsoredQuestionDetails($testID);
			redirect(base_url('sponsored-test'));
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

		if($_SESSION['questionData'][0]['type'] == 1){
			$correct = $this->home_lib->checkAnswer($_SESSION['questionData'][0]['questionID'], $answer);
		}else{
			$correct = NULL;
		}

		$testID = $_SESSION['userData']['currentTest'];
		$_SESSION['userData'][$testID]['totalTime'] = $this->input->post('totalTime');
		$timeLeft = $this->home_lib->getSponsoredTestSettings($testID)[0]['time']*60 - $_SESSION['userData'][$testID]['totalTime'];
		$data = array(
			'userID' => $_SESSION['userData']['userID'],
			'questionID' => $_SESSION['questionData'][0]['questionID'],
			'response' => $answer,
			'correct' => $correct
			);

		if($this->home_lib->updateSponsoredTestResponse($data)){
			if($_SESSION['userData'][$testID]['timeBound'] == 1)
				$this->home_lib->updateTime($_SESSION['userData']['userID'], $testID, $timeLeft);
			array_push($_SESSION['userData'][$testID]['responses'], $_SESSION['questionData'][0]['questionID']);
			$_SESSION['questionData'] = $this->getSponsoredQuestionDetails($testID);
			$testData['questionData'] = $_SESSION['questionData'][0];
			$testData['totalTime'] = $_SESSION['userData'][$testID]['totalTime'];
			echo json_encode($testData);
		}else{
			echo "string"; die;
			$this->logout();
		}
	}

	public function resumeTest(){
		$userID = $_SESSION['userData']['userID'];
		$_SESSION['userData']['intest'] = false;
		$currentTest = $this->home_lib->getInTest($userID)[0]['testID'];
		$_SESSION['userData']['currentTest'] = $currentTest;
		$_SESSION['userData']['currentTestName'] = $this->home_lib->getTestData($currentTest)[0]['name'];
		$testTime = $this->home_lib->getSponsoredTestSettings($currentTest)[0]['timeBound'];
		$_SESSION['userData'][$currentTest]['timeBound'] = $testTime;
		$testTime = $this->home_lib->getSponsoredTestSettings($currentTest)[0]['time'];
		$_SESSION['userData'][$currentTest]	['totalTime'] = $testTime*60-$this->home_lib->getSponsoredTestTimeConsumed($userID, $currentTest)[0]['timetaken'];
		$_SESSION['userData'][$currentTest]	['responses'] = $this->home_lib->getSponsoredTestResponses($currentTest, $userID);
		$_SESSION['questionData'] = $this->getSponsoredQuestionDetails($currentTest);
		redirect(base_url('sponsored-test'));
	}

	public function endTest(){
		$this->updateInfo();
		$this->session->set_flashdata('message', array('content'=>'You have Completed the Test.','class'=>'success'));
		redirect('skill-tests');
	}

	public function updateInfo(){
		$testID = $_SESSION['userData']['currentTest'];
		$_SESSION['questionData'] = NULL;
		$_SESSION['userData']['currentTest'] = NULL;
		$_SESSION['userData']['currentTestName'] = NULL;
		$_SESSION['userData'][$testID]['totalTime'] = NULL;
		$_SESSION['userData'][$testID]['responses'] = NULL;
		$_SESSION['userData']['intest'] = false;
		$this->home_lib->unlockSkills($skill_id, $_SESSION['userData']['userID']);
		$this->home_lib->changeTestStatusToComplete($testID, $_SESSION['userData']['userID'], $totalScore);
		$this->home_lib->unlockTests($testID, $_SESSION['userData']['userID']);
	}

	private function getSponsoredQuestionDetails($testID){
		$questionDetails = $this->home_lib->getSponsoredQuestionDetails($testID);
		return $questionDetails;
	}

	private function getTestData($testID){
		return $this->home_lib->getTestData($testID);
	}


	public function updateCurrentTimestamp(){
		if($this->home_lib->updateSessionData(time())){
			echo 'true';
			die;
		}else{
			echo 'false';
			die;
		}

	}

}
