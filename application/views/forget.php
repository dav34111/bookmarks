<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Forgot Password</title>
	<link href="<?=base_url('style/reg_style.css');?>" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="container">
		<div id="login_form">
			<h1>Restore password</h1>
			<form action="<?=base_url();?>index.php/login/restore_pass" method="post">
				<input type="text" name="mail" placeholder="type here youre mail" class="inp_1"><br>
				<input id="submit" type="submit" name="restore" value="Restore"><br>
			</form>
			
		</div>
	</div>

</body>
</html>