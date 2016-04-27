<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Belt Exam Prep - CodeIgniter" />
	<title>Assignment III: Belt Exam Preperations</title>
	<link rel="stylesheet" href="<?=base_url();?>/user_guide/_static/css/style.css" />
</head>
<body>
	<div id="container">
		<div id="header">
			<p class="logout"><a href="/Users/logout">Logout</a></p>
			<p class="logout"><a href="/books">Home</a></p>
		</div>
		<div id="left_content">
			<h3><span><?= $book[0]['title'] ?></span></h3>
			<h4>Author: <?= $book[0]['name'] ?></h4>
			<h4>Reviews:</h4>
			<?php
				foreach($book as $review):
			?>
			<div class="reviews">
				<div><p>Rating: <span class="stars-container stars-<?= $review['rating'] ?>">★★★★★</span></p></div>
				<p><a href="/Users/user_info/<?= $review['user_id'] ?>"><?= $review['alias'] ?></a> says: <?= $review['content'] ?></p>
				<p>Posted on <?=$review['posted'] ?></p>
				<?php
					if($review['user_id']==$this->session->userdata('id'))
					{
				?>
					<p><a href="/Reviews/delete/<?= $review['review_id'] ?>">Delete this review</a></p>
				<?php
					}
				?>
			</div>
			<?php
				endforeach;
			?>
		</div>
		<div id="right_content">
			<h4>Add a Review:</h4>
			<form action="/Reviews/add/<?= $review['book_id'] ?>" method="post">
				<textarea name="review"></textarea>
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
				<input type="hidden" name="book_id" value="<?= $review['book_id'] ?>" />
				<input type="hidden" name="user_id" value="<?= $this->session->userdata('id') ?>" />
				<input class="button" type="submit" value="Submit Review" />
				<?php
					if($this->session->flashdata('errors'))
					{
						echo $this->session->flashdata('errors');
					}
				?>
			</form>
		</div>
	</div>
</body>
</html>