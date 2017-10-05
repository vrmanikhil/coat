<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SponsoredTestAdmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('Admin_library','session'));
		$this->load->helper(array('url'));
		$this->data = array();
		$this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','color'=>'');

	}

	public function setupSponsoredTest(){
		$testStatus = '';
		$type = '';
		
		if($x = $this->input->post('testStatus'))
			$testStatus = $x;
		
		if($x = $this->input->post('type'))
			$type = $x;

		if($testStatus == '' || $type == ''){
			$this->session->set_flashdata('message', array('content'=>'Incomplete Data','color'=>'red'));
			redirect(base_url('/admin/sponsoredTestSettings'));
		}
		
		
		
		$testData = array(
			'testOn' => $testStatus,
			'type' => $type
		);
		
		$result = $this->admin_library->setupSponsoredTest($testData);
		
		if($result){
			$this->session->set_flashdata('message', array('content'=>'Test Setup Successful','color'=>'green'));
			redirect(base_url('/admin/sponsoredTestSettings'));
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Something went Wrong','color'=>'red'));
			redirect(base_url('/admin/sponsoredTestSettings'));
		}
	}

	public function addQuestion()
	{
		$type = '';
		$answer = '';
		$question = '';
		$options = '';
		$option = '';
		$test = '';
		// var_dump($_POST); die;
		if($x = $this->input->post('test'))
			$test = $x;
		if($x = $this->input->post('type'))
			$type = $x;
		if($x = $this->input->post('question'))
			$question = $x;

		if($test == '' || $type == ''){
			$this->session->set_flashdata('message', array('content'=>'Incomplete Data1','color'=>'red'));
			redirect(base_url('/admin/addSponsoredTestQuestion'));
		}

		if($type == 1){
			if($x = $this->input->post('answer'))
				$answer = $x;
			if($x = $this->input->post('option'))
				$option = $x;
		}

		if($type == 3){
			if($x = $this->input->post('option'))
				$option = $x;
		}

		if($type == 1){
			if($answer == '' || $option== '' || $question == '' ){
				$this->session->set_flashdata('message', array('content'=>'Incomplete Data2','color'=>'red'));
				redirect(base_url('/admin/addSponsoredTestQuestion'));
			}
			$option = json_encode($option);
			$questionData = array(
			'testID' => $test,
			'answer' => $answer,
			'question' => $question,
			'options' => $option,
			'type' => $type,
			'active' => 1,
			'addedBy' => $this->session->userdata('user_data')['username']
			);
		}else if($type == 2){
			if($question == ''){
				$this->session->set_flashdata('message', array('content'=>'Incomplete Data3','color'=>'red'));
				redirect(base_url('/admin/addSponsoredTestQuestion'));
			}
			$questionData = array(
			'testID' => $test,
			'question' => $question,
			'type' => $type,
			'active' => 1,
			'addedBy' => $this->session->userdata('user_data')['username']
			);
			}else if($type == 3){
				if($option== '' || $question == '' ){
				$this->session->set_flashdata('message', array('content'=>'Incomplete Data','color'=>'red'));
				redirect(base_url('/admin/addSponsoredTestQuestion'));
			}
			$option = json_encode($option);
			$questionData = array(
			'testID' => $test,
			'question' => $question,
			'options' => $option,
			'type' => $type,
			'active' => 1,
			'addedBy' => $this->session->userdata('user_data')['username']
			);	
		}
		$result = $this->admin_library->addSponsoredQuestion($questionData);
		if($result){
			$this->session->set_flashdata('message', array('content'=>'Question Successfully Added','color'=>'green'));
			redirect(base_url('/admin/addSponsoredTestQuestion'));
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Something went wrong!','color'=>'red'));
			redirect(base_url('/admin/addSponsoredTestQuestion'));
		}
	}

	public function addSponsoredTest()
	{
		$test = '';
		$active = '';
		$timeBound = '';
		$time = 0;
		var_dump();
		if($x = $this->input->post('test'))
			$test = $x;
		if($x = $this->input->post('available'))
			$active = $x;
		if($x = $this->input->post('timeBound'))
			$timeBound = $x;
		if($x = $this->input->post('time'))
			$time = $x;
		if($test == '' || $active == '' || $timeBound == ''){
			$this->session->set_flashdata('message', array('content'=>'Incomplete Data','color'=>'red'));
			redirect(base_url('/admin/manageSponsoredTest'));
		}
		if($timeBound == 1 && $time == 0){
			$this->session->set_flashdata('message', array('content'=>'Incomplete Data','color'=>'red'));
			redirect(base_url('/admin/manageSponsoredTest'));
		}
		$data = array(
			'name' => $test,
			'active' => $active,
			'timeBound' => $timeBound,
			'time' => $time,
			'addedBy' => $this->session->userdata('user_data')['username']
		);
		$result = $this->admin_library->addSponsoredTest($data);
		if($result){
			$this->session->set_flashdata('message', array('content'=>'Test Successfully Added','color'=>'green'));
			redirect(base_url('/admin/manageSponsoredTest'));
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Something went Wrong.','color'=>'red'));
			redirect(base_url('/admin/manageSponsoredTest'));
		}
	}

	public function updateSponsoredTest(){
		$test = '';
		$active = '';
		$testID = '';
		if($x = $this->input->post('test'))
			$name = $x;
		if($x = $this->input->post('available'))
			$active = $x;
		if($x = $this->input->post('bookId'))
			$testID = $x;
		$data = array(
			'name' => $name,
			'active' => $active
		);

		if($name == '' || $active == ''){
			$this->session->set_flashdata('message', array('content'=>'Incomplete Data','color'=>'red'));
			redirect(base_url('/admin/manageSponsoredTest'));
		}
		$result = $this->admin_library->updateSponsoredTest($data, $testID);
		if($result){
			$this->session->set_flashdata('message', array('content'=>'Test updated Successfully','color'=>'green'));
			redirect(base_url('/admin/manageSponsoredTest'));
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Something went Wrong!','color'=>'red'));
			redirect(base_url('/admin/manageSponsoredTest'));
		}
	}

	public function deleteSponsoredTest(){
		$testID = '';
		if($x = $this->input->post('bookId'))
			$testID = $x;
		$result = $this->admin_library->deleteSponsoredTest($testID);
		if($result){
			$this->session->set_flashdata('message', array('content'=>'Test Deleted Successfully','color'=>'green'));
			redirect(base_url('/admin/manageSponsoredTest'));
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Something went Wrong!','color'=>'red'));
			redirect(base_url('/admin/manageSponsoredTest'));
		}
	}

	public function deleteQuestion(){
		$questionID = '';
		if($x = $this->input->post('bookId'))
			$questionID = $x;
		$result = $this->admin_library->deleteSponsoredTestQuestion($questionID);
		if($result){
			$this->session->set_flashdata('message', array('content'=>'Question Deleted Successfully','color'=>'green'));
			redirect(base_url('/admin/manageSponsoredTestQuestions'));
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Something went Wrong!','color'=>'red'));
			redirect(base_url('/admin/manageSponsoredTestQuestions'));
		}
	}

	public function updateQuestion()
	{
		$answer = '';
		$question = '';
		$option = '';
		$question_id = '';
		$active = '';
		
		if($x = $this->input->post('answer'))
			$answer = $x;
		if($x = $this->input->post('question'))
			$question = $x;
		if($x = $this->input->post('option'))
			$option = $x;
		if($x = $this->input->post('question_id'))
			$question_id = $x;
		if($x = $this->input->post('available'))
			$active = $x;
		$option = json_encode($option);
		$questionData = array(
			'answer' => $answer,
			'question' => $question,
			'options' => $option,
			'active' => $active
		);
		// var_dump($questionData); die;
		if($answer == '' || $question == '' || $option == '' ){
			$this->session->set_flashdata('message', array('content'=>'Incomplete Data','color'=>'red'));
			redirect(base_url('/admin/manageSponsoredTestQuestions'));
		}
		$result = $this->admin_library->updateSponsoredTestQuestion($questionData, $question_id);
		if($result){
			$this->session->set_flashdata('message', array('content'=>'Question Successfully Updated','color'=>'green'));
			redirect(base_url('/admin/manageSponsoredTestQuestions'));
		}
		else{
			$this->session->set_flashdata('message', array('content'=>'Something went Wrong.','color'=>'red'));
			redirect(base_url('/admin/manageSponsoredTestQuestions'));
		}
	}
}

