<?php
session_start();
require_once "../koneksi.php";
include "../head.php";
if($_SESSION['level']!="admin"){
	header("Location:../index.php");
}
?>
<title>Control Panel | Administrator Page</title>
 <link href='../css/style.css' rel='stylesheet' type='text/css'/>
 <link href='../image/icon.ico' type='image/x-icon' rel='icon'/>
<style type='text/css'>
 ul.list{
 	list-style:square outside;
 }
 ul.list li{
 	border-bottom:1px dotted #ddd;
 }
 article.post{
 	padding:50px;
 	width:100%;
 }
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
				<article class='post'>
				<p>Selamat Datang, <?php echo $_SESSION['username'];?><br/>
					<?php
					 $q_bok = mysqli_query($koneksi,"SELECT * FROM buku");
					 $q_b = mysqli_query($koneksi,"SELECT * FROM berita");
					 $q_m = mysqli_query($koneksi,"SELECT * FROM akun WHERE level='member' AND status=0");
					 echo "<ul class='list'>
							<li><a href='berita.php'>News Panel</a></li>
							<li><a href='buku.php'>Book Panel</a></li>
							<li><a href='gallery.php'>Gallery Panel</a></li>
							<li><a href='member.php'>Member Panel</a></li>
					 		<li>Jumlah Buku : ".mysqli_num_rows($q_bok)."</li>
					 		<li>Jumlah Berita : ".mysqli_num_rows($q_b)."</li>
					 		<li>Member Baru : ".mysqli_num_rows($q_m)."</li>
					 		</ul><br/><br/>
					 	<span><a href='../index.php'>Halaman Utama</a> | <a href='../logout.php'>Logout</a></span>";
					?></p>
				</article>
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