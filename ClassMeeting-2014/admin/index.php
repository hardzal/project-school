<!DOCTYPE html>
<HTML>
<head>
<title>Control Panel | Administrator</title>
<link href='../style/style.css' type='text/css' rel='stylesheet'/>
<link href=''/>
<style type='text/css'>

</style>
</head>
<body>
	<div id='wrapper'>

<?php
require_once "../koneksi.php";
session_start();
include "nav.php";
if($_SESSION['username']== "admin"){
	$username = $_SESSION['username'];
	include("header.php");
?>
<div class="menu">
	<h3>Ikhtisar</h3>
	<div class='menu-in'>
		<ul>
			<li>Edit Akun</li>
			<li><a href='logout.php'>Logout</a></li>
		</ul>
	</div>
</div>
<div class='iktisar'>
<p>Terima Kasih telah menyempatkan diri untuk login</p><br/>

</div>
<?php
}
else{
	echo "<p>Maaf Anda Belum Login Sebagai Administator</p>";
	header("Location:../index.php");
};
mysqli_close($koneksi);
?>
<div style="clear:both;"></div>
<?php
include("../footer.php");
?>
</div>
</body>
</HTML>