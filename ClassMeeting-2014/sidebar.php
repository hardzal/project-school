<!--<div style="float:left;max-width:100%;">-->
<div class='sidebar-co'>
	<div class='sidebar-head'>
		<h3>Cari Sesuatu ?</h3>
	</div>
	<strong>PENCARIAN:</strong><br>  
	<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="pencarian" id="pencarian">  
	  <input type="text" name="search" id="search">  
	  <input type="submit" name="submit" id="submit" value="CARI">  
	</form>
<?php  
// menampilkan data  
if ((isset($_POST['submit'])) AND ($_POST['search'] <> "")) {  
  $search = $_POST['search'];  
  $sql = mysqli_query($koneksi,"SELECT * FROM db_jurnal,db_news WHERE nama LIKE '%$search%' ") or die(mysql_error());  
  //menampilkan jumlah hasil pencarian  
  $jumlah = mysqli_num_rows($sql);   
  if ($jumlah > 0) {  
    echo '<p>Ada '.$jumlah.' data yang sesuai.</p>';  
        while ($res=mysqli_fetch_array($sql)) {  
        $nomor++; echo $nomor.'. ';  
        echo $res[judul].'<br>';  
      }  
  }  
  else {  
   // menampilkan pesan zero data  
    echo 'Maaf, hasil pencarian tidak ditemukan.';  
  };
}   
else { echo 'Masukkan dulu kata kuncinya';}  
?>
</div> 
<div class='sidebar-co'>
		<div class='sidebar-head'>
			<h3>Random Journal</h3>
		</div>
	<?php
			$kueri = mysqli_query($koneksi,"SELECT * FROM db_jurnal ORDER BY rand() LIMIT 3");
			while($ce = mysqli_fetch_array($kueri)){
				?>
		<div class='first-post'>
			<div class='post-head'><h2><?php echo $ce['judul'];?></h2></div>
			<div class='desk-post'>
						<p><?php echo $ce['isi'];?></p>
			</div>
	</div>
	<?php
};
?>
</div>
<div class='sidebar-co'>
	<div class='sidebar-head'>	
		<h3>Category Journal</h3>
	</div>
		<div class='sidebar-post'>	
			<ul>
				<?php
				$kuery = mysqli_query($koneksi,"SELECT * FROM db_jurnal") or die("Gagal Memeriksa");
				while($cg=mysqli_fetch_array($kuery)){
					?>
				<li><a href='kategori.php?kategori='<?php echo $cg['kategori'];?>><?php echo $cg['kategori'];?></a></li>
				<?php
					};
				?>
			</ul>
		</div>

</div>
<div class='sidebar-co'>	
	<div class='sidebar-head'>
		<h3>Berlangganan Jurnal</h3>
	</div>
	<div class='sidebar-post'>
		<form method="post" action="">
			<label>Ketik Email Anda</label><br/>
			<input type="email" name="email" placeholder="ketik email anda disini"/>
			<p>Dengan Berlangganan Anda Akan Mendapat Informasi Terbaru dari email ini</p>
		</form>
	</div>
</div>
<!---</div>-->

