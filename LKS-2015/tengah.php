<div id='tengah'>
	<div class='left'>
		<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" width="825" height="412" id="Untitled-4" align="middle">
				<param name="movie" value="image/Untitled-4.swf" />
				<param name="quality" value="high" />
				<param name="bgcolor" value="#ffffff" />
				<param name="play" value="true" />
				<param name="loop" value="true" />
				<param name="wmode" value="window" />
				<param name="scale" value="showall" />
				<param name="menu" value="true" />
				<param name="devicefont" value="false" />
				<param name="salign" value="" />
				<param name="allowScriptAccess" value="sameDomain" />
				<!--[if !IE]>-->
				<object type="application/x-shockwave-flash" data="image/Untitled-4.swf" width="825" height="412">
					<param name="movie" value="Untitled-4.swf" />
					<param name="quality" value="high" />
					<param name="bgcolor" value="#ffffff" />
					<param name="play" value="true" />
					<param name="loop" value="true" />
					<param name="wmode" value="window" />
					<param name="scale" value="showall" />
					<param name="menu" value="true" />
					<param name="devicefont" value="false" />
					<param name="salign" value="" />
					<param name="allowScriptAccess" value="sameDomain" />
				<!--<![endif]-->
					<a href="http://www.adobe.com/go/getflash">
						<img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" />
					</a>
				<!--[if !IE]>-->
				</object>
				<!--<![endif]-->
			</object>
	</div>
	<div class='right'>
	<?php
	if(isset($_POST['submit'])){
		if(isset($_POST['username'])&&isset($_POST['password'])){
			$username = mysqli_real_escape_string($koneksi,$_POST['username']);
			$password = mysqli_real_escape_string($koneksi,$_POST['password']);
				$query = mysqli_query($koneksi,"SELECT * FROM akun WHERE username='$username' AND password=md5('$password')");
				$q_h = mysqli_fetch_array($query);
				if(mysqli_num_rows($query) == 1){
					if($q_h['status'] == true){
						$_SESSION['id_akun'] = $q_h['id_akun'];
						$_SESSION['username'] = $q_h['username'];
						$_SESSION['level'] = $q_h['level']; 
						$_SESSION['status'] = $q_h['status'];
					}else if($q_h['status'] == false){
						echo "Anda Belum disetujuin Menjadi Member!";
					}
				}else{
					echo "Username/Password anda salah!";
				}
		}
	}


		if(isset($_SESSION['username'])&&!empty($_SESSION['username'])&&$_SESSION['status']==1){
			echo "<p>Selamat Datang, ".$_SESSION['username']."<br/>";
					 $q_bok = mysqli_query($koneksi,"SELECT * FROM buku");
					 $q_b = mysqli_query($koneksi,"SELECT * FROM berita");
					 $q_m = mysqli_query($koneksi,"SELECT * FROM akun WHERE level='member' AND status=0");
			if($_SESSION['level']=="admin"){
				echo "<ul class='list'>
						<li><a href='page/berita.php'>News Panel</a></li>
						<li><a href='page/buku.php'>Book Panel</a></li>
						<li><a href='page/gallery.php'>Gallery Panel</a></li>
						<li><a href='page/member.php'>Member Panel</a></li>
						<li>Jumlah Buku : ".mysqli_num_rows($q_bok)."</li>
						<li>Jumlah Berita : ".mysqli_num_rows($q_b)."</li>
						<li>Member Baru : ".mysqli_num_rows($q_m)."</li>
						<li>Anda Login dari : ".$_SERVER['HTTP_REFERER']."</li>
					</ul><br/><br/>";
			}
			echo "<span><a href='index.php'>Halaman Utama</a> | <a href='logout.php'>Logout</a></span></p>";
		}else{
			echo login_form();
		}
	?>
	</div>
</div>