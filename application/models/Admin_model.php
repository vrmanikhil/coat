<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function login($username,$password)
	{
		$result = $this->db->get_where('admin', array('username' => $username,'password' => $password), 1, 0);
		if ($result->num_rows()>0) {
			return true;
		}
		return false;
	}

	public function getPassword(){
		$user_data = $this->session->userdata('user_data');
		$username = $user_data['username'];
		$this->db->where('username', $username);
		$query = $this->db->get('admin');
		return $query->result_array();
	}

	public function changePassword($new_password){
		$user_data = $this->session->userdata('user_data');
		$username = $user_data['username'];
		$this->db->where('username', $username);
		$passwordData = array(
			'password' => $new_password
		);
		return $this->db->update('admin', $passwordData);
	}

	public function getSkills(){
		$query = $this->db->get('skills');
		return $query->result_array();
	}

	public function getColleges(){
		$query = $this->db->get('colleges');
		return $query->result_array();
	}

	public function getCompulsorySkills(){
		$query = $this->db->get_where('skills', array('compulsorySkill'=> '1'));
		return $query->result_array();
	}

	public function getNonCompulsorySkills(){
		$query = $this->db->get_where('skills', array('compulsorySkill'=> '0'));
		// echo $this->db->last_query();die;
		return $query->result_array();
	}

	public function getQuestions(){
		$this->db->from('questions');
		$this->db->join('skills', 'skills.skill_id = questions.skill_id');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function getTestSetupDetails(){
		$this->db->where('testID', 1);
		$query = $this->db->get('testSetup');
		return $query->result_array();
	}

	public function getUsers(){
		$query = $this->db->get('users');
		return $query->result_array();
	}

	public function truncateCompulsorySkills(){
		return $this->db->empty_table('compulsorySkills');
	}

	public function getQuestionData($questionID){
		$this->db->where('question_id', $questionID);
		$query = $this->db->get('questions');
		return $query->result_array();
	}

	public function updateQuestion($questionData, $question_id){
		$this->db->where('question_id', $question_id);
		return $this->db->update('questions', $questionData);
	}

	public function updateSkill($skillData, $skillID){
		$this->db->where('skill_id', $skillID);
		return $this->db->update('skills', $skillData);
	}

	public function addQuestion($data){
		return $this->db->insert('questions',$data);
	}

	public function deleteQuestion($questionID){
		return $this->db->delete('questions', array('question_id' => $questionID));
	}

	public function deleteSkill($skillID){
		return $this->db->delete('skills', array('skill_id' => $skillID));
	}

	public function deleteCompulsorySkill($skillID){
		$data = array(
      'compulsorySkill' => '0'
      );
		$this->db->where('skill_id', $skillID);
		return $this->db->update('skills', $data);
	}

	public function addSkill($data){
		return $this->db->insert('skills',$data);
	}

	public function addCompulsorySkill($skill_id){
		$data = array(
      'compulsorySkill' => '1'
      );
		$this->db->where('skill_id', $skill_id);
		return $this->db->update('skills', $data);
	}

	public function setupTest($testData){
		$this->db->where('testID', 1);
		return $this->db->update('testSetup', $testData);
	}

	public function seed(){
		for($questionID=181; $questionID<=229; $questionID++){
			$userID = '1';
			$answer = rand(1,4);
			$questionData = $this->getQuestionData($questionID);
			$questionData = $questionData[0];
			$difficulty_level = $questionData['difficulty_level'];
			$expert_time = $questionData['expert_time'];
			$timeConsumed = rand(30,((2*$expert_time)-1));
			if($answer == $questionData['answer']){
				$flag = 1;
			}
			else{
				$flag = -1;
			}
			if($flag == '-1'){
				$correct = 0;
			}
			else{
				$correct = 1;
			}
			$score = pow(((pow(3, ($difficulty_level/2)) * ((2*$expert_time)-$timeConsumed))/(2*$expert_time)), (2/$difficulty_level));
			$score = $score * $flag;
			$data = array(
				'userID'=> $userID,
				'questionID' => $questionID,
				'answer' => $answer,
				'score' => $score,
				'timeConsumed' => $timeConsumed,
				'correct' => $correct
			);
			$this->db->insert('responses', $data);
		}
	}

	public function changeLoginType($data){
		return $this->db->update('testSetup', $data);
	}

}
