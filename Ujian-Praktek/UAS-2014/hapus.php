<!DOCTYPE html>
<HTML>
<head>
<title>Sukses Hapus</title>
<link href="layout.css" rel="stylesheet" type="text/css"/>
<meta http-equiv="refresh" content="3;URL=index.php"/>
</head>
<body>
<div id="bentuk">
		<header>
			<h1>Toko Komik Gramedia</h1>
		</header>
		<div id="pelangi">
			<div class="red"></div>
			<div class="yellow"></div>
			<div class="green"></div>
			<div class="blue"></div>
		</div>
		<nav id="nav">
			<ul>
				<li><a href="index.php" target="_blank">Beranda</a></li>
				<li><a href="about.php" title="tentang web">Tentang Kami</a></li>
				<li><a href="contact.php">Kontak</a></li>
		</nav>
		<div style="clear:both"/>
		<aside>
		<div class="sidel">
			<h3>Info</h3>
			<div class="sidec">
				<p>Sebuah Web Offline yang sederhana yang menggunakan bahasa PHP dan MySQL Serta Penampilan Web yang menggunakan HTML5 dan CSS3</p>
				</div>
		</div>
		</aside>
		<article>
		<div class="komik">
	
<?php
include "electric.php";
$dapet = $_GET['id'];
$hapus = mysqli_query($sukses,"DELETE FROM toko WHERE id='$dapet'");
mysqli_close($sukses);
echo "<p>Data Sudah kami hapus dengan semestinya, Terima Kasih telah menggunakan Layanan Kami! Halaman Ini Akan Kami Alihkan dalam 3 Detik</p>";
?>
</div>
</article>
		<footer>
			<p>Dibuat manual Menggunakan Kokoro(Hati) ©2014</p>
		</footer>	

	</div>
</body>
</HTML>