<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->library(array('Data_lib','session'));
		$this->load->helper(array('url'));
		$this->data = array();
		$this->data['head'] =  $this->load->view('commonCode/head',$this->data,true);
		$this->data['left'] =  $this->load->view('commonCode/left',$this->data,true);
		$this->data['foot'] =  $this->load->view('commonCode/foot',$this->data,true);
		// $this->data['csrf_token_name'] = $this->security->get_csrf_token_name();
		// $this->data['csrf_token'] = $this->security->get_csrf_hash();
		// $this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','class'=>'');
	}

	public function index()
	{
		$this->load->view('home');
	}

	public function selectSkills(){
		$this->load->view('selectSkills', $this->data);
	}

	public function dashboard(){
		$this->load->view('dashboard', $this->data);
	}

	public function changePassword(){
		$this->load->view('changePassword', $this->data);
	}

	public function testGuidelines(){
		$this->load->view('testGuidelines', $this->data);
	}

	public function test(){
		$this->load->view('test', $this->data);
	}

}
