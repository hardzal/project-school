<!DOCTYPE html>
<HTML>
<head>
<title>Hapus Data</title>
</head>
<body>
<?php
require_once "koneksi.php";
$kueri = mysqli_query($koneksi,"DELETE FROM db_jurnal WHERE ");
