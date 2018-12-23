<!DOCTYPE html>
<html>
<head>
<title>Toko Buku : Komik</title>
<link href="layout.css" type="text/css" rel="stylesheet"/>
<meta charset="UTF-8"/>
<?php
include "electric.php";
?>
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
			<div class="sider">
			<h2>Daftar Komik</h2>
			<a href="tambah.php" title="Tambah Komik Baru">Tambah Baru</a>
			<table>
				<tr>
					<th>S/N</th>
					<th>Juduk Komik</th>
					<th>Pengarang</th>
					<th>Penerbit</th>
					<th colspan="2">Action</th>
				</tr>
				<?php
					$pilihan = mysqli_query($sukses,"SELECT * FROM toko") or die("Gagal lagi Tjoewk"); 
					while($xd = mysqli_fetch_array($pilihan)){
					?>
				<tr>
					<td><?php echo $xd['id'];?></td>
					<td><?php echo $xd['judul'];?></td>
					<td><?php echo $xd['pengarang'];?></td>
					<td><?php echo $xd['penerbit'];?></td>
					<td><a href="ubah.php?id=<?php echo $xd['id'];?>">Ubah</a></td>
					<td><a href="hapus.php?id=<?php echo $xd['id'];?>">Hapus</a></td>
				</tr>
				<?php
			};
			mysqli_close($sukses);
			?>
 
			</table>
<div class="preview">
	<h2>Preview Komik</h2>
		<div class="komik">

			<img src="alis.jpg" title="Demi Alis"/>

		</div>
		<div class="komik">
			<img src="nggakmain.jpg" title="Demi Alis"/>
		</div>
		<div class="komik">
			<img src="nisekoi.jpg" title="Demi Alis"/>
		</div<div style="clear:both"/>
		<div class="komik">
			<img src="fairy.jpg" title="Demi Alis"/>
		</div>
		<div class="komik">
			<img src="nana.jpg" title="Demi Alis"/>
	</div>
	<div class="komik">
			<img src="emon.jpg" title="Demi Alis"/>
		</div
			</div>
		</div>
		</article>
		<footer>
			<p>Dibuat manual Menggunakan Kokoro(Hati) ©2014</p>
		</footer>	

	</div>
</body>
</html>