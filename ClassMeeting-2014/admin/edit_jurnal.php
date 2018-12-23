<!DOCTYPE html>
<HTML>
<head>
	<link href='../style/style.css' rel='stylesheet' type='text/css'/>
<?php
	require_once "../koneksi.php";
$id_jurnal = $_GET['id_jurnal'];
$kueri = mysqli_query($koneksi,"SELECT * FROM db_jurnal WHERE id_jurnal='$id_jurnal'") or die("Gagal Oeoeo");
$aa = mysqli_fetch_array($kueri);
session_start();
?>
<title>Edit Jurnal <?php echo $aa['judul'];?> </title>
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
		<form method='post' action='editor_jurnal.php'/>
		<ul>
			<li><label>ID Jurnal</label></li>
			<li><input type="number" name="id_jurnal" value="<?php echo $aa['id_jurnal'];?>"/></li>
		</ul>
		<ul>
			<li><label>Judul</label></li>
			<li><input type='text' name='judul' value="<?php echo $aa['judul'];?>"/></li>
		</ul>
			<ul>
				<li><label>Kategori</label></li>
				<li><input type="text" name="kategori" value="<?php echo $aa['kategori'];?>"/></li>
			</ul>
			<ul>
				<li><label>Tanggal</label></li>
				<li><input type='date' name='tgl_buat' value="<?php echo $aa['tgl_buat'];?>"/></li>
			</ul>
		<ul>
			<li><label>Content</label></li>
			<li><textarea name='isi'><?php echo $aa['isi'];?></textarea></li>
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