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

	public function getQuestionDetails($level, $skillID, $max = 0){
		$this->db->select('question_id, question, option1, option2, option3, option4, expert_time');
		$this->db->where('difficulty_level', $level);
		if(!empty($_SESSION['userData'][$skillID]['responses']))
		$this->db->where_not_in('question_id', $_SESSION['userData'][$skillID]['responses']);
		$this->db->where('skill_id', $skillID);
		$this->db->order_by('RAND()');
		$result = $this->db->get('questions',1);
		if(empty($result->result_array())){
			if($level <= 0){
				$CI = &get_instance();
				$CI->load->library('session');
				$CI->session->set_flashdata('message', array('content'=>'You have Successfully Completed the Test.','class'=>'success'));
				echo 'false'; die;
			}
			if($level<8){
				if($max == 0){
					$level++;
					return $this->getQuestionDetails($level, $skillID, $max);
				}else{
					$level--;
					return $this->getQuestionDetails($level, $skillID, 1);
				}
			}elseif($level == 8){
				$level-- ;
				return $this->getQuestionDetails($level, $skillID, 1);
			}
		}
		return $result->result_array();
	}

	public function getSkillData($skill_id){
		$this->db->select('skill');
		$this->db->where("(skill_id = $skill_id AND availableForUserDriven = 1)");
		$this->db->or_where("(skill_id = $skill_id AND compulsorySkill = 1)");
		$result = $this->db->get('skills');
		return $result->result_array();
	}

	public function getInTestSkill($userID){
		$this->db->select('skillID');
		$this->db->where('userID', $userID);
		$this->db->where('status', 2);
		$result = $this->db->get('userSkills');
		return $result->result_array();
	}

	public function getSkips($userID, $skillID){
		$this->db->select('count(correct) as skips');
		$this->db->join('questions', 'questions.question_id = responses.questionID');
		$result = $this->db->get_where('responses',array('responses.userID'=> $userID, 'questions.skill_id'=> $skillID, 'responses.correct' => '-1'));
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

	public function unlockSkills($skillID, $userID){
		$data = array(
			'status' => '1'
		);
		$this->db->where('userID', $userID);
		$this->db->where('status', '3');
		$this->db->where_not_in('skillID', $skillID);
		return $this->db->update('userSkills', $data);
	}

	public function changeSkillStatusToComplete($skillID, $userID, $totalScore){
		$data = array(
			'status' => '4',
			'score' => $totalScore
		);
		$this->db->where('userID', $userID);
		$this->db->where('status', '2');
		$this->db->where('skillID', $skillID);
		return $this->db->update('userSkills', $data);
	}

	public function getResponses($skillID, $userID){
		$array = array();
		$this->db->select('responses.questionID');
		$this->db->join('questions', 'questions.question_id = responses.questionID');
		$result = $this->db->get_where('responses',array('responses.userID'=> $userID, 'questions.skill_id'=> $skillID));
		foreach ($result->result_array() as $key){
			array_push($array, $key['questionID']);
		}
		return $array;
	}

	public function getColleges(){
		$result = $this->db->get('colleges');
		return $result->result_array();
	}

	public function getCourses(){
		$result = $this->db->get('courses');
		return $result->result_array();
	}

	public function updateSessionData($timestamp){
		$data['currentTimestamp'] = $timestamp;
		$this->db->where('userID', $_SESSION['userData']['userID']);
		return $this->db->update('session', $data);
	}
	public function insertSessionData($timestamp){
		$data['userID'] = $_SESSION['userData']['userID'];
		$data['createdAt'] = $timestamp;
		$data['currentTimestamp'] = $timestamp;
		return $this->db->insert('session', $data);
	}

	public function getSessionData($userID){
		return $this->db->get_where('session', array('userID'=>$userID))->result_array();
	}

	public function deleteSessionData($userID){
		return $this->db->query("DELETE FROM session Where userID = $userID");	
	}
}
