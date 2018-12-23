<!DOCTYPE html>
<HTML>
<head>
	<?php
	require_once "koneksi.php";
	?>
<title>Site Map</title>
<link href='style/style.css' type='text/css' rel='stylesheet'/>
<style type='text/css'>

</style>
</head>
<body>
<div id="wrapper">
	<?php
	include "header.php";
	include "navigasi.php";
	?>
	<div class="post">
		<div class="post-head"><h2>Site Map</h2></div>
		<div class="isi">
			<ul>
				<li><a href='index.php'>Halaman Utaman</a></li>
				<li><a href='contact.php'>Contact Us</a></li>
				<li><a href='about.php'>About Us</a></li>
				<li><a href='disclaimer.php'>Disclaimer</a></li>
				<li><a href='about-author.php'>About</a></li>
			</ul>
		</div>
	</div>
</div>
</body>
</HTML>