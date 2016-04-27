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
			<p class="logout"><a href="/books/add">Add Book with Review</a></p>
			<p class="logout"><a href="/books">Home</a></p>
		</div>
		<h4>User Alias: <?= $user[0]['alias'] ?></h4>
		<h4>Name: <?= $user[0]['name'] ?></h4>
		<h4>Email: <?= $user[0]['email'] ?></h4>
		<h4>Total Reviews: <?= count($user) ?></h4>
		<h4>Posted Reviews on the following books:</h4>
		<ul>
			<?php
				foreach($user as $book):
			?>
				<li><a href="/Books/book_info/<?= $book['book_id'] ?>"><?= $book['title'] ?></a></li>
			<?php
				endforeach;
			?>
		</ul>
	</div>
</body>
</html>