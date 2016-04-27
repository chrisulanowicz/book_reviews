<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function create()
	{
		$result=$this->User->validate($this->input->post());
		if($result == "valid")
		{
			$this->User->create_user($this->input->post());
			$success="Registration Successful - Please Login to continue!";
			$this->session->set_flashdata('success',$success);
			redirect('/');
			exit();
		}
		else
		{
			$this->session->set_flashdata('errors',$result);
			redirect('/');
			die();
		}
	}
	public function authenticate()
	{
		$result=$this->User->validate_login($this->input->post());
		if($result == "valid")
		{
			redirect('/books');
			exit();
		}
		else
		{
			$this->session->set_flashdata('loginerrors',$result);
			redirect('/');
			die();
		}
	}
	public function logout()
	{
		$this->session->set_userdata('logged_in',FALSE);
		$this->session->sess_destroy();
		redirect('/');
		die();
	}
	public function user_info($id)
	{
			if($this->session->userdata('loggedin')==TRUE)
		{
			$results=$this->User->get_user_info($id);
			$this->load->view('view_user',array('user'=>$results));
		}
		else
		{
			redirect('/');
			die();
		}
	}
}
