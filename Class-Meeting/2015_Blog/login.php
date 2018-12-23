<?php
 require_once "inc/class.php";
 $blog->loginCek('username');
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
 <?php
  $proses = isset($_GET['status']) ? $_GET['status'] : "";
  if($proses == ""){
  	$proses = "home";
  }
  switch($proses){
  	case "home":
 		echo $blog->loginForms();	
  	break;
  	case "login":
  		if(isset($_POST['submit'])){
	 		if(isset($_POST['username'])&&!empty($_POST['password'])){
	  			$username = $_POST['username'];
	  			$password = $_POST['password'];	
	  			$password = md5($password);
	  			$blog->login($username, $password);
	  	}
	  }
	case "gagal":
		echo "<h3>Username atau Password salah</h3>";
		echo $blog->loginForms();
  	break;
  }
  ?>
 	<button class='register'><a href='register.php'>Register</a></button>
 	<button class='login'><a href='index.php'>Home</a></button>
 </div>
</main>
<footer>
	<p class='left'>&copy;2015 Class Meeting (14 Desember - 15 Desember 2015)</p>
</footer>
</body>
</html>
