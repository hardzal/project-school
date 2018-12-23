<div class='sidebar'>
	<h3>Cari Buku</h3>
	<div class='sideco'>
		<form method='get' action='search.php'>
		<ul class='form'>
			<li>Berdasarkan</li>
			<li><select name='op'>
				<option value='judul_buku'>Judul</option>
				<option value='penerbit'>Penerbit</option>
				<option value='pengarang'>pengarang</option>
				<option value='deskripsi'>Deskripsi</option>
			</select></li>
		</ul>
		<ul class='form'>
			<li>Kata Kunci</li>
			<li><input type='search' name='q' placeholder='type what your search...'/></li>
		</ul>
		<ul class='form'>
			<li><input type='submit' value='cari' style='cursor:pointer;width:250px'/></li>
		</ul>
		</form>
	</div>
</div>
<div class='sidebar'>
	<h3>Statistik</h3>
	<div class='sideco'>
	 <p>
		<ul>
			<li><?php 
				date_default_timezone_set('Asia/Jakarta');
				 $array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
				 $hr = $array_hr[date('N')];

				/* script menentukan tanggal */    
				$tgl= date('j');
				/* script menentukan bulan */ 
				  $array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
				  $bln = $array_bln[date('n')];
				/* script menentukan tahun */ 
				$thn = date('Y');
				/* script perintah keluaran*/ 
				 echo $hr . ", " . $tgl . " " . $bln . " " . $thn . " " . date('H:i')."<br/>";
			 ?></li>
			<li><span>Hits Pengunjung : <strong><?php $q_p = mysqli_query($koneksi,"INSERT INTO pengunjung VALUES('','$_SERVER[REMOTE_ADDR]')");
							echo mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM pengunjung"));?></strong></span></li>
			<li>Koleksi Buku : <?php echo mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM buku"));?></li>
			<li>Jumlah Member : <?php echo mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM akun"));?></li>
	 </p>
	</div>
</div>
<div class='sidebar ads'>
<h3>Event</h3>
	<div class='sideco'>
		<a href='#'><img src='image/10.jpg'></a>
	</div>
</div>		