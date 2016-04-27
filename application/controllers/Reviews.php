<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reviews extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Review');
	}
	// public function index()
	// {
	// 	if($this->session->userdata('loggedin')==TRUE)
	// 	{
	// 		$this->load->view('addreview');
	// 	}
	// 	else
	// 	{
	// 		redirect('/');
	// 		die();
	// 	}
	// }
	public function add($book_id)
	{
		$result=$this->Review->validate($this->input->post());
		if($result=="valid")
		{
			$this->Review->add_review($this->input->post());
			redirect('/Books/book_info/' . $book_id);
			exit();
		}	
		else
		{
			$this->session->set_flashdata('errors',$result);
			redirect('/Books/book_info/' . $book_id);
			die();
		}
	}
	public function delete($review_id)
	{
		$result=$this->Review->delete_review($review_id);
		redirect('/Books/book_info/' . $result['book_id']);
		exit();
	}
}