<?php
require_once "koneksi.php";
$kueri = mysqli_query($koneksi,"SELECT A.kategori,B.kategori FROM db_jurnal AS A,kategori AS B");