<?php
session_start();
require_once "../koneksi.php";
include "../head.php";
if($_SESSION['level']!="member"){
	header("Location:../index.php");
}
?>
<title>News Panel | Administrator Page</title>
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
				<p>Selamat Datang,<?php echo $_SESSION['username'];?><br/>
				<a href='../index.php'>Homepage</a> | <a href='../logout.php'>Logout</a>
				</p>
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