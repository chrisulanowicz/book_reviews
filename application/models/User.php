<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	public function validate($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','Name','trim|required');
		$this->form_validation->set_rules('alias','Alias','trim|required|is_unique[users.alias]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password','Password','required|min_length[8]|matches[confirm_pw]|trim');
		$this->form_validation->set_rules('confirm_pw','Password','trim');
		if($this->form_validation->run())
		{	
			return "valid";
		}
		else
		{
			return validation_errors();
		}
	}
	public function create_user($post)
	{
		$query="INSERT INTO users(name,alias,email,password,created_at,updated_at) VALUES (?,?,?,?,NOW(),NOW())";
		$values=array($post['name'],$post['alias'],$post['email'],password_hash($post['password'],PASSWORD_DEFAULT));
		$this->db->query($query,$values);
	}
	public function validate_login($post)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('password1','Password','trim|required');
		if(!$this->form_validation->run())
		{
			return validation_errors();
		}
		else
		{
			$this->form_validation->set_rules('email','Email','is_unique[users.email]');
			if($this->form_validation->run())
			{
				return "<p>Email or Password is incorrect</p>";
			}
			else
			{
				$query="SELECT users.id,users.alias,users.password FROM users WHERE email = ?";
				$info = $this->db->query($query,$post['email'])->row_array();
				if(password_verify($post['password1'],$info['password']))
				{
					$this->session->set_userdata('loggedin',TRUE);
					$this->session->set_userdata('alias',$info['alias']);
					$this->session->set_userdata('id',$info['id']);
					return "valid";
				}
				else
				{
					return "Email or Password is incorrect";
				}
			}
		}
	}
	public function get_user_info($id)
	{
		$query="SELECT users.name,users.alias,users.email,reviews.user_id,books.id AS book_id,books.title FROM users JOIN reviews ON users.id=reviews.user_id JOIN books ON reviews.book_id=books.id WHERE users.id = ?";
		return $this->db->query($query,$id)->result_array();
	}
}
