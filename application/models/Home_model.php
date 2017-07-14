<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function login($email,$password)
	{
		$result = $this->db->get_where('users', array('email' => $email,'password' => $password), 1, 0);
		if ($result->num_rows()>0) {
			return true;
		}
		return false;
	}

	public function getUserDetailsFromEMail($email){

		$result = $this->db->get_where('users', array('email' => $email));
		return $result->result_array();
	}

	public function register($data){
		return $this->db->insert('users', $data);
	}

	public function checkEMailExist($email){
		$this->db->where('email', $email);
		$result = $this->db->get('users');
		if ($result->num_rows() > 0) {
			return 1;
		}
		else{
			return 0;
		}
	}

	public function checkMobileExist($mobile){
		$this->db->where('mobile', $mobile);
		$result = $this->db->get('users');
		if ($result->num_rows() > 0) {
			return 1;
		}
		else{
			return 0;
		}
	}

	public function checkPasswordMatch($email, $password){
		$result = $this->db->get_where('users', array('email' => $email,'password' => $password), 1, 0);
		if ($result->num_rows()>0) {
			return true;
		}
		return false;
	}

	public function getCompulsorySkills(){
		$result = $this->db->get_where('skills', array('compulsorySkill'=>'1'));
		return $result->result_array();
	}

	public function getTestSetup(){
		$result = $this->db->get_where('testSetup', array('testID'=>'1'));
		return $result->result_array();
	}

	public function getAvailableUserDrivenSkills(){
		$usersUserDrivenSkills = $this->getUsersUserDrivenSkills();
		$usersUserDrivenSkills = $usersUserDrivenSkills[0]['skillIDs'];
		$usersUserDrivenSkills = explode(",", $usersUserDrivenSkills);
		$this->db->where_not_in('skill_id', $usersUserDrivenSkills);
		$result = $this->db->get_where('skills', array('compulsorySkill'=>'0', 'availableForUserDriven'=>'1'));
		return $result->result_array();
	}

	public function getUserSkillsSelected($userID){
		$this->db->join('skills', 'userSkills.skillID = skills.skill_id');
		$result = $this->db->get_where('userSkills', array('userID'=>$userID));
		return $result->result_array();
	}

	public function addUserDrivenSkill($data){
		return $this->db->insert('userSkills', $data);
	}

	public function getUsersUserDrivenSkills(){
		$this->db->select('GROUP_CONCAT(skillID) AS skillIDs');
		$result = $this->db->get_where('userSkills', array('userID'=>$_SESSION['userData']['userID']));
		return $result->result_array();
	}

	public function removeUserDrivenSkill($skillID){
		return $this->db->delete('userSkills', array('skillID' => $skillID, 'userID'=> $_SESSION['userData']['userID']));
	}

	public function countUserDrivenSkills($userID){
		$this->db->where('userID',$userID);
		return $this->db->count_all_results('userSkills');
	}

	public function updateRegistrationLevel($userID, $value){
		$data = array(
			'registrationLevel' => $value
			);
		$this->db->where('userID', $userID);
		return $this->db->update('users', $data);
	}

	public function getSkillStatus($skillID, $userID){
		$this->db->join('skills', 'userSkills.skillID = skills.skill_id');
		$result = $this->db->get_where('userSkills', array('userID'=>$userID, 'skillID'=>$skillID));
		return $result->result_array();
	}

	public function lockSkills($skillID, $userID){
		$data = array(
			'status' => '3'
		);
		$this->db->where('userID', $userID);
		$this->db->where('status', '1');
		$this->db->where_not_in('skillID', $skillID);
		return $this->db->update('userSkills', $data);
	}

	public function changeSkillStatusToResume($skillID, $userID){
		$data = array(
			'status' => '2'
		);
		$this->db->where('userID', $userID);
		$this->db->where('status', '1');
		$this->db->where('skillID', $skillID);
		return $this->db->update('userSkills', $data);
	}

	public function getQuestionDetails($level, $skillID){
<<<<<<< HEAD
		$this->db->select('question, option1, option2, option3, option4');
=======
		$this->db->select('question_id, question, option1, option2, option3, option4, expert_time');
>>>>>>> c5499360dd675632c85398b5d45c3a8ac5e7ee79
		$this->db->where('difficulty_level', $level);
		$this->db->where('skill_id', $skillID);
		$this->db->order_by('RAND()');
		$result = $this->db->get('questions',1);
		return $result->result_array();
	}

	public function getSkillData($skill_id){
		$this->db->select('skill');
		$this->db->where("(skill_id = $skill_id AND availableForUserDriven = 1)");
		$this->db->or_where("(skill_id = $skill_id AND compulsorySkill = 1)");
		$result = $this->db->get('skills');
		return $result->result_array();
	}
<<<<<<< HEAD
=======

	public function getInTestSkill($userID){
		$this->db->select('skillID');	
		$this->db->where('userID', $userID);
		$this->db->where('status', 2);
		$result = $this->db->get('userSkills');
		return $result->result_array();
	}

	public function getSkips($userID, $skillID){
		$this->db->select('SUM(correct) as skips');
		$this->db->join('questions', 'questions.question_id = responses.questionID');
		$result = $this->db->get_where('responses',array('responses.userID'=> $userID, 'questions.skill_id'=> $skillID, 'responses.correct' => -1));
		return $result->result_array();
	}

	public function getTotalScore($userID, $skillID){
		$this->db->select('SUM(score) as total');
		$this->db->join('questions', 'questions.question_id = responses.questionID');
		$result = $this->db->get_where('responses',array('responses.userID'=> $userID, 'questions.skill_id'=> $skillID));
		return $result->result_array();
	}

	public function getTimeConsumed($userID, $skillID){
		$this->db->select('SUM(timeConsumed) as time');
		$this->db->join('questions', 'questions.question_id = responses.questionID');
		$result = $this->db->get_where('responses',array('responses.userID'=> $userID, 'questions.skill_id'=> $skillID));
		return $result->result_array();
	}

	public function updateResponse($data){
		return $this->db->insert('responses', $data);
	}

	public function getAnswer($questionID){
		$this->db->select('answer');
		$this->db->where('question_id', $questionID);
		return $this->db->get('questions')->result_array();
	}
>>>>>>> c5499360dd675632c85398b5d45c3a8ac5e7ee79
}
