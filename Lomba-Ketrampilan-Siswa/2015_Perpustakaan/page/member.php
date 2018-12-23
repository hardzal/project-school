<?php
session_start();
require_once "../koneksi.php";
include "../head.php";
?>
<title>Member Panel | Administrator Page</title>
 <link href='../css/style.css' rel='stylesheet' type='text/css'/>
 <link href='../image/icon.ico' type='image/x-icon' rel='icon'/>
 <style type='text/css'>
 	

 </style>
</head>
<body>
	<div id='container'>
	<?php
		include "header.php";
	?>
	<div class='clear'></div>
	<div id='main-content'>
	<section class='kiri'>
	<?php
	$proses = isset($_GET['page']) ? $_GET['page'] : "";
	if($proses ==""){
		$proses = "list";
	}
	?>
		<article>
		<?php
		switch($proses){
			case "list":
		?>
			<h2>Daftar Member</h2>
			<p>
				<a href='member.php?page=add'>Tambah Member?</a>
			</p>	
			<table class='list'>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Email</th>
						<th>Status</th>
						<th colspan='2'>Action</th>
					</tr>
					<?php
						$query = mysqli_query($koneksi,"SELECT * FROM akun WHERE level='member' ORDER BY status=0");
						$q = 1;
						while($q_m = mysqli_fetch_array($query)){
							if($q_m['status']==0){
							$status = "Belum Terdaftar";
							}else{
								$status = "Terdaftar";
							}
							$username = $q_m['username'];
					?>
						<tr>
							<td><?php echo $q;?></td>
							<td><?php echo $q_m['nama'];?></td>
							<td><?php echo $username;?></td>
							<td><?php echo $q_m['email'];?></td>
							<td><?php echo $status;?></td>
							<td><a href='member.php?page=view&id=<?php echo $q_m['id_akun'];?>'>View</a></td>
							<td><a href='member.php?page=del&id=<?php echo $q_m['id_akun'];?>' onclick='return confirm(\"Anda Yakin ingin Menghapus Akun?\")'>Del</a></td>
						</tr>
					<?php
						$q++;
						}
					?>
				</table>
			<?php
			break;
			case "view":
				$id = addslashes(strip_tags($_GET['id']));
				$query = mysqli_query($koneksi,"SELECT * FROM akun WHERE id_akun='$id'");
				$q_m = mysqli_fetch_array($query);
				if($q_m['status']==false){
					$selected = "";
				}else{
					$selected = "selected";
				}
					echo "<h2>Profil ".$q_m['nama']."</h2><hr/>";
					if(isset($_POST['submit'])){
						$status = $_POST['status'];
						$query = mysqli_query($koneksi,"UPDATE akun SET status='$status' WHERE id_akun='$id'");
						if(!$query)
							echo "Gagal Mengubah Profil Member";
						else
							echo "Berhasil Mengubah Profil Member";
					}
					echo "<form method='post' action=''><ul class='form'>
							<li>Nama</li>
							<li>:</li>
							<li>".$q_m['nama']."</li>
						</ul>".
						"<ul class='form'>
							<li>Username</li>
							<li>:</li>
							<li>".$q_m['username']."</li>
						</ul>".
						"<ul class='form'>
							<li>Email</li>
							<li>:</li>
							<li>".$q_m['email']."</li>
						</ul>".
						"<ul class='form'>
							<li>Daftar Pinjaman Buku</li>
							<li>:</li>
							<li>0</li>
						</ul>".
						"<ul class='form'>
							<li>Status</li>
							<li>:</li>
							<li><select name='status'>
									<option value=0 $selected>Belum terdaftar</option>
									<option value=1 $selected>Terdaftar</option>
								</select></li>
						</ul>".
						"<ul class='form'>
							<li><input type='submit' name='submit' value='change'/></li>
						</ul>".
					"</form><br/>
					<a href='member.php'>Member Panel</a>";
			break;
			case "add":
				echo "<h2>Tambah Member</h2>";
				if(isset($_POST['submit'])){
					$username = $_POST['username'];
					$password = $_POST['password'];
					$nama = $_POST['nama'];
					$email = $_POST['email'];
					$q_m = mysqli_query($koneksi,"SELECT * FROM akun WHERE username='$username'");
					if(mysqli_num_rows($q_m) == 0){
						$query = mysqli_query($koneksi,"INSERT INTO akun VALUES('',1,'member','$username',md5('$password'),'$nama','$email')");
						if($query)
							echo "Berhasil Menambah Akun<br/>
								<a href='member.php?page=list'>Lihat</a>";
						else
							echo "Gagal Menambah akun <br/>
								<a href='javascript:history.back()'>Kembali</a>";
					}else{
						echo "Maaf, Username yang anda daftarkan telah tersedia, harap gunakan username lain <a href='javascript:history.back()'>Kembali</a>";
					}
				}
				echo "<form method='post' action=''>
							<ul class='form'>
								<li>Username</li>
								<li>:</li>
								<li><input type='text' name='username'/></li>
							</ul>
							<ul class='form'>
								<li>Password</li>
								<li>:</li>
								<li><input type='password' name='password'/></li>
							</ul>
							<ul class='form'>
								<li>Nama Lengkap</li>
								<li>:</li>
								<li><input type='text' name='nama'/></li>
							</ul>
							<ul class='form'>
								<li>Email</li>
								<li>:</li>
								<li><input type='text' name='email'/></li>
							</ul>
							<ul class='form'>
								<li><input type='submit' name='submit'/></li>
							</ul>
						</form>";
			break;
			case "del":
				$id = addslashes(strip_tags($_GET['id']));
				$query = mysqli_query($koneksi,"delete from akun where id_akun='$id'");
					if($query){
						header("Location:member.php?page=list");
					}else{
						echo "Gagal Menghapus Member :|, <a href='javascript:history.back()'>Kembali</a>";
					}
			break;
		}
		?>
		
		</article>
		<?php
			include "panel.php";
		?>
	</section>	
	<aside class='kanan'>
		<?php

		include "../sidebar.php";
		?>
	</aside>
	</div>
	<div class='clear'></div>
	<?php
		include "../footer.php";
	?>
	</div>
</body>
</html>