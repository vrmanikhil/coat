<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('Home_lib','session'));
		$this->load->helper(array('url'));
		$this->data = array();
		$this->data['head'] =  $this->load->view('commonCode/head',$this->data,true);
		$this->data['left'] =  $this->load->view('commonCode/left',$this->data,true);
		$this->data['foot'] =  $this->load->view('commonCode/foot',$this->data,true);
		// $this->data['csrf_token_name'] = $this->security->get_csrf_token_name();
		$this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','class'=>'');
		$this->data['csrf_token'] = $this->security->get_csrf_hash();
		$this->data['singleLogin'] = $this->home_lib->getTestSetup()[0]['singleLogin'];
	}

	public function index(){
		$this->data['colleges'] = $this->home_lib->getColleges();
		$this->data['courses'] = $this->home_lib->getCourses();
		$this->load->view('home', $this->data);
	}

	private function redirection(){
			if(!$this->home_lib->auth()){
				redirect(base_url());
			}
	}

	public function selectSkills(){
		$this->redirection();
		if($_SESSION['registrationLevel']=='1'){
		$this->data['compulsorySkills'] = $this->home_lib->getCompulsorySkills();
		$this->data['userSkillsSelected'] = $this->home_lib->getUserSkillsSelected($_SESSION['userData']['userID']);
		$this->data['availableUserDrivenSkills'] = $this->home_lib->getAvailableUserDrivenSkills();
		$this->data['testSetup'] = $this->home_lib->getTestSetup();
		$this->data['sponsoredTestSetup'] = $this->home_lib->getSponsoredTestSetup()[0];
		$this->data['sponsoredTest'] = $this->home_lib->getSponsoredTest();
		$this->data['testSetup'] = $this->data['testSetup'][0];
		$this->load->view('selectSkills', $this->data);
		}
		if($_SESSION['registrationLevel']=='2'){
			redirect(base_url('skill-tests'));
		}
		if($_SESSION['registrationLevel']=='3'){
			redirect(base_url('submit-test'));
		}
	}

	public function skillTests(){
		$this->redirection();
		if($_SESSION['registrationLevel']=='2'){
		$this->data['userSkillsSelected'] = $this->home_lib->getUserSkillsSelected($_SESSION['userData']['userID']);
		$this->data['testSetup'] = $this->home_lib->getTestSetup();
		$this->data['sponsoredTestSetup'] = $this->home_lib->getSponsoredTestSetup()[0];
		$this->data['sponsoredTest'] = $this->home_lib->getUserSponsoredTest($_SESSION['userData']['userID']);
		$this->data['timeAllowed'] = $this->data['testSetup'][0]['timeAllowed'];
		$this->load->view('skillTests', $this->data);
		}
		if($_SESSION['registrationLevel']=='1'){
			redirect(base_url('skill-tests'));
		}
		if($_SESSION['registrationLevel']=='3'){
			redirect(base_url('submit-test'));
		}
	}

	public function submitTest(){
		if($_SESSION['registrationLevel']=='1'){
			redirect(base_url('skill-tests'));
		}
		if($_SESSION['registrationLevel']=='2'){
			redirect(base_url('skill-tests'));
		}
		$this->load->view('submitTest', $this->data);
	}

	public function test(){
		if($_SESSION['userData']['intest']){
			$_SESSION['questionData'] = NULL;
			$skill_id = $_SESSION['userData']['currentSkill'];
			$_SESSION['userData']['currentSkill'] = NULL;
			$_SESSION['userData']['currentSkillName'] = NULL;
			$_SESSION['userData'][$skill_id]['totalScore'] = NULL;
			$_SESSION['userData'][$skill_id]['skips'] = NULL;
			$_SESSION['userData'][$skill_id]['skipStatus'] = NULL;
			$_SESSION['userData'][$skill_id]['totalTime'] = NULL;
			$_SESSION['userData'][$skill_id]['level'] = NULL;
			$_SESSION['userData'][$skill_id]['responses'] = NULL;
			$_SESSION['userData']['intest'] = false;
			$this->session->set_flashdata('message', array('content'=>'Page Reload Not allowed During test.','class'=>'error'));
			redirect(base_url('skill-tests'));
		}
		$_SESSION['userData']['intest'] = true;
		$this->data['skillData']['skillID'] = $_SESSION['userData']['currentSkill'];
		$this->data['skillData']['skillName'] = $_SESSION['userData']['currentSkillName'];
		$this->data['questionData'] = $_SESSION['questionData'];
		$this->data['totalTime'] = $_SESSION['userData'][$_SESSION['userData']['currentSkill']]['totalTime'];
		$this->data['skips'] = $_SESSION['userData'][$_SESSION['userData']['currentSkill']]['skips'];
		$this->load->view('test', $this->data);
	}

	public function sponsoredTest(){
		if($_SESSION['userData']['intest']){
			$_SESSION['questionData'] = NULL;
			$testID = $_SESSION['userData']['currentTest'];
			$_SESSION['userData']['currentTest'] = NULL;
			$_SESSION['userData']['currentTestName'] = NULL;
			$_SESSION['userData'][$testID]['totalTime'] = NULL;
			$_SESSION['userData'][$testID]['responses'] = NULL;
			$_SESSION['userData']['intest'] = false;
			$this->session->set_flashdata('message', array('content'=>'Page Reload Not allowed During test.','class'=>'error'));
			redirect(base_url('skill-tests'));
		}
		$_SESSION['userData']['intest'] = true;
		$this->data['testData']['testID'] = $_SESSION['userData']['currentTest'];
		$this->data['testData']['testName'] = $_SESSION['userData']['currentTestName'];
		$this->data['questionData'] = $_SESSION['questionData'];
		$this->data['timeBound'] = $_SESSION['userData'][$_SESSION['userData']['currentTest']]['timeBound'];
		$this->data['totalTime'] = $_SESSION['userData'][$_SESSION['userData']['currentTest']]['totalTime'];
		$this->load->view('sponsoredTest', $this->data);
	}

	public function guidelines($skillID){
		$this->data['sponsored'] = 0;
		$this->data['skillID'] = $skillID;
		$this->data['testSetup'] = $this->home_lib->getTestSetup();
		$this->data['timeAllowed'] = $this->data['testSetup'][0]['timeAllowed'];
		$this->data['skillStatus'] = $this->home_lib->getSkillStatus($skillID, $_SESSION['userData']['userID']);
		if($this->data['skillStatus'][0]['status']=='1'){
			$this->load->view('guidelines', $this->data);}
		else{
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured. Please Try Again.','class'=>'error'));
			redirect(base_url('skill-tests'));
		}
	}

	public function sponsoredTestGuidelines($testID){
		$this->data['sponsored'] = 1;
		$this->data['testID'] = $testID;
		$this->data['testSetup'] = $this->home_lib->getSponsoredTestSettings($testID);
		if($this->data['testSetup'][0]['timeBound'] == 1)
			$this->data['timeAllowed'] = $this->data['testSetup'][0]['time'];
		else
			$this->data['timeAllowed'] = 'No time boundation';
		$this->data['testStatus'] = $this->home_lib->getTestStatus($testID, $_SESSION['userData']['userID']);
		if($this->data['testStatus'][0]['status']=='1'){
			$this->load->view('guidelines', $this->data);}
		else{
			$this->session->set_flashdata('message', array('content'=>'Some Error Occured. Please Try Again.','class'=>'error'));
			redirect(base_url('skill-tests'));
		}
	}

}
