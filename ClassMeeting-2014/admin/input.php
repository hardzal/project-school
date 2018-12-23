<!DOCTYPE html>
<HTML>
<head>
<?php
require_once "../koneksi.php";
session_start();
?>
<link href="../style/style.css" type="text/css" rel="stylesheet"/>
<style type="text/css">
.input-post{
	padding:20px;

}
</style>
</head>
<body>
<div id="wrapper">
	<?php
		include "nav.php";
	?>
<?php
if($_SESSION['username']=="admin"){
	?><h3>Selamat Datang <?php echo $_SESSION['username'];?></h3><hr/>
	<div class="input-post">
		<form method='post' action='insert_news.php'/>
		<ul>
			<li><label>ID Jurnal</label></li>
			<li><input type="number" name="id_news"/></li>
		</ul>
		<ul>
			<li><label>Judul</label></li>
			<li><input type='text' name='judul'/></li>
		</ul>
			<ul>
				<li><label>Kategori</label></li>
				<li><input type="text" name="kategori"/></li>
			</ul>
			<ul>
				<li><label>Tanggal</label></li>
				<li><input type='date' name='tgl_buat'/></li>
			</ul>
		<ul>
			<li><label>Content</label></li>
			<li><textarea name='isi'></textarea></li>
		</ul>
			<input type="submit" value="submit" name="submit"/>
			</form>
	</div>
<?php
}else{
 header("location:../index.php");
}
?>
</div>
</body>
</HTML>