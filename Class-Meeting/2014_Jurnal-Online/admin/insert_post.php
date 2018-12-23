<!DOCTYPE html>
<HTML>
<head>
<title>Input Data Jurnal</title>
</head>
<body>
<?php
require_once "../koneksi.php";
$id_jurnal = $_POST['id_jurnal'];
$judul = $_POST['judul'];
$kategori = $_POST['kategori'];
$tgl_buat = $_POST['tgl_buat'];
$isi = $_POST['isi'];
$kueri = mysqli_query($koneksi,"INSERT INTO db_jurnal VALUES('$id_jurnal','$judul','$tgl_buat','$kategori','$isi')") or die("gagal");
header("Location:jurnal-post.php");
mysqli_close($koneksi);
?>
</body>
</HTML>