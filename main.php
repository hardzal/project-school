	<div class='container'>
 		<h1>BaduBlog</h1>
 		<hr class='small'/>
 		<h2>Blog tentang Dunia Pendidikan</h2>
 		<?php
 			if(isset($_SESSION['admin'])&&!empty($_SESSION['admin'])){
 				$b_a = 'admin.php';
 				$b_b = 'Control Panel';
 				$a_a = 'admin.php?page=logout';
 				$a_b = 'Logout';
 			}else{
 				$b_a = 'login.php';
 				$b_b = 'Login';
 				$a_a = 'register.php';
 				$a_b = 'Register';
 			}
 		?>
 		<button class='login'><a href='<?php echo $b_a;?>'><?php echo $b_b;?></a></button>
 		<button class='register'><a href='<?php echo $a_a;?>'><?php echo $a_b;?></a></button>
 	</div>