<div class='kate'>
<?php
echo "<h2>Menu</h2><hr/><br/>";
if(isset($_SESSION['username'])&&!empty($_SESSION['username'])){
	if($_SESSION['level']=="admin"){
		echo "<p>
				<ul>
					<li><a href='buku.php'>Book Panel</a></li>
					<li><a href='berita.php'>News Panel</a></li>				
					<li><a href='member.php'>Member Panel</a></li>
					<li><a href='gallery.php'>Gallery Panel</a></li>
					<li><a href='../index.php'>Homepage</a></li>	
					<li><a href='../logout.php'>Logout</a></li>
					<li>Anda Login dari : ".$_SERVER['HTTP_REFERER']."</li>
				</ul>
				</p>";
		}else if($_SESSION['level']=="member"&&$_SESSION['status']==1){
			echo "<p>Selamat datang,<br/>
					<ul>
						<li><a href='user.php'>Panel User</a></li>
						<li><a href='../logout.php'>Logout</a></li>
					</ul>
					</p>";
		}
	}else{
		echo "<p>
				<ul>
					<li><a href='../register.php'>Register</a></li>
					<li><a href='index.php'>Login</a></li>
				</ul>
			</p>";
	}	
?>
</div>