<!DOCTYPE html>
<HTML>
<head>
<?php
require_once "../koneksi.php";
$id_jurnal = $_POST['id_jurnal'];
$judul = $_POST['judul'];
$kategori = $_POST['kategori'];
$tgl_buat = $_POST['tgl_buat'];
$isi = $_POST['isi'];
$kueri = mysqli_query($koneksi,"UPDATE db_jurnal SET id_jurnal='$id_jurnal',judul='$judul',tgl_buat='$tgl_buat',kategori='$kategori',isi='$isi' WHERE id_jurnal='$id_jurnal')") or die("gagal");
header("location:jurnal-post.php");
mysqli_close($koneksi);
?>
</head>
<body>
</HTML>