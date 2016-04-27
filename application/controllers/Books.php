<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {

	protected $book_id=0;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Book');
	}

	public function index()
	{
		if($this->session->userdata('loggedin')==TRUE)
		{
			$result=$this->Book->get_books();
			$this->load->view('home',array("books"=>$result));
		}
		else
		{
			redirect('/');
			die();
		}
	}
	public function add()
	{
		if($this->session->userdata('loggedin')==TRUE)
		{
			$result=$this->Book->get_authors();
			$this->load->view('addbook',array("authors"=>$result));
		}
		else
		{
			redirect('/');
			die();
		}
	}
	public function new_book()
	{
		$result=$this->Book->validate($this->input->post());
		if($result=="valid")
		{
			$book_details=$this->input->post();
			$result=$this->Book->add_book($book_details);
			$this->book_id=$result['id'];
			$this->book_info($this->book_id);
		}
		else
		{
			$this->session->set_flashdata('errors',$result);
			redirect('books/add');
			die();
		}
	}
	public function book_info($book_id)
	{
		$results = $this->Book->get_book_info($book_id);
		$this->load->view('addreview',array("book"=>$results));
	}
}