<?php
session_start();
require "../koneksi.php";
include "../head.php";
?>

 <title>Gallery Photo | Perpustakaan Online</title>
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
			<article>
				<?php
					$proses = isset($_GET['page']) ? $_GET['page'] : "";
					if($proses ==""){
						$proses = "index";
					}
					switch($proses){
						case "index":
							if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
								header("Location:../index.php");
							}
							echo "<h2>Gallery Panel</h2><hr/><br/>
							<a href='gallery.php?page=add'>Tambah</a> Lagi!?";
							$query = mysqli_query($koneksi,"SELECT * FROM gallery ORDER BY id DESC");
							if(mysqli_num_rows($query) > 0 ){
								echo "<table>
									<tr>
										<th>No</th>
										<th>Judul</th>
										<th>Deskripsi</th>
										<th colspan='2'>Action</th>
										
									</tr>";
									$no = 1;
								while($q_g = mysqli_fetch_array($query)){
									echo "<tr>
											<td>".$no."</td>
											<td><a href='gallery.php?page=view&id=".$q_g['id']."'><img src='../image/".$q_g['nama_file']."'/></a><br/>
												<strong>".$q_g['judul']."</strong></td>
											<td>".substr($q_g['deskripsi'],0,50)."</td>
											<td><a href='gallery.php?page=edit&id=".$q_g['id']."'>Edit</a></td>
											<td><a href='gallery.php?page=del&id=".$q_g['id']."' onclick='return confirm(\"Apa Yakin ingin menghapus photo ini?\")'>Del</a></td>
										</tr>";
								}
								echo "</table>";
							}else{
								echo "<p>Belum ada Photo yang ditambahkan ke gallery anda!. <br/>
										<a href='gallery.php?page=add'>Tambahkan</a> Sekarang juga</p>";
							}
						break;
						case "add":
							if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
								header("Location:../index.php");
							}

					echo "<h2>Tambah Photo</h2><br/>";
						if(isset($_POST['submit'])){
							$dir = "../image/";
							$img_name = $_FILES['image']['name'];
							$img_type = $_FILES['image']['type'];
							$img_size = $_FILES['image']['size'];
							$img_tmp = $_FILES['image']['tmp_name'];
							$judul = addslashes(strip_tags($_POST['judul']));
							$isi = addslashes(strip_tags($_POST['isi']));
							if(move_uploaded_file($img_tmp,$dir.$img_name)){
								$query = mysqli_query($koneksi,"INSERT INTO gallery VALUES('','$judul','$img_name','$isi')");
								if($query)
									echo "Berhasil Menambah Photo!";
								else
									echo "Gagal Menambah Berita!";
							}

							
						}
					echo "<form method='post' action='' enctype='multipart/form-data'>
							<ul class='form'>
								<li>Judul Photo</li>
								<li>:</li>
								<li><input type='text' name='judul'/></li>
							</ul>
							<ul class='form'>
								<li>Image</li>
								<li>:</li>
								<li><input type='file' name='image'/></li>
							</ul>
						  <ul class='form'>
						  	<li>Deskripsi</li>
						  	<li>:</li>
						  	<li><textarea name='isi'></textarea></li>
						  </ul>
						  <ul class='form'>
						  	<li><input type='submit' name='submit'/></li>
						  </ul>
						 </form>";
						break;
						case "edit":
							if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
								header("Location:../index.php");
							}
							$id = addslashes(strip_tags($_GET['id']));
							$query = mysqli_query($koneksi,"SELECT * FROM gallery WHERE id='$id'");
						$q_be = mysqli_fetch_array($query);
					echo "<h2>Edit Photo: ".$q_be['judul']."</h2><hr/><br/>";
							if(isset($_POST['submit'])){
								$judul = addslashes(strip_tags($_POST['judul']));
								$isi = addslashes(strip_tags($_POST['isi']));
								$dir = "../image/";
								$img_name = $_FILES['gambar']['name'];
								$img_size = $_FILES['gambar']['size'];
								$img_type = $_FILES['gambar']['type'];
								$img_tmp = $_FILES['gambar']['tmp_name'];
								if($judul!=""&&$isi!=""){
									if($img_tmp!=""){
										move_uploaded_file($img_tmp,$dir.$img_name);
										unlink("../image/$q_be[nama_file]");
										$query = mysqli_query($koneksi,"UPDATE gallery SET judul='$judul',nama_file='$img_name',deskripsi='$isi' WHERE id='$id'") or die(mysqli_error($koneksi));
									}else{
										$query = mysqli_query($koneksi,"UPDATE gallery SET judul='$judul',deskripsi='$isi' WHERE id='$id'") or die(mysqli_error($koneksi));
									}
									
										if($query){
											echo "Photo telah di Update! <a href='gallery.php?page=view&id=".$id."'>Lihat</a>";
										}else{
											echo "Ada yang salah<br/><a href='javascript:history.back()'>Kembali</a>";
										}
								}else{
									echo $_FILES['gambar']['error']."<br/>";
									echo "Form Harus diisi dengan seluruhnya dengan benar <br/>
											<a href='javascript:history.back()'>Kembali</a>";
								}
							}
							
					echo "<form method='post' action='' enctype='multipart/form-data'>
							<ul class='form'>
								<li>Judul</li>
								<li>:</li>
								<li><input type='text' name='judul' value='".$q_be['judul']."'/></li>
							</ul>
							<ul class='form'>
								<li>Image</li>
								<li>:</li>
								<li><img src='../image/".$q_be['nama_file']."'/></li>
								<li><input type='file' name='gambar'/></li>
							</ul>
							<ul class='form'>
								<li>Isi</li>
								<li>:</li>
								<li><textarea name='isi' rows='10' cols='50'>".$q_be['deskripsi']."</textarea></li>
							</ul>
							<ul class='form'>
								<li><input type='submit' name='submit' value='UPDATE'/></li>
							</ul>
						</form>";
						break;
						case "del":
							if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
								header("Location:../index.php");
							}
							$id = addslashes(strip_tags($_GET['id']));

							$q_s = mysqli_query($koneksi,"SELECT * FROM gallery WHERE id='$id'");
							$q_sef = mysqli_fetch_array($q_s);
							if(unlink("../image/$q_sef[nama_file]")){
							$query = mysqli_query($koneksi,"DELETE FROM gallery WHERE id='$id'");
								if($query)
									header("Location:gallery.php?page=index");
								else
									echo "So-sorry <a href='javascript:history.back()'>Kembali</a>";
							}else{
								echo "adanya yang salah bro! <br/><a href='javascript:history.back()'>Kembali</a>";
							}
						break;
						case "view":
							$id = addslashes(strip_tags($_GET['id']));
							$query = mysqli_query($koneksi,"SELECT * FROM gallery WHERE id='$id'");
							$q_d = mysqli_fetch_array($query);
							
							echo "<h2>".$q_d['judul']."</h2><hr/><br/>
									<img src='../image/".$q_d['nama_file']."' title='".$q_d['judul']."'/>
									<p>".$q_d['deskripsi']."</p>";
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