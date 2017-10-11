<?php
session_start();
require "koneksi.php";

	include "head.php";
?>

 <title>Perpustakaan Online | Be Informed Be Think </title>
  <link href='css/style.css' rel='stylesheet' type='text/css'/>
 <link href='image/icon.ico' type='image/x-icon' rel='icon'/>
</head>
<body>
	<div id='container'>
		<?php
			include "header.php";
		?>
		<div class='clear'></div>
		<div id='main-content'>
			<section class='kiri'>
				<article>
				<?php
					$op = addslashes(strip_tags($_GET['op']));
					$q = addslashes(strip_tags($_GET['q']));
					$query = mysqli_query($koneksi,"SELECT * FROM buku WHERE $op LIKE '%$q%'") or die(mysqli_error($koneksi));
						if(mysqli_num_rows($query)==0){
							echo "<p>Maaf, ".$op." buku yang anda cari tidak tersedia. <br/><a href='javascript:history.back()'>Kembali</a></p>";
						}else{
							echo "<h3>Pencarian : <strong>".$q."</strong></h3>";
							echo "<em>Hasil Pencarian Menemukan ".mysqli_num_rows($query)." yang mirip</em>";
							while($q_s = mysqli_fetch_array($query)){
								echo "<div class='post'>
										<h2><a href='page/buku.php?page=view&id=".$q_s['id_buku']."'>".$q_s['judul_buku']."</a></h2>
										<span>".$q_s['pengarang']." || ".$q_s['penerbit']."</span>
										<p class='cont'>".substr($q_s['deskripsi'],0,100)."</p>
											<a href='page/buku.php?page=view&id=".$q_s['id_buku']."'>Baca Selengkapnya</a>
									</div>";
							}
							echo "</ul>";
						}
						
				?>
				</article>
				<?php
					include "page/panel.php";
				?>
			</section>
			<aside class='kanan'>
				<?php
					include "sidebar.php";
				?>
			</aside>
		</div>
		<div class='clear'></div>
	<?php
		include "footer.php";
	?>	
	</div>	
</body>
</html>