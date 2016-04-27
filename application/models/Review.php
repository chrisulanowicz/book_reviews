<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Review extends CI_Model {

	public function validate()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('review','Review','trim|required');
		$this->form_validation->set_rules('rating','Rating','required');
		if($this->form_validation->run())
		{
			return "valid";
			exit();
		}
		else
		{
			return validation_errors();
		}
	}
	public function add_review($post)
	{
		$query="INSERT INTO reviews(reviews.user_id,reviews.book_id,reviews.content,reviews.rating,reviews.created_at,reviews.updated_at) VALUES (?,?,?,?,NOW(),NOW())";
		$values=array($post['user_id'],$post['book_id'],$post['review'],$post['rating']);
		$this->db->query($query,$values);
	}
	public function delete_review($review_id)
	{
		$query="SELECT reviews.book_id FROM reviews WHERE reviews.id = ?";
		$book_id=$this->db->query($query,$review_id)->row_array();
		$query="DELETE FROM reviews WHERE reviews.id= ?";
		$this->db->query($query,$review_id);
		return $book_id;
	}
}