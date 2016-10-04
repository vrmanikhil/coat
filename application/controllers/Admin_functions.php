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

	public function update_question()
	{
		$skill_id = '';
		$answer = '';
		$difficulty_level = '';
		$question = '';
		$option1 = '';
		$option2 = '';
		$option3 = '';
		$option4 = '';
		$question_id = '';

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
		if($x = $this->input->post('question_id'))
			$question_id = $x;


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
		$result = $this->admin_library->updateQuestion($questionData, $question_id);

		if($result){
			redirect(base_url('/admin/manageQuestions'));
		}

	}

	public function addSkill()
	{
		$skill = '';
		$availableForUserDriven = '';

		if($x = $this->input->post('skill'))
			$skill = $x;
		if($x = $this->input->post('availableForUserDriven'))
			$availableForUserDriven = $x;

		$skillData = array(
			'skill' => $skill,
			'availableForUserDriven' => $availableForUserDriven
		);

		$result = $this->admin_library->addSkill($skillData);

		if($result){
			redirect(base_url('/admin/manageSkills'));
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

		if($x = $this->input->post('testName'))
			$testName = $x;
		if($x = $this->input->post('college_id'))
			$college_id = $x;
		if($x = $this->input->post('numberOfSkills'))
			$numberOfSkills = $x;
		if($x = $this->input->post('positiveScore'))
			$positiveScore = $x;
		if($x = $this->input->post('negativeScore'))
			$negativeScore = $x;
		if($x = $this->input->post('numberOfQuestions'))
			$numberOfQuestions = $x;
		if($x = $this->input->post('time'))
			$time = $x;
		if($x = $this->input->post('easyPercentage'))
			$easyPercentage = $x;
		if($x = $this->input->post('mediumPercentage'))
			$mediumPercentage = $x;
		if($x = $this->input->post('hardPercentage'))
			$hardPercentage = $x;

		$testData = array(
			'testName' => $testName,
			'college_id' => $college_id,
			'skillsAllowed' => $numberOfSkills,
			'positiveScore' => $positiveScore,
			'negativeScore' => $negativeScore,
			'numberOfQuestions' => $numberOfQuestions,
			'timeAllowed' => $time,
			'easyPercentage' => $easyPercentage,
			'mediumPercentage' => $mediumPercentage,
			'hardPercentage' => $hardPercentage
		);
		$result = $this->admin_library->setupTest($testData);

		if($result){
			redirect(base_url('/admin/testSetup'));
		}
	}

		public function addCompulsorySkill()
		{
			$skill_id = '';
			$positiveScore = '';
			$negativeScore = '';
			$numberOfQuestions = '';
			$time = '';
			$easyPercentage = '';
			$mediumPercentage = '';
			$hardPercentage = '';

			if($x = $this->input->post('skill_id'))
				$skill_id = $x;
			if($x = $this->input->post('positiveScore'))
				$positiveScore = $x;
			if($x = $this->input->post('negativeScore'))
				$negativeScore = $x;
			if($x = $this->input->post('numberOfQuestions'))
				$numberOfQuestions = $x;
			if($x = $this->input->post('time'))
				$time = $x;
			if($x = $this->input->post('easyPercentage'))
				$easyPercentage = $x;
			if($x = $this->input->post('mediumPercentage'))
				$mediumPercentage = $x;
			if($x = $this->input->post('hardPercentage'))
				$hardPercentage = $x;

			$skillData = array(
				'skill_id' => $skill_id,
				'positiveScore' => $positiveScore,
				'negativeScore' => $negativeScore,
				'numberOfQuestions' => $numberOfQuestions,
				'time' => $time,
				'easyPercentage' => $easyPercentage,
				'mediumPercentage' => $mediumPercentage,
				'hardPercentage' => $hardPercentage
			);
			$result = $this->admin_library->addCompulsorySkill($skillData);

			if($result){
				redirect(base_url('/admin/testSetup'));
			}

	}



}
