<!DOCTYPE html>
<HTML>
	<?php
		require_once "koneksi.php";
	?>
<head>
<meta charset='UTF-8'/>
<title>Jurnal Website</title>
<link href='style/style.css' type='text/css' rel='stylesheet'/>
<link href='' type='text/css' rel='stylesheet'/>
<style type='text/css'>

		.wadah-mengetik
		{
			font-size: 24px;
			width: 740px;
			margin:0 auto;
			font-weight:200;

			line-height:100px;
			white-space:nowrap;
			overflow:hidden;
			-webkit-animation: ketik 5s steps(50, end);
			animation: ketik 5s steps(50, end);
		}

		@keyframes ketik{
				from { width: 0; }
		}

		@-webkit-keyframes ketik{
				from { width: 0; }
		}
</style>
<body>
<div id='wrapper'>
	<?php
	include "header.php";
	?>
	<div class='border'>
<img src='image/border.jpg' /></div>
	<?php
	include 'navigasi.php';
	?>
	<!--<article>
		
</article>-->
	<aside>
		<div id='sider'>
		<div id='sidebar-left'>
			<h3>Selamat Datang!</h3>
			<p>Terima kasih telah berkunjung ke Jurnal Website. 
			</p><a href='login.php' >Login<a/> | <a href='register.php'>Register</a><br/>
			<a href='ketentuan.php'>Ketentuan</a> | <a href='keuntungan.php'>Keuntungan</a>
		</div>
		<div id="sidebar-left">
			<p>Visitor : <strong>1</strong></p>
			<p>Who Online : </strong>1</strong></p>
		</div>
	</div>
</aside>
<div id="anis">
	<h1><p class="wadah-mengetik">Welcome to Website Journal Online|</h1> </p>
	<?php
	include "post-body.php";
	include "sidebar.php";
	?>
	<!---<div style='clear:both;'></div>-->
<div style='clear:both'></div>
<div class='garis'>
	<div class='merah'></div>
	<div class='ungu'></div>
	<div class='biru'></div>
	<div class='kuning'></div>
	<div class='hijau'></div>
	<div class='oraye'></div>
	<div class='coklat'></div>
</div>
<?php
include("footer.php");
?>
</div>				
</body>
</HTML>
<?php
mysqli_close($koneksi);
?>