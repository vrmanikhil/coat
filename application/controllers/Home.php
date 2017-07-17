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
	}

	public function index(){
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
		$this->data['skillData']['skillID'] = $_SESSION['userData']['currentSkill'];
		$this->data['skillData']['skillName'] = $_SESSION['userData']['currentSkillName'];
		$this->data['questionData'] = $_SESSION['questionData'];
		$this->data['totalTime'] = $_SESSION['userData'][$_SESSION['userData']['currentSkill']]['totalTime'];
		$this->load->view('test', $this->data);
	}

	public function guidelines($skillID){
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


}
