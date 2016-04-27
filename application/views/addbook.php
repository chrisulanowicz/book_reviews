<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Belt Exam Prep - CodeIgniter" />
	<title>Assignment III: Belt Exam Preperations</title>
	<link rel="stylesheet" href="<?=base_url();?>/user_guide/_static/css/addstyle.css" />
</head>
<body>
	<div id="container">
		<div id="header">
			<p class="logout"><a href="/Users/logout">Logout</a></p>
			<p class="logout"><a href="/books">Home</a></p>
		</div>
		<div id="main_content">
			<div class="errors">
				<?php
					if($this->session->flashdata('errors'))
					{
						echo $this->session->flashdata('errors');
					}
				?>
			</div>
			<h4>Add a New Book Title and a Review:</h4>
			<form action="/books/new_book" method="post">
				<h5>Book Title: 
					<input type="text" name="title" />
				</h5>
				<h5>Author:</h5>
				<p>Choose existing author:
					<select name="author">
						<option></option>
						<?php
							foreach($authors as $author):
						?>
						<option value="<?= $author['id'] ?>"><?= $author['name'] ?></option>
						<?php
							endforeach;
						?>
					</select>
				</p>
				<p>Or add a new author:
					<input type="text" name="new_author" />
				</p>
				<h5>Review:
					<textarea name="review" cols="40" rows="4"></textarea>
				</h5>
				<h5>Rating:
					<select name="rating">
						<option></option>
						<option value="0">0</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>					
					</select> stars.
				</h5>
				<input type="hidden" name="id" value="<?= $this->session->userdata('id') ?>" />
				<input class="button" type="submit" value="Add Book and Review" />
			</form>
		</div>
	</div>
</body>
</html>