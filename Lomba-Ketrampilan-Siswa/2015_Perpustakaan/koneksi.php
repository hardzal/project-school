<?php
ob_start();
error_reporting(0);
$koneksi = mysqli_connect('localhost','root','','lks_kota_2015');
if(!$koneksi)
	return false;
//error_reporting(0);
function login_form(){
	return "<h3>Login</h3>
		<form method='post' action=''>
			<ul class='form'>
				<li>Username</li>
				<li><input type='text' name='username'></li>
			</ul>
			<ul class='form'>
				<li>Password</li>
				<li><input type='password' name='password'/></li>
			</ul>
			<ul class='form'>
				<li><input type='submit' name='submit'/></li>
			</ul><br/>
			<span><a href='register.php'>Daftar</a> | <a href='#'>Lupa Password</a></span>
		</form>";
}
?>