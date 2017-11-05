<?php
 require_once "inc/class.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Form</title>
<?php
 require_once "meta.php";
?>
</head>
<body>
<header>
<?php
 require_once "header.php";
?>
</header>
<main>
 <div class='container'>
 	<h1>Register Form</h1>
 	<hr class='small'>
 	<form method='post' action=''>
 	<?php
 		if(isset($_POST['submit'])){
 			echo "Register Suskes!";
 		}
 	?>
 		<ul class='form'>
 			<li><input type='text' name='username' placeholder='Username'/></li>
 		</ul>
 		<ul class='form'>
 			<li><input type='password' name='password' placeholder='password'/></li>
 		</ul>
 		<ul class='form'>
 			<li><input type='email' name='email' placeholder='Email'/></li>
 		</ul>
 		<ul class='form'>
 			<li><input type='submit' name='submit' value='Register'/></li>
 		</ul>
 	</form>
 	<button class='register'><a href='register.php'>Register</a></button>
 	<button class='login'><a href='index.php'>Home</a></button>
 </div>
</main>
<footer>
	<p class='left'>&copy;2015 Class Meeting (14 Desember - 15 Desember 2015)</p>
</footer>
</body>
</html>