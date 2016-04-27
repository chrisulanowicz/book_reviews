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
			<h2>Welcome, <?= $this->session->userdata('alias') ?>!</h2>
			<p class="logout"><a href="/Users/logout">Logout</a></p>
			<p class="logout"><a href="/books/add">Add Book with Review</a></p>
		</div>
		<div id="left_content">
			<h3>Recent Book Reviews:</h3>
<?php
		$count=0;
		foreach($books as $book):
			if($count<3)
			{	
?>
			<div class="book">
				<h4><a href="/Books/book_info/<?= $book['book_id'] ?>"><?= $book['title'] ?></a></h4>
				<div><p>Rating: <span class="stars-container stars-<?= $book['rating'] ?>">★★★★★</span></p></div>
				<p><a href="/Users/user_info/<?= $book['user_id'] ?>"><?= $book['alias'] ?></a> says: <?= $book['content'] ?></p>
				<p>Posted on <?= $book['posted'] ?></p>
			</div>
<?php
			$count++;
			}
		endforeach;
?>			
		</div>
		<div id="right_content">
			<h4>Other Books with Reviews:</h4>
			<ul>
				<?php
					$count=0;
					foreach($books as $book):
						if($count<3)
						{
							$count++;
						}
						else
						{
				?>
							<li><a href="/Books/book_info/<?= $book['book_id'] ?>"><?= $book['title'] ?></a></li>
				<?php
						}
					endforeach;
				?>
			</ul>
		</div>
	</div>
</body>
</html>