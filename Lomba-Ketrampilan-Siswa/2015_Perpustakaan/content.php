<section class='kiri'>
	<main>
		<h2 class='head'>Buku Terbaru</h2>
		<?php
			$query = mysqli_query($koneksi,"SELECT * FROM buku ORDER BY judul_buku LIMIT 3");
			while($q_bok = mysqli_fetch_array($query)){
		?>
		<div class='buku'>
			<h2><a href='page/buku.php?page=view&id=<?php echo $q_bok['id_buku'];?>'><?php echo $q_bok['judul_buku'];?></a></h2><br/>
		<a href='page/buku.php?page=view&id=<?php echo $q_bok['id_buku'];?>'>
		<?php 
			if($q_bok['path_gambar']!=""){
		?>
				<img src='image/<?php echo $q_bok['path_gambar'];?>' style='width:150px;height:150px;'/>
		<?php
			}else{
		?>
			<img src='image/nocover.png' style='width:150px;height:150px;'/>
		<?php	
			}
		?>
				</a>
		<p><span style='font-size:13px;border-bottom:1px solid #ccc;'><?php echo $q_bok['pengarang']." || ".$q_bok['penerbit'];?></span></p>
		</div>
		<?php
			};
		?>
		</ul>
	</main>	
	<div class='clear'></div>
	<h2 class='head'>Gallery Photo</h2>
	<article style='width:95% !important;'>
	<?php
		$query = mysqli_query($koneksi,"SELECT * FROM gallery ORDER BY id DESC LIMIT 5");
		while($q_g = mysqli_fetch_array($query)){
	?>
		<div class='gal'>
			<a href='page/gallery.php?page=view&id=<?php echo $q_g['id'];?>'><img src='image/<?php echo $q_g['nama_file'];?>' style='width:120px;height:150px;'/></a>
		</div>
	<?php
		};
	?>
	</article>
	<div class='clear'></div>
	<h2 class='head'>Book News</h2>
		<?php
			$query = mysqli_query($koneksi,"SELECT berita.id_berita,berita.judul_berita,kategori.nama_kategori,berita.penulis,berita.path_gambar,berita.isi,berita.date FROM berita,kategori WHERE berita.id_kategori=kategori.id_kategori ORDER BY date DESC LIMIT 3");
			while($q_be = mysqli_fetch_array($query)){
		?>
	<article title='<?php echo $q_be['judul_berita'];?>' style='width:95% !important;'>
			<h3><a href='page/berita.php?page=view&id=<?php echo $q_be['id_berita'];?>'><?php echo $q_be['judul_berita'];?></a></h3>
			<a href='#'><img src='image/<?php echo $q_be["path_gambar"];?>'/></a>
			<div class='author'>Penulis : <?php echo $q_be['penulis'];?></div>
			<div class='date'>Posted On : <?php echo $q_be['date'];?></div>
			<div class='kat'>Kategori : <?php echo $q_be['nama_kategori'];?></div>
			<summary>
				<p><?php echo substr($q_be['isi'],0,75);?>....</p>
				<a href='page/berita.php?page=view&id=<?php echo $q_be['id_berita'];?>'>Read more</a>
			</summary>
		</article>
		<?php
		};
		?>

</section>