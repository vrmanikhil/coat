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

	public function getSkills(){
		$query = $this->db->get('skills');
		return $query->result_array();
	}

	public function getColleges(){
		$query = $this->db->get('colleges');
		return $query->result_array();
	}

	public function getCompulsorySkills(){
		$this->db->from('compulsorySkills');
		$this->db->join('skills', 'skills.skill_id = compulsorySkills.skill_id');
		$query = $this->db->get();
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
		return $this->db->delete('compulsorySkills', array('id' => $skillID));
	}

	public function addSkill($data){
		return $this->db->insert('skills',$data);
	}

	public function addCompulsorySkill($skillData){
		return $this->db->insert('compulsorySkills',$skillData);
	}

	public function setupTest($testData){
		$this->db->where('testID', 1);
		return $this->db->update('testSetup', $testData);
	}


}
