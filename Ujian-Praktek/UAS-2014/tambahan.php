<!DOCTYPE html>
<HTML>
<head>
<title>Sukses</title>
<meta http-equiv="refresh" content="0;URL=index.php"/>
</head>
<body>
<?php
include "electric.php";
$seri = $_POST['nomer'];
$judul = $_POST['judul'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];
$acak = mysqli_query($sukses,"INSERT INTO toko VALUE('$seri','$judul','$pengarang','$penerbit')");

mysqli_close($sukses);
?>
</body>
</HTML>