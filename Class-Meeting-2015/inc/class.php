<?php
/**********
	Simple CLASS
***********/
session_start();
error_reporting(0);
	class Blog{
		var $loginForm;
		var $status;
		var $log;

		public function koneksi(){
			$koneksi = mysqli_connect("localhost","root","","lks_sekolah_2015");
			if($koneksi)
				return $koneksi;
		}
		public function loginCek($sesi){
			if(isset($_SESSION[$sesi])){
				return true;
			}else{
				return false;
			}
		}
		public function login($username, $password){
			$sql = mysqli_query($this->koneksi(), "SELECT * FROM blog_user WHERE username='$username' AND password='$password'");
			if(mysqli_num_rows($sql)==1){
				$q = mysqli_fetch_array($sql);
				$_SESSION['admin'] = $q['username'];
				$_SESSION['user_id'] = $q['user_id'];
				header("Location: admin.php");
			}else{
				header("Location: login.php?status=gagal");
			}
		}
		public function loginForms(){
			$this->loginForm =  "
			<h1>Login Form</h1>
 				<hr class='small'>
			 	<form method='post' action='login.php?status=login'>
			 		<ul class='form'>
			 			<li><input type='text' name='username' placeholder='Username'/></li>
			 		</ul>
			 		<ul class='form'>
			 			<li><input type='password' name='password' placeholder='password'/></li>
			 		</ul>
			 		<ul class='form'>
			 			<li><input type='submit' name='submit' value='Login'/></li>
			 		</ul>
			 	</form>
			 ";
			 return $this->loginForm;
		}

		public function logout($sesi){
			if(isset($sesi)){
				unset($sesi);
				session_destroy();
				header("Location: index.php");
			}else{
				header("Location: login.php");
			}
		}

		public function filter($string){
			$string = addslashes(strip_tags($string));
			return $string;
		}

		public function delPost($user, $id, $table){
			$sql = mysqli_query($this->koneksi(),"DELETE FROM $table WHERE $user='$id'");
			if($sql){
				header("Location: admin.php?page=post");
			}else{
				return "<a href='javascript:history.back()'>Kembali</a><br/>
						Gagal Menghapus Post!";
			}
		}

		public function addPost($user_id, $judul, $id_kategori, $img, $text){
			$sql = mysqli_query($this->koneksi(),"INSERT INTO blog_artikel VALUES('','$user_id','$id_kategori',now(),'$judul','$img','$text'");
			if($sql){
				header("Location: admin.php?page=post");
			}else{
				return false;
			}
		}

		public function crudCategory($kategori_judul, $keterangan, $method){
			if($method == 'tambah'){
				$sql = mysqli_query($this->koneksi(),"INSERT INTO blog_kategori VALUES('','$kategori_judul','$keterangan')");
				if($sql){
					$this->status = 1;
				}else{
					$this->status = 0;
				}
				return $this->status;
			}else if($method=='edit'){
				$kategori_id = $this->filter($_GET['id']);
				$sql = mysqli_query($this->koneksi(),"UPDATE blog_kategori SET judul_kategori='$kategori_judul',keterangan='$keterangan' WHERE kategori_id='$kategori_id'");
				if($sql){
					$this->status = 1;
				}else{
					$this->status = 0;
				}
				return $this->status;
			}else{
				header("Location : admin.php?page=category");
			}
		}

		public function stats(){
			if($this->status){
				$this->log = "<div class='true'>Berhasil Memasukkan data</div>";
			}else{
				$this->log = "<div class='false'>Gagal Memasukkan data</div>".mysqli_error($this->koneksi());
			}
			return $this->log;
		}

		public function snippet($s){
			$word = substr($s, 0, 300);
			return $word;
		}
	}

	$blog = new Blog;
	$blog->koneksi();

?>
