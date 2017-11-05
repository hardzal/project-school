<!DOCTYPE html>
<HTML>
<head>
<title>Login Rights</title>
</head>
<body>
	<p>
	<a href='member.php'>Member Login</a>  | <a href='login.php'>Login Form</a>
</p>
<?php
$koneksi = mysqli_connect("localhost","root","","latihan_1") or die("gagal masuk");
session_start();
$username = "";
$password = "";
if(isset($_POST['username']) && isset($_POST['password'])){
	$usr = $_POST['username'];
	$psw = md5($_POST['password']);
	$query = mysqli_query($koneksi,"SELECT * FROM coba_login WHERE login_user='$usr' AND login_password='$psw'") or die("gagal melakukan query");
	if($query != false){
		if(mysqli_num_rows($query)== 1){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['password'] = $_POST['password'];
		};
	};

};
?>

<h2>Login Disini</h2>
<?php 
	if(empty($username)){
		if(isset($_POST['username']) || isset($_POST['password'])){
			echo "<p>Username atau password yang anda ketikkan salah!<p>";
		};
?>
	<form method="post" action="login.php">
		<label>Username</label><br/>
			<input type="text" name="username"/><br/>
		<label>Password</label><br/>
			<input type="password" name="password"/><br/>
		<input type="submit" value="submit"/>
	</form>
<?php
  }else {
	echo "<p>Anda Berhasil Login</p>";
  };
?>
</body>
</HTML>