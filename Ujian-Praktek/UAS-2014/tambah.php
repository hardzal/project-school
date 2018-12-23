<!DOCTYPE html>
<HTML>
<head>
<title>Halaman Tambah Data</title>
<link href="layout.css" type="text/css" rel="stylesheet"/>
</head>
<body>
	<div id="bentuk">
		<header>
			<h1>Toko Komik Gramedia</h1>
		</header>
		<div id="pelangi">
			<div class="green"></div>
			<div class="red"></div>
			<div class="yellow"></div>
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
				<table>
			<form name="tambah-data" action="tambahan.php" method="post">
				<tr>
					<th>No Seri</td>
					<td>:</td>
					<td><input type="text" name="nomer"/></td>
				</tr>
				<tr>
					<th>Judul</th>
					<td>:</td>
					<td><input type="text" name="judul"/></td>
				</tr> 
				<tr>
					<th>Pengarang</th>
					<td>:</td>
					<td><input type="text" name="pengarang"/></td>
				</tr>
				<tr>
					<th>Penerbit</th>
					<td>:</td>
					<td><input type="text" name="penerbit"/></td>
				</tr>
				<tr>
					<td colspan="3"><input type="submit" value="Kirim" name="submit"/></td>
				</tr>
			</form>
		</table>
			</div>
		</article>
		<footer>
			<p>Dibuat manual Menggunakan Kokoro ©2014</p>
		</footer>	

	</div>
</body>
</HTML>