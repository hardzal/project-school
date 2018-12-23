<!DOCTYPE html>
<HTML>
	<?php
		require_once "../koneksi.php";
		session_start();
	?>
<head>
<title>Jurnal Post</title>
<link href='../style/style.css' type='text/css' rel='stylesheet'/>
<style type='text/css'>
#jurnal-post{
	margin-top:10px;
}
.post{
	
	padding:10px;
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
		?>
	<div id="jurnal-post">
		<div class="menu">
	<h3>Ikhtisar</h3>
		<div class='menu-in'>
			<ul>
				<li>Edit Akun</li>
				<li><a href='logout.php'>Logout</a></li>
			</ul>
		</div>
	</div>
	
		<div class="buat">
			<a href="input_jurnal.php">Create New Jurnal</a>
		</div>
		<div style="float:left;width:50%;">
		<?php
			$kueri = mysqli_query($koneksi,"SELECT * FROM db_jurnal") or die("gagal mengindetifikasi Jurnal Anda");
			while($co = mysqli_fetch_array($kueri)){
		?>
		<div class="jurnal_post">
			<div class="head-post"><h3><a href="<?php echo "edit_jurnal.php?id_jurnal=".$co['id_jurnal'];?>"><?php echo $co['judul'];?></a></h3>
				<div class='desk-post'>
			<p><?php echo $co['isi']; ?></p>	
		</div>
				<div class="edit">
					<a href="<?php echo "edit_jurnal.php?id_jurnal=".$co['id_jurnal'];?>" title="Edit Jurnal Anda">Edit</a>
					| <a href="hapus_jurnal.php?id_jurnal=<?php echo $co['id_jurnal'];?>" title="Hapus Jurnal">Hapus</a>
				</div>
			</div>
		</div>
		<?php
			};
		?>
		</div>
	<?php
}
	else{
		echo "<p>Anda Belum Login Sebagai Admin</p>";
	};
	?>
</div>
<div style="clear:both"/>
<?php 
include("../footer.php");
?>
</div>
</body>
</HTML