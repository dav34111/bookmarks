<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<link href="<?=base_url('style/reg_style.css');?>" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="container">
		<div id="login_form">
			<h1>Registration</h1>
			<form action="<?=base_url();?>index.php/login/registrate" method="post">
				<input type="text" name="username" placeholder="name" class="inp_2"><br>
				<?php echo form_error('username'); ?>
				<input type="text" name="mail" placeholder="e-mail" class="inp_1"><br>
				<?php echo form_error('mail'); ?>
				<input type="password" name="password" placeholder="password" class="inp_2"><br>
				<?php echo form_error('password'); ?>
				<input type="password" name="conf_password" placeholder="confirm password" class="inp_1"><br>
				<?php echo form_error('conf_password'); ?>
				
				<input id="submit" type="submit" name="submit" value="Registrate"><br>
			</form>
			
		</div>
	</div>

</body>
</html>