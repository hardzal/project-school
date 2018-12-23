<div id='post'>
<div class='kiri-post'>
	<h3>Jurnal Terbaru</h3>
	<?php
	$kueri = mysqli_query($koneksi,"SELECT * FROM db_jurnal");
	while($co = mysqli_fetch_array($kueri)){
	?>
	<div class='post-jurnal'>
		<div class='post-head'><h2><a href="<?php echo "sample.php?id_jurnal=".$co['id_jurnal'];?>" title="<?php echo $co['judul'];?>"><?php echo $co['judul'];?></a></h2></div>
		<div class='post-ket'>
			<img src='image/user.png' style='width:15px;height:15px;' />
			<span><a href='penulis.php'>Author</a>// </span>
			<img src='image/kalender.png' style='width:15px;height:15px;'/>
			<span><?php $tgl = strtotime($co['tgl_buat']);
					$tgl = date('d/F/Y',$tgl);
					echo $tgl;?></span>
			<span><a href='category.php'><?php echo $co['kategori'];?></a> </span>
		</div>
		<div class='desk-post'>
			<p><?php echo $co['isi']; ?></p>	<div class='read-more'><a href="<?php echo "sample.php?id_jurnal=".$co['id_jurnal'];?>" title="<?php echo $co['judul'];?>">Baca Selengkapnya</a></div>
		</div>
	</div>
	<?php
	};
	?>
</div>
<div class='kiri-post'>
	<h3>Berita Terbaru</h3>
	<?php
	$kuerie = mysqli_query($koneksi,"SELECT * FROM db_news");
	while($cc = mysqli_fetch_array($kuerie)){
?>
	<div class='post-news'>
		<div class='post-head'><h2><a href="<?php echo "berita.php?id_news=".$cc['id_news'];?>" title="<?php echo $cc['judul'];?>"><?php echo $cc['judul'];?></a></h2></div>
		<div class='post-ket'>
			<img src='image/user.png' style='width:15px;height:15px;' />
			<span><a href='penulis.php'>Author</a>// </span>
			<img src='image/kalender.png' style='width:15px;height:15px;'/>
			<span><?php echo $cc['tgl_buat'];?></span>
			<span><a href='category.php'><?php echo $cc['kategori'];?></a> </span>
		</div>
		<div class='desk-post'>
			<p><?php echo $cc['isi'];?></p><div class='read-more'><a href="<?php echo "berita.php?id_news=".$cc['id_news'];?>" title="Baca Selengkapnya Mengenai <?php echo $cc['judul'];?>">Baca Selengkapnya</a></div>

		</div>
	</div>
<?php
};
?>	
	</div>
	</div>
