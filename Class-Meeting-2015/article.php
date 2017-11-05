<?php
 require_once "inc/class.php";
?>
<!DOCTYPE html>
<html>

<head>
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
	<article class='post-viewed'>
	<?php
		$id = isset($_GET['id']) ? $_GET['id'] : "";
		if(isset($id)&!empty($id)){
		 $sql = mysqli_query($blog->koneksi(), "SELECT a.artikel_id, a.judul_artikel, a.user_id, a.tanggal_artikel, b.username, a.img_artikel, a.isi FROM blog_artikel AS a INNER JOIN blog_user AS b ON a.user_id=b.user_id WHERE artikel_id='$id'");
			if($sql){
				$q = mysqli_fetch_array($sql);

				echo "<title>".$q['judul_artikel']."</title>";
		?>

		<div class='post-image'>
			<a href='article.php?id=<?php echo $q['artikel_id'];?>' title='Koala yang tidur'><img src='assets/image/<?php echo $q['img_artikel'];?>' alt='Koala bau'/></a>
		</div>
		<h1 class='post-title'><a href='article.php?id=<?php echo $q['artikel_id'];?>' title='<?php echo $q['judul_artikel'];?>'><?php echo $q['judul_artikel'];?></a></h1>
		<div class='post-content'>
			<?php
				echo "<p>".$q['isi']."</p>";
			?>
		</div>
		<div class='post-comment'>
			<h3>0 Comments</h3>
			<?php
				$sql = mysqli_query($blog->koneksi(),"SELECT * FROM blog_komentar");
				while($qq = mysqli_fetch_array($sql)){
			?>
			<div class='comment'>
				<strong><a href='<?php echo $qq['url'];?>'><?php echo $qq['nama_lengkap'];?></a></strong>
				<span><?php echo $qq['tanggal_komentar'];?></span>
				<p><?php echo $qq['isi'];?></p>
				<div class='actions'>
					<a href='#'>Reply</a>
					<a href='#'>Remove</a>
				</div>
			</div>
		<?php
			};
		?>
			<div class='comment-box'>
			<?php
				if(isset($_POST['submit'])){
					$nama = $_POST['nama'];
					$email = $_POST['email'];
					$url = $_POST['url'];
					$isi = $_POST['komentar'];
					$id = $_GET['id'];
					if(!empty($_POST)){
						$sql = mysqli_query($blog->koneksi(),"INSERT INTO blog_komentar VALUES('','$id','$nama',now(),'$url','$isi',0)");
						if($sql){
							echo "<strong>Tunggu Persetujuan Admin, hingga komentar dimunculkan</strong>";
						}else{
							echo "<b>Gagal Komentar</b>".mysqli_error();	
						}
					}
				}

				?>
			 <form method='post' action=''>
				<ul class='form'>
					<li>Nama</li>
					<li><input type='text' name='nama' placeholder='Nama Lengkap' required/></li>
				</ul>
				<ul class='form'>
					<li>Email</li>
					<li><input type='email' name='email' placeholder='Email'/></li>
				</ul>
				<ul class='form'>
					<li>Url</li>
					<li><input type='text' name='url' placeholder='Website'/></li>
				</ul>
				<ul class='form'>
					<li>Comment</li>
					<li><textarea name='komentar'></textarea></li>
				</ul>
				<ul class='form'>
					<li>&nbsp;</li>
					<li><input type='submit' name='submit'/></li>
				</ul>
			 </form>
		 		</div>
			</div>
		<?php
				}else{
					echo "Error : ".mysqli_error($blog->koneksi());
				}
			}else{
				header("Location: index.php");
			}
		?>
	</article>
</section>
<?php
 require_once "menu.php";
?>
<aside>
<?php
 require_once "sidebar.php";
?>
</aside>
<footer>
<?php
 require_once "footer.php";
?>
</footer>
</body>
</html>
