<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_functions extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('Admin_library','session'));
		$this->load->helper(array('url'));
		$this->data = array();
	}

	public function add_question()
	{
		$skill_id = '';
		$answer = '';
		$difficulty_level = '';
		$question = '';
		$option1 = '';
		$option2 = '';
		$option3 = '';
		$option4 = '';

		if($x = $this->input->post('skill_id'))
			$skill_id = $x;
		if($x = $this->input->post('answer'))
			$answer = $x;
		if($x = $this->input->post('difficulty_level'))
			$difficulty_level = $x;
		if($x = $this->input->post('question'))
			$question = $x;
		if($x = $this->input->post('option1'))
			$option1 = $x;
		if($x = $this->input->post('option2'))
			$option2 = $x;
		if($x = $this->input->post('option3'))
			$option3 = $x;
		if($x = $this->input->post('option4'))
			$option4 = $x;

		$questionData = array(
			'skill_id' => $skill_id,
			'answer' => $answer,
			'difficulty_level' => $difficulty_level,
			'question' => $question,
			'option1' => $option1,
			'option2' => $option2,
			'option3' => $option3,
			'option4' => $option4
		);
		$result = $this->admin_library->addQuestion($questionData);

		if($result){
			redirect(base_url('/admin/addQuestion'));
		}

	}

	public function setupTest()
	{
		$testName = '';
		$college_id = '';
		$numberOfSkills = '';
		$positiveScore = '';
		$negativeScore = '';
		$numberOfQuestions = '';
		$time = '';
		$easyPercentage = '';
		$mediumPercentage = '';
		$hardPercentage = '';

		if($x = $this->input->post('skill_id'))
			$skill_id = $x;
		if($x = $this->input->post('answer'))
			$answer = $x;
		if($x = $this->input->post('difficulty_level'))
			$difficulty_level = $x;
		if($x = $this->input->post('question'))
			$question = $x;
		if($x = $this->input->post('option1'))
			$option1 = $x;
		if($x = $this->input->post('option2'))
			$option2 = $x;
		if($x = $this->input->post('option3'))
			$option3 = $x;
		if($x = $this->input->post('option4'))
			$option4 = $x;

		$questionData = array(
			'skill_id' => $skill_id,
			'answer' => $answer,
			'difficulty_level' => $difficulty_level,
			'question' => $question,
			'option1' => $option1,
			'option2' => $option2,
			'option3' => $option3,
			'option4' => $option4
		);
		$result = $this->admin_library->addQuestion($questionData);

		if($result){
			redirect(base_url('/admin/addQuestion'));
		}

	}



}
