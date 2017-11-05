<!DOCTYPE html>
<HTML>
<?php
$koneksi = mysqli_connect("localhost","root","phpmyadmin","latihan") or die("gagal masuk");
session_start();
$username = "";
$password = "";
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
$un = $_SESSION['username'];
$pw = md5($_SESSION['password']);
$query = mysqli_query($koneksi,"SELECT * FROM coba_login WHERE login_user = '$un' AND login_password = '$pw'") or die("gagal masuk");
if ($query != false) {
if (mysqli_num_rows($query) == 1) {
$username = $_SESSION['username'];
$password = $_SESSION['password'];
		};
	};
};
?>
<head>
	<Title>Member Login</title>
</head>
<body>
	<p>
	<a href='member.php'>Member Login</a>  | <a href='login.php'>Login Form</a> | <a href='logout.php'>Logout</a>
</p>
<?php
if(empty($username) || empty($password)){
		echo "<p>Maaf Anda Belum Melakukan Login</p>";
}else{
	echo "<p>Selamat Datang ".$username."</p>";
};
?>
</body>
</HTML>