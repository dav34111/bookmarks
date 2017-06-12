<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Bookmarks</title>
	<link href="<?=base_url('style/login_style.css');?>" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="container">
		<div id="login_form">
			<h1>Welcome to Bookmarks!</h1>
			<form action="<?=base_url();?>index.php/login/check" method="post">
				<input type="text" name="login" placeholder="e-mail" class="inp_1"><br>
				<input type="password" name="password" placeholder="password" class="inp_2"><br>
				<span id="remember">Remember me <input type="checkbox" name="remember"></span><br>
				<input id="submit" type="submit" value="Login"><br>
			</form>
			<span class="forgot"><a href="#">Maybe forgot password?</a></span><br>
			<span class="reg"><a href="#">Registration</a></span><br>
		</div>
	</div>

</body>
</html>