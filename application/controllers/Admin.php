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
		$this->data['top'] =  $this->load->view('admin/commonCode/top',$this->data,true);
		$this->data['left'] =  $this->load->view('admin/commonCode/left',$this->data,true);
		$this->data['bottom'] =  $this->load->view('admin/commonCode/bottom',$this->data,true);
		$this->data['csrf_token_name'] = $this->security->get_csrf_token_name();
		$this->data['csrf_token'] = $this->security->get_csrf_hash();
		// $this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','class'=>'');
	}

	public function index()
	{
		$this->load->view('admin/home', $this->data);
	}

	public function addQuestion()
	{
		$this->data['skills'] = $this->admin_library->getSkills();
		$this->load->view('admin/addQuestion', $this->data);
	}

	public function manageSkills()
	{
		$this->data['skills'] = $this->admin_library->getSkills();
		$this->load->view('admin/manageSkills', $this->data);
	}

	public function manageQuestions()
	{
		$this->data['skills'] = $this->admin_library->getSkills();
		$this->load->view('admin/manageQuestions', $this->data);
	}

	public function testSetup()
	{
		$this->data['skills'] = $this->admin_library->getSkills();
		$this->data['testSetup'] = $this->admin_library->getTestSetupDetails();
		$this->data['testSetup'] = $this->data['testSetup'][0];
		$this->load->view('admin/testSetup', $this->data);
	}



}
