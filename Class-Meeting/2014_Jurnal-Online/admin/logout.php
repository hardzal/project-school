<!DOCTYPE html>
<HTML>
<head>
	<?php
	require_once "../koneksi.php";
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['password']);
	header("Location:../index.php");
	?>
</head>
<body>


</body>
</HTML>