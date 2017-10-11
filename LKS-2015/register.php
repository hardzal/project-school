<?php
session_start();
require "koneksi.php";
/*
$proses = isset($_GET['page']) ? $_GET['page'] : "";
	if($proses ==''){
		$proses = "home";
	}
*/
	include "head.php";
?>

 <title>Perpustakaan Online | Be Informed Be Think </title>
  <link href='css/style.css' rel='stylesheet' type='text/css'/>
 <link href='image/icon.ico' type='image/x-icon' rel='icon'/>
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
					<h2>Form Pendaftaran</h2><hr/>
					<?php
						if(isset($_POST['submit'])){
							$username = addslashes($_POST['username']);
							$password = $_POST['password'];
							$nama = $_POST['nama'];
							$email = $_POST['email'];
								$q = mysqli_query($koneksi,"SELECT * FROM akun WHERE username='$username' OR email='$email'");
							if(mysqli_num_rows($q) == 0){
								$query = mysqli_query($koneksi,"INSERT INTO akun VALUES('',0,'member','$username',md5('$password'),'$nama','$email')");
								if($query)
									echo "Berhasil Mendaftar, Silahkan tunggu hingga disetujui oleh admin!";
								else
									echo "Gagal Mendaftar! <a href='javascript:history.back()'>Kembali</a>";
							}else{
								echo "Username yang anda gunakan tidak bisa digunakan, mohon gunakan username lain <br/>
									<a href='javascript:history.back()'>Kembali</a>";
							}
						}
					?>
					<form method='post' action=''>
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
							<li><input type='email' name='email'/></li>
						</ul>
						<ul class='form'>
							<li><input type='submit' name='submit'/></li>
						</ul>
					</form>
				</article>
			</section>	
			<aside class='kanan'>
			<?php
				include "sidebar.php";
			?>
			</aside>
		</div>
		<div class='clear'></div>
	<?php
		include "footer.php";
	?>	
	</div>	
</body>
</html>