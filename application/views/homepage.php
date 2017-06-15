<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Homepage</title>
<link href="<?=base_url('style/homepage_style.css');?>" rel="stylesheet" type="text/css">
<script>
		var base_url="<?=base_url();?>";
</script>
</head>
<body>
	<div id="container">
		<div class="header">
			<h1>It's you're famous bookmark page!</h1><br>
		</div>
		<div class="user_name">
			<?php 
				echo '<span style="color:blue; font-size:40px;">Welcome:</span><span style="color:green; font-size:50px;">'.$login.'</span>';
			?>
			<a href="<?=base_url();?>index.php/user/logout">Logout</a>
		</div>
		<div class="content">
			<div id="<?=$id;?>">
				<input type="text" name="url" placeholder="Add a link" id="add_inp"><button id="add">Add</button>
			</div>
			<div id="disp">
				<?php 
					if( !empty($output)){
						echo '<table border="2" cellpadding="10">';
						echo '<tr>';
							echo '<th>My favorit links</th>';
							echo '<th>Edit</th>';
						echo '</tr>';
							foreach ($output as $value) {
								echo '<tr id='.$value['user_id'].'>';
									echo '<td><a target="_blank" href="'.$value['url'].'">'.$value['url'].'</a></td>';
									echo '<td><button class="remove" >Remove</button></td>';
								echo '</tr>';
							}
						echo '</table>';
						//echo $this->pagination->create_links();
					}
					else{
						echo 'no bookmarks';
					}
					echo $this->pagination->create_links();
				?>
			</div>
		</div>
	</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="<?=base_url('script/script.js');?>" type="text/javascript"></script>
</body>
</html>