<!DOCTYPE html>
<HTML>
<head>
<title>Berhasil</title>
<link href="layout.css" type="text/css" rel="stylesheet"/>
<meta http-equiv="refresh" content="1;URL=index.php"/>
</head>
<body>
<?php
include "electric.php";
$id = $_POST['nomer'];
$jdul = $_POST['judul'];
$penerbit = $_POST['penerbit'];
$pengarang = $_POST['pengarang'];

$kueri = mysqli_query($sukses,"UPDATE toko set judul='$jdul',pengarang='$pengarang',penerbit='$penerbit' WHERE id='$id'");
mysqli_close($sukses);
?>
<div id="bentuk">
		<header>
			<h1>Toko Komik Gramedia</h1>
		</header>
		<div id="pelangi">
			<div class="yellow"></div>
			<div class="red"></div>
			
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
			<div class="sider">
				<p>Data Sudah Kami Perbaharui Sesuai Yang sesuai Kamu Mau....</p>
			</div>
		</article>
		<footer>
			<p>Dibuat manual Menggunakan Kokoro ©2014</p>
		</footer>	

	</div>
</body>
</HTML>