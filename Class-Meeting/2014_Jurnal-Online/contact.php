<!DOCTYPE html>
<HTML>
<head>
<title>Contact Us</title>
<?php
require_once "koneksi.php";
?>
<link href="style/style.css" type="text/css" rel="stylesheet"/>
<style type="text/css">
	
</style>
</head>
<body>
<div id="wrapper">
	<?php
		include "header.php";
		include "navigasi.php";
	?>
	<div class="post">
		<div class="head-post"><h2>Contact Us</h2></div>
		<div class="ket-post"><span>Author</span>
		</div>
		<div class="isi-post">
			<p>Ini Adalah halaman Contact Us dimana anda bisa menghubungi kami, Jika Ada Masalah dengan kami silahkan hubungi kami melalui
			Social Media</p> 
				<ul>
					<li>Twitter : <a href='#'>@socialmedia</a></li>
					<li>Facebook : <a href='#'>Jurnal Website</a></li>
					<li>Path : <a href='#'>Path</a></li>
				</ul>
			<span>Catatan Anda Bisa bertanya dengan Private Message atau secara langsung bertanya lewat timeline atau mention kami</span>
		<p>Atau Jika Kalian Tidak Ingin Menghubungi Kami lewat akun social media anda bisa menghubungi kami lewat email dengan mengetikkan langsung dibawah</p>
		<h3 style="margin-bottom:10px;border-bottom:2px solid #ddd;">Form Contact</h3>
		<form method="post" action="#">
			<ul>
				<li><label>Nama</label></li>
				<li><input type="text"/><li><br/>
			<li><label>Keluhan</label></li>
				<li><textarea></textarea></li>
			<br/><input type="submit" value="kirim"/>
			</form>
		</div>
	</div>
	<?php
	include "sidebar.php";
?>
<div style="clear:both;"></div>
	<?php

	include "footer.php";
	?>
</div>
</body>
</HTML>