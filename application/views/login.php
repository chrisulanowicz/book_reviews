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
		<div class="success">
		<?php
			if($this->session->flashdata('success'))
			{
				echo "<h2>" . $this->session->flashdata('success') . "</h2>";
			}
		?>
		</div>
		<h3>Welcome!</h3>
		<form id="login" action="/Users/authenticate" method="post">
			<fieldset>
				<legend>Log In</legend>
					<div class="errors">
					<?php 
						if($this->session->flashdata('loginerrors'))
						{
							echo $this->session->flashdata('loginerrors');
						}
					?>
					</div>
					<p>Email:</p><input type="text" name="email" />
					<p>Password:</p><input type="password" name="password1" />
					<input class="button" type="submit" value="Login" />
			</fieldset>
		</form>
		<form id="register" action="/Users/create" method="post">
			<fieldset>
				<legend>Register</legend>
					<div class="errors">
					<?php
						if($this->session->flashdata('errors'))
						{
							echo $this->session->flashdata('errors');
						}
					?>
					</div>
					<p>Name:</p><input type="text" name="name" />
					<p>Alias:</p><input type="text" name="alias" />
					<p>Email Address:</p><input type="text" name="email" />
					<p>Password</p><input type="password" name="password" placeholder="Minimum 8 Characters" />
					<p>Confirm Password:</p><input type="password" name="confirm_pw" />
					<input class="button" type="submit" value="Register" />
			</fieldset>
		</form>
	</div>
</body>
</html>