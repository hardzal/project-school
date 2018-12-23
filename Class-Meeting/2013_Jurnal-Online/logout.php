<!DOCTYPE html>
<HTML>
<head>
<title>Logout</title>
</head>
<body>
<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['password']);
?>
<p>
	<a href='login.php'>Login Form</a> | <a href='member.php'>Member Form</a> 
<p>Terima kasih, Anda telah logout dari akun anda</p>
</body>
</HTML>