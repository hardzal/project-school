<!DOCTYPE html>
<HTML>
<head>
<title>Halaman Edit</title>
<link href="layout.css" type="text/css" rel="stylesheet"/>
<?php 
include "electric.php";
$id = $_GET['id'];
$testong = mysqli_query($sukses,"SELECT * FROM toko WHERE id='$id'");
$xd = mysqli_fetch_array($testong);
mysqli_close($sukses);
?>

</head>
<body>
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
				<table>
			<form name="ubah-data" action="ubahan.php" method="post">
				<tr>
					<th>No Seri</td>
					<td>:</td>
					<td><input type="text" name="nomer" value="<?php echo $xd['id'];?>"/></td>
				</tr>
				<tr>
					<th>Judul</th>
					<td>:</td>
					<td><input type="text" name="judul" value="<?php echo $xd['judul'];?>"/></td>
				</tr> 
				<tr>
					<th>Pengarang</th>
					<td>:</td>
					<td><input type="text" name="pengarang" value="<?php echo $xd['pengarang'];?>"/></td>
				</tr>
				<tr>
					<th>Penerbit</th>
					<td>:</td>
					<td><input type="text" name="penerbit" value="<?php echo $xd['penerbit'];?>"/></td>
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