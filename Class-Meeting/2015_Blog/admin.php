<?php
 require_once "inc/class.php";
 $blog->loginCek($_SESSION['admin']);
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Panel</title>
<?php
 require_once "meta.php";
?>
</head>
<body>
<header>
<?php
 require_once "header.php";
?>
</header>
<section>
	<article class='post-view'>
			<h1>Admin Panel</h1>
				<nav class='panel'>
					<ul>
						<li class='selected'><a href='admin.php?page=dashboard'>Dasboard</a></li>
						<li><a href='admin.php?page=post'>Post</a></li>
						<li><a href='admin.php?page=category'>Category</a></li>
						<li><a href='admin.php?page=comments'>Comments</a></li>
						<li><a href='admin.php?page=set'>Settings</a></li>
						<li><a href='admin.php?page=logout'>Logout</a></li>
					</ul>
				</nav>
				<div class='panel-d'>

		<?php
			$pages = isset($_GET['page']) ? $_GET['page'] : "";
			if($pages == ""){
				$pages = "dashboard";
			}
			switch($pages){
				case "dashboard":
			?>	
					<h2>Dashboard</h2>
						<ul class='list'>
							<li><h3>Total Post : <?php $q = mysqli_query($blog->koneksi(),"SELECT * FROM blog_artikel"); 
							echo mysqli_num_rows($q);?> Post</h3></li>
							<li><h3>Total Comment : <?php $q = mysqli_query($blog->koneksi(),"SELECT * FROM blog_komentar"); echo mysqli_num_rows($q);?> Comments</h3></li>
							<li><h3>Total Shuotbox : 30 Messages</h3></li>
							<li><h3>Statistik : <?php echo mysqli_num_rows(mysqli_query($blog->koneksi(),"SELECT * FROM blog_statistik"));?> Hits</h3></li>
						</ul>
			<?php
				break;
				case "post":
				$opsi = isset($_GET['opsi']) ? $_GET['opsi'] : "";
				if($opsi == ""){
					$opsi = "view";
				}
				switch($opsi){
					case "view":
			?>
				<h2>All Post</h2>
				<div class='post-panel'>
				<button class='register'><a href='admin.php?page=post&opsi=add'>Add New Post</button> 
				<button class='login'><a href='#'>Show All Post</a></button>
				<?php
					$sql = mysqli_query($blog->koneksi(), "SELECT a.artikel_id, a.judul_artikel, a.user_id, a.tanggal_artikel, b.username FROM blog_artikel AS a INNER JOIN blog_user AS b ON a.user_id=b.user_id ORDER BY tanggal_artikel DESC");
					if($sql){
						while($q = mysqli_fetch_array($sql)){
				?>
					<div class='post-list'>
						<a class='title' href='article.php?id=<?php echo $q['artikel_id'];?>' target="_blank"><?php echo $q['judul_artikel'];?></a>
						<span class='left'> | <?php echo date('d M Y', strtotime($q['tanggal_artikel']));?> | <a href='#'><?php echo $q['username'];?></a> | </span>
						<span class='right'>
							<a href='admin.php?page=post&opsi=edit&id=<?php echo $q['artikel_id'];?>'>Edit</a> | 
							<a href='admin.php?page=post&opsi=del&id=<?php echo $q['artikel_id'];?>' onClick='return confirm("Apakah Kamu yakin ingin menghapus kategori '"<?php echo $q['judul_artikel'];?>"'")'>Delete</a>
						</span>
					</div>
				<?php
						}
					}
				?>
				<div class='paging'>
					<ul>
						<li class='selected'>1</li>
						<li><a href='admin.php?page=post&hal=2'>2</a></li>
						<li><a href='admin.php?page=post&hal=3'>3</a></li>
						<li><a href='admin.php?page=post&hal=2'>Next</a></li>
						<li><a href='admin.php?page=post&hal=99'>Last</a></li>
					</ul>
				</div>
			<?php
					break;
					case "add":
			?>
				<h2>Tambah Post baru</h2>
			<form method='post' action='' enctype='multipart/form-data'>
				<?php
					if(isset($_POST['submit'])){
						$judul = $blog->filter($_POST['judul']);
						$cat = $blog->filter($_POST['cat']);
						$isi = $blog->filter($_POST['isi']);

						$img_post = $_FILES['img']['name'];
						$img_type = $_FILES['img']['type'];
						$img_size = $_FILES['img']['size'];
						$img_tmp = $_FILES['img']['tmp_name'];

						$img_ext = strtolower(end(explode('.',$img_post)));
						$img_allow = array("jpg","png","bmp");
						if(!empty($img_tmp)){
							if(in_array($img_ext, $img_allow)){
								if(move_uploaded_file($img_tmp, 'assets/image/'.$img_post)){
									$sql = mysqli_query($blog->koneksi(), "INSERT INTO blog_artikel VALUES('','$_SESSION[user_id]','$cat','$judul',now(),'$img_post','$isi')");
									if($sql){
										echo "Berhasil Memasukkan artikel";
									}else{
										echo "Gagal boy";
									}
								}
							}else{
								echo "<p>Harap masukkan gambar</p>";
							}
						}
					}

				?>
				<ul class='form'>
					<li>Judul</li>
					<li><input type='text' name='judul' placeholder='Judul'/></li>
				</ul>				
				<ul class='form'>
					<li>Category</li>
					<li>
						<select name='cat'>
							<?php
								$sql = mysqli_query($blog->koneksi(),"SELECT * FROM blog_kategori ORDER BY kategori_id DESC");;
								while($q = mysqli_fetch_array($sql)){
									echo "<option value='".$q['kategori_id']."'>".$q['judul_kategori']."</option>";
								}
						?>
						</select>
					</li>
				</ul>
				<ul class='form'>
					<li>Image</li>
					<li><input type='file' name='img'/></li>
				</ul>
				<ul class='form'>
					<li>Isi</li>
					<li><textarea name='isi'></textarea></li>
				</ul>
				<ul class='form'>
					<li>&nbsp;</li>
					<li><input type='submit' name='submit'/></li>
				</ul>
			</form>
			<?php
					break;
					case "del":
						$id = $blog->filter($_GET['id']);
							$blog->delPost('artikel_id', $id, 'blog_artikel');
							if($blog->status == true){
								header("Location : admin.php?page=category");
							}else{
								echo $blog->stats();
								echo "<br/><a href='javascript:history.back()'>Kembali</a>";
							}
					break;
					case "edit":
					$id = $_GET['id'];
					if(!isset($_GET['id'])&&empty($_GET['id'])){
						header("Location: admin.php?page=post");
					}else{
						 $sql = mysqli_query($blog->koneksi(), "SELECT a.artikel_id, a.judul_artikel, a.user_id, a.tanggal_artikel, b.username, a.img_artikel, a.isi FROM blog_artikel AS a INNER JOIN blog_kategori AS b ON a.kategori_id=b.kategori_id WHERE artikel_id='$id'");
						 if(!$sql){
						 	echo mysqli_error($blog->koneksi());
						 }else{
						 $q = mysqli_fetch_array($sql);	
			?>
					<h2>Edit Post : </h2>
			<form method='post' action='' enctype='multipart/form-data'>
				<?php
					if(isset($_POST['submit'])){
						$judul = $blog->filter($_POST['judul']);
						$cat = $blog->filter($_POST['cat']);
						$isi = $blog->filter($_POST['isi']);

						$img_post = $_FILES['img']['name'];
						$img_type = $_FILES['img']['type'];
						$img_size = $_FILES['img']['size'];
						$img_tmp = $_FILES['img']['tmp_name'];

						$img_ext = strtolower(end(explode('.',$img_post)));
						$img_allow = array("jpg","png","bmp");
						if(!empty($img_tmp)){
							if(in_array($img_ext, $img_allow)){
								if(move_uploaded_file($img_tmp, 'assets/image/'.$img_post)){
									$sql = mysqli_query($blog->koneksi(), "INSERT INTO blog_artikel VALUES('','$_SESSION[user_id]','$cat','$judul',now(),'$img_post','$isi')");
									if($sql){
										echo "Berhasil Memasukkan artikel";
									}else{
										echo "Gagal boy";
									}
								}
							}else{
								echo "<p>Harap masukkan gambar</p>";
							}
						}
					}

				?>
				<ul class='form'>
					<li>Judul</li>
					<li><input type='text' name='judul' placeholder='Judul' value='<?php echo $q['judul_artikel'];?>'/></li>
				</ul>				
				<ul class='form'>
					<li>Category</li>
					<li>
						<select name='cat'>
							<?php
								$sql = mysqli_query($blog->koneksi(),"SELECT * FROM blog_kategori ORDER BY kategori_id DESC");;
								while($q = mysqli_fetch_array($sql)){
									echo "<option value='".$q['kategori_id']."'>".$q['judul_kategori']."</option>";
								}
						?>
						</select>
					</li>
				</ul>
				<ul class='form'>
					<li>Image</li>
					<li><?php echo "<img src='assets/image/".$q['img_post']."' alt='".$q['judul_artikel']."' title='".$q['judul_artikel']."'";?><input type='file' name='img'/></li>
				</ul>
				<ul class='form'>
					<li>Isi</li>
					<li><textarea name='isi'><?php echo $q['isi'];?></textarea></li>
				</ul>
				<ul class='form'>
					<li>&nbsp;</li>
					<li><input type='submit' name='submit'/></li>
				</ul>
			</form>
				<?php
					}
				}
					break;
				}
				break;
				case "category":
					$opsi = isset($_GET['opsi']) ? $_GET['opsi'] : "";
					if($opsi==""){
						$opsi = 'view';
					}
					switch($opsi){
						case "view":
					?>
					<h2>All Category</h2>
					<button class='register'><a href='admin.php?page=category&opsi=add'>Add new category</a></button>
					<?php
						$sql = mysqli_query($blog->koneksi(),"SELECT * FROM blog_kategori");
						while($q = mysqli_fetch_array($sql)){
						
					?>
					<ul class='form'>
						<?php
						echo "<li><a href='category.php?id=".$q['kategori_id']."'>".$q['judul_kategori']."</a></li>";
						echo "<li><a href='admin.php?page=category&opsi=edit&id=".$q['kategori_id']."'	>Edit</a></li>";
						echo "<li><a href='admin.php?page=category&opsi=del&id=".$q['kategori_id']."' onClick='return confirm(\"Apakah Kamu yakin ingin menghapus kategori ".$q['judul_kategori']."\")'>Hapus</a></li>";
						?>
					</ul>
					<?php
						};
						break;
						case "add":
				?>
					<h2>Tambah Kategori baru</h2>
						<form method='post' action=''>
						<?php
							if(isset($_POST['submit'])){
								$kategori = $blog->filter($_POST['judul']);
								$ket = $blog->filter($_POST['keterangan']);
								$blog->crudCategory($kategori, $ket, 'tambah');
								echo $blog->stats();
							}
						?>
							<ul class='form'>
								<li>Judul Kategori</li>
								<li><input type='text' name='judul' placeholder='Judul'/></li>
							</ul>				
							<ul class='form'>
								<li>Keterangan</li>
								<li><textarea name='keterangan'></textarea></li>
							</ul>
							<ul class='form'>
								<li>&nbsp;</li>
								<li><input type='submit' name='submit'/></li>
							</ul>
						</form>
				<?php
						break;
						case "del":
							$id = $blog->filter($_GET['id']);
							$blog->delPost('kategori_id', $id, 'blog_kategori');
							if($blog->status){
								header("Location : admin.php?page=category");
							}else{
								echo $blog->stats();
								echo "<br/><a href='javascript:history.back()'>Kembali</a>";
							}
						break;
						case "edit":
							$id = $blog->filter($_GET['id']);
							$sql = mysqli_query($blog->koneksi(),"SELECT * FROM blog_kategori WHERE kategori_id='$id'");
							if($sql){
								$q = mysqli_fetch_array($sql);
								if(isset($_POST['submit'])){
									$kategori_judul = $blog->filter($_POST['judul']);
									$keterangan = $blog->filter($_POST['keterangan']);
									$blog->crudCategory($kategori_judul, $keterangan, 'edit');
									if($blog->status != false){
										header("Location: admin.php?page=category");
									}else{
										echo $blog->stats();
										echo "<br/><a href='javascript:history.back()'>Kembali</a>";
									}
								}	
						?>
						<form method='post' action=''>
							<ul class='form'>
								<li>Judul Kategori</li>
								<li><input type='text' name='judul' value='<?php echo $q['judul_kategori'];?>'/></li>
							</ul>				
							<ul class='form'>
								<li>Keterangan</li>
								<li><textarea name='keterangan'><?php echo $q['keterangan'];?></textarea></li>
							</ul>
							<ul class='form'>
								<li>&nbsp;</li>
								<li><input type='submit' name='submit'/></li>
							</ul>
						</form>
						<?php
							}
						break;
					}
				?>
			<?php
				break;
				case "comments":
			?>
				<h2>All Comments</h2>
				<div class='post-panel'>
				<?php
					$q = mysqli_query($blog->koneksi(),"SELECT * FROM blog_komentar WHERE status=0");?>
				<button class='register'><a href=''><?php echo mysqli_num_rows($q);?> New Comment</button> 
				<button class='login'><a href='#'>Show All Post</a></button>
				<?php
					$q = mysqli_query($blog->koneksi(),"SELECT a.nama_lengkap, b.judul_artikel, b.artikel_id FROM blog_komentar AS a INNER JOIN blog_artikel AS b ON a.artikel_id=b.artikel_id ORDER BY status");
					if($q){
						while($qq = mysqli_fetch_array($q)){
				?>
					<div class='post-list'>
						<ul class='form'>
							<li><a href='#'><?php echo $qq['nama_lengkap'];?></a></li>
							<li>On Post</li>
							<li><a href='article.php?id=<?php echo $qq['artikel_id'];?>'><?php echo $qq['judul_artikel'];?></a></li>
						</ul>
					</div>
				<?php
						}
					}
				?>
				<div class='paging'>
					<ul>
						<li class='selected'>1</li>
						<li><a href='admin.php?page=post&hal=2'>2</a></li>
						<li><a href='admin.php?page=post&hal=3'>3</a></li>
						<li><a href='admin.php?page=post&hal=2'>Next</a></li>
						<li><a href='admin.php?page=post&hal=99'>Last</a></li>
					</ul>
				</div>
			<?php
				break;
				case "set":
			?>
				<h2>Settings Account</h2>
			<?php
				break;
				case "logout":
					$blog->logout($_SESSION['admin']);
				break;
			}
		?>
		</div>
	</article>
</section>
<footer>
<?php
 require_once "footer.php";
?>
</footer>
</body>
</html>
