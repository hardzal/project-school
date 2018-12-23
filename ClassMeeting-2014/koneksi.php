<?php
$koneksi = mysqli_connect("localhost","root","phpmyadmin","jurnal_2014") or die("gagal membaca database");
if(!isset($koneksi)){
	mysqli_error();
}
?>