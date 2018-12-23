<!DOCTYPE html>
<HTML>
<head>
<?php
require_once "../koneksi.php";
$id_jurnal = $_GET['id_jurnal'];
$kueri = mysqli_query($koneksi,"DELETE FROM db_jurnal WHERE id_jurnal='$id_jurnal'") or die("Gagal Menghapus");
header("Location:jurnal-post.php");
mysqli_close($koneksi);
?>
</head>
<body>
</body>
</HTML>