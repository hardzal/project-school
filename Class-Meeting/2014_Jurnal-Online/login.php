<!DOCTYPE html>
<HTML>
<head>
<title>Login Form</title>
<link href='style/style.css' type='text/css' rel='stylesheet'/>
<style type='text/css'>
form{
	text-align:center;
}
</style>
</head>
<body>
<?php
require_once "koneksi.php";
session_start();
$username = "";
$password = "";
if(isset($_POST['username']) && isset($_POST['password'])){
	$user = $_POST['username'];
	$pw = md5($_POST['password']);
	$kueri = mysqli_query($koneksi,"SELECT * FROM user WHERE usr_login='$user' AND usr_password='$pw'") or die("ggl");
	if($kueri != false){
		if(mysqli_num_rows($kueri)== 1){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['password'] = $_POST['password'];
		};
	};

};?>
<div id='wrapper'>
	<?php
	include "header.php";
	?>
	<div class='border'>
<img src='image/border.jpg'/></div>
	<?php
	include 'navigasi.php';
	?>
<h2>Login Form</h2>
<hr>
<?php
if(empty($username)){
	if(isset($_POST['username']) || isset($_POST['password'])){
		echo "<div style='text-align:center;'><strong>Username</strong> atau <em>Password</em> Salah</div>";
	};
?>
<form method="post" action="login.php">
	<label>Username</label><br/>
		<input type="text" name="username"/><br/>
	<label>Password</label><br/>
		<input type="password" name="password"/><br/>
	<input type="submit" value="login"/>
</form>
<?php
}	else{
		$kueri = mysqli_query($koneksi,"SELECT * FROM user") or die("gagal masuk");
		$cc = mysqli_fetch_array($kueri);
		if($cc['usr_hak']=="admin"){
			header("Location:admin/index.php");
		}else if($cc['usr_hak']=="user"){
			header("Location:user/index.php");
		}else{
			//echo "Anda Belum Melakukan Login";
			die();
		};
};
?>
<?php
include "footer.php";
?>
</body>
</HTML>