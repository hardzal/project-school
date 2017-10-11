<?php
session_start();
require_once "../koneksi.php";
include "../head.php";
?>
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
				if($proses == ""){
					$proses = "index";
				}

				switch($proses){
					case "index":
				if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
					if($_SESSION['status']==0){
						header("Location:../index.php");
					}
				}
						$query = mysqli_query($koneksi,"SELECT berita.id_berita,berita.judul_berita,kategori.nama_kategori,berita.penulis FROM berita,kategori WHERE berita.id_kategori=kategori.id_kategori ORDER BY berita.judul_berita");
						echo "<title>Halaman Control Panel</title>";
						if(mysqli_num_rows($query) > 0){
							echo "<h2>Daftar Berita</h2><hr/>".
								"<a href='berita.php?page=add'>Tambah Berita</a> | <a href='admin.php?page=kategori'>Tambah Kategori</a> <br/>
								<table class='panel'>
									<tr>
										<th>Judul Berita</th>
										<th>Kategori</th>
										<th>Penulis</th>
										<th colspan='2'>Action</th>
									</tr>";
								while($q_be = mysqli_fetch_array($query)){
									echo "<tr>
											<td><a href='berita.php?page=view&id=".$q_be['id_berita']."'>".$q_be['judul_berita']."</a></td>
											<td>".$q_be['nama_kategori']."</td>
											<td>".$q_be['penulis']."</td>
											<td><a href='berita.php?page=edit&id=".$q_be['id_berita']."'>Edit</a></td>
											<td><a href='berita.php?page=del&id=".$q_be['id_berita']."' onclick='return confirm(\"Apa anda yakin ingin menghapus berita ini\")'>Del</a></td>
										</tr>";
								}
							echo "</table>";

						}else{
							echo "Belum ada berita! <a href='berita.php?page=add'>Tambah</a> Sekarang!";
						}
					break;
					case "add":
				if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
					if($_SESSION['status']==0){
						header("Location:../index.php");
					}
				}

				echo "<title>Halaman Control Panel</title>";
					echo "<h2>Tambah Berita</h2><br/>";
						if(isset($_POST['submit'])){
							$dir = "../image/";
							$img_name = $_FILES['image']['name'];
							$img_type = $_FILES['image']['type'];
							$img_size = $_FILES['image']['size'];
							$img_tmp = $_FILES['image']['tmp_name'];
							$judul = $_POST['judul_berita'];
							$kategori = $_POST['kategori'];
							$isi = $_POST['isi'];
							$username = $_SESSION['username'];
							if(move_uploaded_file($img_tmp,$dir.$img_name)){
								$query = mysqli_query($koneksi,"INSERT INTO berita VALUES('','$judul','$kategori','$username','$img_name','$isi',now())");
								if($query)
									echo "Berhasil Menambah Berita!";
								else
									echo "Gagal Menambah Berita!";
							}

							
						}
					echo "<form method='post' action='' enctype='multipart/form-data'>
							<ul class='form'>
								<li>Judul Berita</li>
								<li>:</li>
								<li><input type='text' name='judul_berita'/></li>
							</ul>
							<ul class='form'>
								<li>Image</li>
								<li>:</li>
								<li><input type='file' name='image'/></li>
							</ul>
							<ul class='form'>
								<li>Kategori</li>";
							$q_k = mysqli_query($koneksi,"SELECT * FROM kategori");
					echo "<li>:</li>
						  <li><select name='kategori'>";
						  while($q_kk = mysqli_fetch_array($q_k)){
						  	echo "<li><option value='".$q_kk['id_kategori']."'>".$q_kk['nama_kategori']."</option>";
						  }echo "</select></li>
						  </ul>
						  <ul class='form'>
						  	<li>Content</li>
						  	<li>:</li>
						  	<li><textarea name='isi'></textarea></li>
						  </ul>
						  <ul class='form'>
						  	<li><input type='submit' name='submit'/></li>
						  </ul>
						 </form>";

					break;
					case "view":
						$id = isset($_GET['id']) ? $_GET['id'] : "";
						if($id==""){
							header("Location:../index.php");
						}
						$query = mysqli_query($koneksi,"SELECT berita.id_berita,berita.judul_berita,kategori.nama_kategori,berita.penulis,berita.path_gambar,berita.isi,berita.date FROM berita,kategori WHERE berita.id_kategori=kategori.id_kategori AND berita.id_berita='$id'");
						$q_be = mysqli_fetch_array($query);
						echo "<title>".$q_be['judul_berita']."</title>";
						echo "<h2><a href='berita.php?page=view&id=".$q_be['id_berita']."'>".$q_be['judul_berita']."</a></h2>
								<hr/>
								<span>".$q_be['penulis']." | ".$q_be['nama_kategori']." | ".$q_be['date']. "</span><br/><br/>
								<a href='berita.php?page=view&id=".$q_be['id_berita']."'><img src='../image/".$q_be['path_gambar']."' alt='".$q_be['judul_berita']."' title='".$q_be['judul_berita']."' class='news'/></a><br/>
								<p>".$q_be['isi']."</p>";
					break;
					case "edit":
				if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
					if($_SESSION['status']==0){
						header("Location:../index.php");
					}
				}
						$id = addslashes(strip_tags($_GET['id']));
							$query = mysqli_query($koneksi,"SELECT berita.judul_berita,berita.id_kategori,kategori.nama_kategori,berita.penulis,berita.path_gambar,berita.isi,berita.date FROM berita,kategori WHERE berita.id_kategori=kategori.id_kategori AND berita.id_berita='$id'") or die("gagal banget lek");
						$q_be = mysqli_fetch_array($query);
					echo "<h2>Edit Berita : ".$q_be['judul_berita']."</h2><hr/><br/>";
							if(isset($_POST['submit'])){
								$judul = addslashes(strip_tags($_POST['judul']));
								$kategori = $_POST['kategori'];
								$isi = addslashes(strip_tags($_POST['isi']));
								$dir = "../image/";
								$img_name = $_FILES['gambar']['name'];
								$img_size = $_FILES['gambar']['size'];
								$img_type = $_FILES['gambar']['type'];
								$img_tmp = $_FILES['gambar']['tmp_name'];
								
							if($judul!="" && $kategori!= "" && $isi!= ""){
								if($img_tmp!=""){
									unlink("../image/$q_be[path_gambar]");
									move_uploaded_file("$img_tmp",$dir.$img_name);
									$query = mysqli_query($koneksi,"UPDATE berita SET judul_berita='$judul',id_kategori='$kategori',path_gambar='$img_name',isi='$isi' WHERE id_berita='$id'");
								}else{
									$query = mysqli_query($koneksi,"UPDATE berita SET judul_berita='$judul',id_kategori='$kategori',isi='$isi' WHERE id_berita='$id'");
								}
								
									echo "Berita Berhasil di Update! <a href='berita.php?page=view&id=".$id."'>Lihat</a>";	
								}else{
									echo "Form Harus diisi dengan seluruhnya dengan benar <br/>
											<a href='javascript:history.back()'>Kembali</a>";
								}
							}
							
					echo "<form method='post' action='' enctype='multipart/form-data'>
							<ul class='form'>
								<li>Judul</li>
								<li>:</li>
								<li><input type='text' name='judul' value='".$q_be['judul_berita']."'/></li>
							</ul>
							<ul class='form'>
								<li>Kategori</li>
								<li>:</li>
								<li><select name='kategori'>";
								$q = mysqli_query($koneksi,"SELECT * FROM kategori");
								while($q_kt = mysqli_fetch_array($q)){
									echo "<option value='".$q_kt['id_kategori']."'>".$q_kt['nama_kategori']."</option>";
									};
								echo "</select>
								</li>
							</ul>
							<ul class='form'>
								<li>Image</li>
								<li>:</li>
								<li><img src='../image/".$q_be['path_gambar']."'/></li>
								<li><input type='file' name='gambar'/></li>
							</ul>
							<ul class='form'>
								<li>Isi</li>
								<li>:</li>
								<li><textarea name='isi' rows='10' cols='50'>".$q_be['isi']."</textarea></li>
							</ul>
							<ul class='form'>
								<li><input type='submit' name='submit' value='UPDATE'/></li>
							</ul>
						</form>";
					break;
					case "del":
				if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
					if($_SESSION['status']==0){
						header("Location:../index.php");
					}
				}
						$id = addslashes(strip_tags($_GET['id']));

							$q_s = mysqli_query($koneksi,"SELECT * FROM berita WHERE id_berita='$id'");
							$q_sef = mysqli_fetch_array($q_s);
							if(unlink("../image/$q_sef[path_gambar]")){
							$query = mysqli_query($koneksi,"DELETE FROM berita WHERE id_berita='$id'");
								if($query)
									header("Location:berita.php?page=index");
								else
									echo "So-sorry <a href='javascript:history.back()'>Kembali</a>";
							}else{
								echo "adanya yang salah bro! <br/><a href='javascript:history.back()'>Kembali</a>";
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