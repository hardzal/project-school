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
						$query = mysqli_query($koneksi,"SELECT * FROM buku ORDER BY judul_buku");
						echo "<title>Halaman Control Buku</title>";
						if(mysqli_num_rows($query) > 0){
							echo "<h2>Daftar Buku</h2><hr/>".
								"<a href='buku.php?page=add'>Tambah Buku</a> <br/>
								<table>
									<tr>
										<th>Judul Buku</th>
										<th>Pengarang</th>
										<th>Penerbit</th>
										<th>Stock</th>
										<th colspan='2'>Action</th>
									</tr>";
								while($q_be = mysqli_fetch_array($query)){
									if($q_be['stock']===0&&$q_be['stock']==""){
										$stock = "Stock Tidak Tersedia";
									}else{
										$stock = $q_be['stock'];
									}
									echo "<tr>
											<td><a href='buku.php?page=view&id=".$q_be['id_buku']."'>".$q_be['judul_buku']."</a></td>
											<td>".$q_be['pengarang']."</td>
											<td>".$q_be['penerbit']."</td>
											<td>".$stock."</td>
											<td><a href='buku.php?page=edit&id=".$q_be['id_buku']."'>Edit</a></td>
											<td><a href='buku.php?page=del&id=".$q_be['id_buku']."' onclick='return confirm(\"Apakah Anda Yakin ingin menghapus Buku koleksi anda?\")'>Del</a></td>
										</tr>";
								}
							echo "</table>";

						}else{
							echo "Belum ada buku! <a href='buku.php?page=add'>Tambah</a> Sekarang!";
						}
					break;
					case "add":
					if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
						if($_SESSION['status']==0){
							header("Location:../index.php");
						}
					}
					echo "<h2>Tambah Buku</h2><br/>";
						if(isset($_POST['submit'])){
							$dir = "../buku/";
							
							$bk_name = $_FILES['buku']['name'];
							$bk_type = $_FILES['buku']['type'];
							$bk_size = $_FILES['buku']['size'];
							$bk_tmp = $_FILES['buku']['tmp_name'];
							$g_name = $_FILES['sampul']['name'];
							$g_type = $_FILES['sampul']['type'];
							$g_size = $_FILES['sampul']['size'];
							$g_tmp = $_FILES['sampul']['tmp_name'];
							$judul = addslashes(strip_tags($_POST['judul_buku']));
							$isi = addslashes(strip_tags($_POST['deskripsi']));
							$pengarang = addslashes(strip_tags($_POST['pengarang']));
							$penerbit = addslashes(strip_tags($_POST['penerbit']));
							$stock = addslashes(strip_tags($_POST['stock']));
							if($judul!="" && $isi!="" && $pengarang!="" && $penerbit!="" && $stock!=""){
								if($g_tmp!=""&&$bk_tmp!=""){
									move_uploaded_file($g_tmp,"../image/".$g_name);
									move_uploaded_file($b_tmp,"../buku/".$bk_name);
								}								
									$query = mysqli_query($koneksi,"INSERT INTO buku VALUES('','$judul','$pengarang','$penerbit','$bk_name','$g_name','$stock','$isi')");
								if($query)
									echo "Berhasil Menambah Buku!";
								else
									echo "Gagal Menambah Buku!<br/>
											<a href='javascript:history.back()'>Kembali</a>";
							}
						}
					echo "<form method='post' action='' enctype='multipart/form-data'>
							<ul class='form'>
								<li>Judul Buku</li>
								<li>:</li>
								<li><input type='text' name='judul_buku' autocomplete='off'/></li>
							</ul>
							<ul class='form'>
								<li>Pengarang</li>
								<li>:</li>
								<li><input type='text' name='pengarang' autocomplete='off'/></li>
							</ul>
							<ul class='form'>
								<li>Penerbit</li>
								<li>:</li>
								<li><input type='text' name='penerbit' autocomplete='off'/></li>
							</ul>
						  	</ul>
						  	<ul class='form'>
						  		<li>Sampul</li>
						  		<li>:</li>
						  		<li><input type='file' name='sampul' required/></li>
						  	</ul>
							<ul class='form'>
								<li>File Buku</li>
								<li>:</li>
								<li><input type='file' name='buku' required/></li>
							</ul>
							<ul class='form'>
								<li>Stock</li>
								<li>:</li>
								<li><input type='number' name='stock' required/></li>
							</ul>
						  <ul class='form'>
						  	<li>Deskripsi</li>
						  	<li>:</li>
						  	<li><textarea name='deskripsi'></textarea></li>
						  </ul>
						  <ul class='form'>
						  	<li><input type='submit' name='submit'/></li>
						  </ul>
						 </form>";

					break;
					case "view":
						$id = addslashes(strip_tags($_GET['id']));
							$query = mysqli_query($koneksi,"SELECT * FROM buku WHERE id_buku='$id'");
							$q_d = mysqli_fetch_array($query);
							echo "<p style='margin-right:10px;'>
									<img src='../image/".$q_d['path_gambar']."'/>
								</p>
								<ul class='form'>
									<li>Judul</li>
									<li>:</li>
									<li>".$q_d['judul_buku']."</li>
								</ul>
								<ul class='form'>
									<li>Pengarang</li>
									<li>:</li>
									<li>".$q_d['pengarang']."</li>
								</ul>
								<ul class='form'>
									<li>Stock</li>
									<li>:</li>
									<li>".$q_d['stock']."</li>
								<ul class='form'>
									<li>Penerbit</li>
									<li>:</li>
									<li>".$q_d['penerbit']."</li>
								<ul class='form'>
									<li>Penjelasan</li>
									<li>:</li>
									<li>".$q_d['deskripsi']."</li>
								</ul>";
							echo "<ul class='form'>";
							if(isset($_SESSION['username'])&&!empty($_SESSION['username'])){
								if($_SESSION['status']==0){
									echo "<p>Anda Sudah terdaftar, tapi belum disetujui oleh admin</p>";
								}else{
									echo "<li><a href='../buku/".$q_d['nama_file']."'>Preview</a></li>";
								}
							}else{
								echo "<li>You Must <a href='../index.php'>login</a></li>";
							}
							echo "</ul>";
					break;
					case "del":
					if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
						if($_SESSION['status']==0){
							header("Location:../index.php");
						}
					}
						$id = addslashes(strip_tags($_GET['id']));
						$query = mysqli_query($koneksi,"SELECT * FROM buku WHERE id_buku='$id'");
						$q_f = mysqli_fetch_array($query);
							if(unlink("../buku/$q_f[nama_file]")){
								mysqli_query($koneksi,"DELETE FROM buku WHERE id_buku='$id'");
								header("Location:buku.php?page=index");
							}else{
								echo "gagal menghapus buku<br/>
										<a href='javascript:history.back()'>Kembali</a>";
							}
					break;
					case "edit":
				if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
					if($_SESSION['status']==0){
						header("Location:../index.php");
					}
				}
						$id = addslashes(strip_tags($_GET['id']));
							$query = mysqli_query($koneksi,"SELECT * FROM buku WHERE id_buku='$id'") or die("gagal banget lek");
						$q_be = mysqli_fetch_array($query);
					echo "<h2>Edit Buku : ".$q_be['judul_buku']."</h2><hr/><br/>";
							if(isset($_POST['submit'])){
								$judul = addslashes(strip_tags($_POST['judul']));
								$pengarang = addslashes(strip_tags($_POST['pengarang']));
								$penerbit = addslashes(strip_tags($_POST['penerbit']));
								$isi = addslashes(strip_tags($_POST['isi']));
								$stock = addslashes(strip_tags($_POST['stock']));
								$dir = "../buku/";
								$buku_name = $_FILES['buku']['name'];
								$buku_size = $_FILES['buku']['size'];
								$buku_type = $_FILES['buku']['type'];
								$buku_tmp = $_FILES['buku']['tmp_name'];
								$g_name = $_FILES['sampul']['name'];
								$g_type = $_FILES['sampul']['type'];
								$g_size = $_FILES['sampul']['size'];
								$g_tmp = $_FILES['sampul']['tmp_name'];
							if($judul!="" && $pengarang!="" && $penerbit!="" && $isi!= ""){
								if($buku_tmp!=""&&$g_tmp!=""){
									unlink("../buku/$q_be[nama_file]");
									unlink("../image/$q_be[path_gambar]");
									move_uploaded_file($g_tmp,"../image/".$g_name);
									move_uploaded_file($buku_tmp,$dir.$buku_name);
									$query = mysqli_query($koneksi,"UPDATE buku SET judul_buku='$judul',pengarang='$pengarang',penerbit='$penerbit',nama_file='$buku_name',path_gambar='$g_name',stock='$stock',deskripsi='$isi' WHERE id_buku='$id'");
								}else{
									$query = mysqli_query($koneksi,"UPDATE buku SET judul_buku='$judul',pengarang='$pengarang',penerbit='$penerbit',stock='$stock',deskripsi='$isi' WHERE id_buku='$id'");
								}
								
									header("Location:buku.php?page=index");
								}else{
									echo "Form Harus diisi dengan seluruhnya dengan benar <br/>
											<a href='javascript:history.back()'>Kembali</a>";
								}
							}
							
					echo "<form method='post' action='' enctype='multipart/form-data'>
							<ul class='form'>
								<li>Judul</li>
								<li>:</li>
								<li><input type='text' name='judul' value='".$q_be['judul_buku']."'/></li>
							</ul>
							<ul class='form'>
								<li>Sampul Buku</li>
								<li>:</li>
								<li><img src='../image/".$q_be['path_gambar']."' style='margin-bottom:20px;'/><br/><br/>
								<input type='file' name='sampul'></li>
							</ul>
							<ul class='form'>
								<li>buku</li>
								<li>:</li>
								<li><input type='file' name='buku'/></li>
							</ul>
							<ul class='form'>
								<li>Stock</li>
								<li>:</li>
								<li><input type='number' value='".$q_be['stock']."' name='stock'/></li>
							</ul>
							<ul class='form'>
								<li>Pengarang</li>
								<li>:</li>
								<li><input type='text' name='pengarang' value='".$q_be['pengarang']."'/></li>
							</ul>
							<ul class='form'>
								<li>Penerbit</li>
								<li>:</li>
								<li><input type='text' name='penerbit' value='".$q_be['penerbit']."'/></li>
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