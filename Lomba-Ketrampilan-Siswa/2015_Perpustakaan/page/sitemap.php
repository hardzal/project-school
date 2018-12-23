<?php
session_start();
require "../koneksi.php";
include "../head.php";
?>

 <title>Perpustakaan Online | Be Informed Be Think </title>
  <link href='../css/style.css' rel='stylesheet' type='text/css'/>
 <link href='../image/icon.ico' type='image/x-icon' rel='icon'/>
<style type='text/css'>

</style>
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
				<h2>Site Map</h2><hr/>
				<?php
				echo "<br/><br/><h4>Daftar Seluruh Buku</h4><ul>";
				$query = mysqli_query($koneksi,"SELECT * FROM buku ORDER BY judul_buku");
				while($q_buk = mysqli_fetch_array($query)){
					echo "<li><a href='buku.php?page=view&id=".$q_buk['id_buku']."'>".$q_buk['judul_buku']."</a></li>";
				}
				echo "</ul><br/>
				<br/>
				<h4>All News</h4><hr/>";
				$qu = mysqli_query($koneksi,"SELECT * FROM berita ORDER BY judul_berita");
				echo "<ul>";
				while($q_n = mysqli_fetch_array($qu)){
					echo "<li><a href='berita.php?page=view&id=".$q_n['id_berita']."'>".$q_n['judul_berita']."</a></li>";
				}
				echo "</ul>";
				?>
			</article>
			<?php
				include "panel.php";
			?>
		</section>
		<aside class='kanan'>
			<?php
			
			include "../sidebar.php";
			?>
		</aside>
		</div>
		<div class='clear'></div>
	<?php
		include "../footer.php";
	?>	
	</div>	
</body>
</html>