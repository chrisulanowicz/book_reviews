<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Model {

	public function get_books()
	{
		$query="SELECT books.id AS book_id,books.title,reviews.rating,reviews.content,users.id AS user_id,users.alias,DATE_FORMAT(reviews.created_at,'%M %d, %Y') AS posted FROM books JOIN reviews ON books.id=reviews.book_id JOIN users ON reviews.user_id=users.id ORDER BY reviews.created_at DESC";
		return $this->db->query($query)->result_array();
	}

	public function validate($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title','Book Title','trim|required|is_unique[books.title]');
		if(!$post['author'])
		{
			$this->form_validation->set_rules('new_author','Author','trim|required|is_unique[authors.name]');
		}
		$this->form_validation->set_rules('review','Review','trim|required');
		$this->form_validation->set_rules('rating','Rating','required');
		if($this->form_validation->run())
		{
			return "valid";
		}
		else
		{
			return validation_errors();
		}
	}
	public function add_book($book_details)
	{
		if(!$book_details['author'])
		{
			$query="INSERT INTO authors(authors.name,authors.created_at,authors.updated_at) VALUES (?,NOW(),NOW())";
			$values=array($book_details['new_author']);
			$this->db->query($query,$values);
			$query="SELECT authors.id FROM authors WHERE name = ?";
			$author_id=$this->db->query($query,$values)->row_array();
		}
		else
		{
			$author_id=$book_details['author'];
		}
		$query="INSERT INTO books(books.author_id,books.title,books.created_at,books.updated_at) VALUES (?,?,NOW(),NOW())";
		$values=array($author_id,$book_details['title']);
		$this->db->query($query,$values);
		$query="SELECT books.id FROM books WHERE title =?";
		$book_id=$this->db->query($query,$book_details['title'])->row_array();
		$query="INSERT INTO reviews(reviews.user_id,reviews.book_id,reviews.content,reviews.rating,reviews.created_at,reviews.updated_at) VALUES (?,?,?,?,NOW(),NOW())";
		$values=array($book_details['id'],$book_id,$book_details['review'],$book_details['rating']);
		$this->db->query($query,$values);
		return $book_id;
	}
	public function get_book_info($book_id)
	{
		$query="SELECT books.id AS book_id,books.title,authors.name,reviews.id AS review_id,reviews.rating,reviews.content,DATE_FORMAT(reviews.created_at,'%M %d, %Y') AS posted,users.id AS user_id,users.alias FROM books JOIN authors ON books.author_id=authors.id JOIN reviews on books.id=reviews.book_id JOIN users ON reviews.user_id=users.id WHERE books.id = ?";
		return $this->db->query($query,$book_id)->result_array();
	}
	public function get_authors()
	{
		$query="SELECT authors.id,authors.name FROM authors";
		return $this->db->query($query)->result_array();
	}
}