<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('Data_lib','session'));
		$this->load->helper(array('url'));
		$this->data = array();
		$this->data['csrf_token_name'] = $this->security->get_csrf_token_name();
		$this->data['csrf_token'] = $this->security->get_csrf_hash();
		// $this->data['message'] = ($v = $this->session->flashdata('message'))?$v:array('content'=>'','class'=>'');
	}

	public function login()
	{
		$data = $this->input->post('data');
		$this->data_lib->all_fields_filled($data);
		$data['password'] = md5($data['password']);
		$result = $this->data_lib->login($data);
		if($result){
			$this->data_lib->redirect_to_level();
		}else{
			$this->data_lib->set_flashdata('error', 
					'Invalid email and password combination.');
			redirect(base_url());
		}
	}

	public function signup()
	{
		$data = $this->input->post('data');
		$this->data_lib->all_fields_filled($data, ['last_name']);

		$this->data_lib->is_valid_email($data['email']);

		$details = ['name'=> json_encode(['first_name'=>$data['first_name'],
										'last_name'=>$data['last_name']]),
					'email'=> $data['email'],
					'mobile'=> $data['mobile'],
					'college_id'=> $data['college'],
					'password'=> md5($data['password'])];

		$result = $this->data_lib->signup($details);

		if(!$result){
			redirect(base_url('selectSkills'));
		}else{
			$this->data_lib->set_flashdata('error', 'Some error occured');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url(''));
	}

}
