<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->library(array('session'));
		$this->load->library(array('Admin_library','session'));
		$this->load->helper(array('url'));
		$this->data = array();
		$this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','color'=>'');
		$this->data['top'] =  $this->load->view('admin/commonCode/top',$this->data,true);
		$this->data['left'] =  $this->load->view('admin/commonCode/left',$this->data,true);
		$this->data['bottom'] =  $this->load->view('admin/commonCode/bottom',$this->data,true);
		$this->data['csrf_token_name'] = $this->security->get_csrf_token_name();
		$this->data['csrf_token'] = $this->security->get_csrf_hash();
	}

	public function index()
	{
		if ($this->admin_library->auth()) {
			redirect(base_url('/admin/manageSkills'));
		}
		$this->load->view('admin/home', $this->data);
	}

	public function addQuestion()
	{
		if (!$this->admin_library->auth()) {
			redirect(base_url('/admin'));
		}
		$this->data['skills'] = $this->admin_library->getSkills();
		$this->load->view('admin/addQuestion', $this->data);
	}

	public function editQuestion($questionID = '')
	{
		if (!$this->admin_library->auth()) {
			redirect(base_url('/admin'));
		}
		$this->data['skills'] = $this->admin_library->getSkills();
		$this->data['questionData'] = $this->admin_library->getQuestionData($questionID);
		$this->data['questionData'] = $this->data['questionData'][0];
		$this->load->view('admin/editQuestion', $this->data);
	}

	public function manageSkills()
	{
		if (!$this->admin_library->auth()) {
			redirect(base_url('/admin'));
		}
		$this->data['skills'] = $this->admin_library->getSkills();
		$this->load->view('admin/manageSkills', $this->data);
	}

	public function manageQuestions()
	{
		if (!$this->admin_library->auth()) {
			redirect(base_url('/admin'));
		}
		$this->data['questions'] = $this->admin_library->getQuestions();
		$this->load->view('admin/manageQuestions', $this->data);
	}

	public function testSetup()
	{
		if (!$this->admin_library->auth()) {
			redirect(base_url('/admin'));
		}
		$this->data['skills'] = $this->admin_library->getSkills();
		$this->data['colleges'] = $this->admin_library->getColleges();
		$this->data['testSetup'] = $this->admin_library->getTestSetupDetails();
		$this->data['testSetup'] = $this->data['testSetup'][0];
		$this->data['compulsorySkills'] = $this->admin_library->getCompulsorySkills();
		$this->load->view('admin/testSetup', $this->data);
	}



}
