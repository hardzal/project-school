<!DOCTYPE html>
<HTML>
<head>
<?php
require_once "koneksi.php";
$id_jurnal = $_GET['id_news'];
$kueri = mysqli_query($koneksi,"SELECT * FROM db_news WHERE id_news='$id_jurnal'");
$qc = mysqli_fetch_array($kueri);
?>
<title><?php echo $qc['judul'];?></title>
<link href="style/style.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<div id="wrapper">

<?php
include "header.php";
include "navigasi.php";
$ki = mysqli_query($koneksi,"SELECT * FROM db_news WHERE id_news='$id_jurnal'") or die("Gagal Membaca DataBase Jurnal");
$qq = mysqli_fetch_array($ki);
?>
<div class="post-jurnal">
	<div class="kepala-post"><h2><a href='sample.php?id_news?='<?php echo $qq['id_news'].">".$qq['judul']."</a></h2></div>
	<hr/>".$qq['isi'];?>

</div>

</div>
</body>
</HTML>

