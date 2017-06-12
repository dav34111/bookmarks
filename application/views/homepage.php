<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Homepage</title>
<!-- 	<link href="<?=base_url('style/login_style.css');?>" rel="stylesheet" type="text/css"> -->
<script>
		var base_url="<?=base_url();?>";
</script>
</head>
<body>
	<h1>homepage</h1><br>
	<?php 
		echo 'Welcome: '.$login;
	?>
	<div id="<?=$id;?>">
		<input type="text" name="url" placeholder="Add a link" id="add_inp"><button id="add">Add</button>
	</div>
	<div id="disp">
		<?php 

		echo '<pre>';
		print_r($output);
		echo '</pre>';
		?>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="<?=base_url('script/script.js');?>" type="text/javascript"></script>
</body>
</html>