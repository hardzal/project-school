	<div class='col-sm-4'>
			<?php
				if(isset($_POST['submit'])){
					if(isset($_POST['username'])&&!empty($_POST['username'])&&isset($_POST['password'])&&!empty($_POST['password'])){
						$username = mysqli_real_escape_string($connc,$_POST['username']);
						$password = mysqli_real_escape_string($connc,$_POST['password']);
						$password = md5($password);
						$q = mysqli_query($connc,"SELECT * FROM akun WHERE username='$username' AND password='$password'");
						$q_u = mysqli_fetch_array($q);
						if(mysqli_num_rows($q)==1){
							$_SESSION['username'] = $q_u['username'];
							$_SESSION['level'] = $q_u['level'];
							$_SESSION['status'] = $q_u['status'];
							$_SESSION['id'] = $q_u['id_akun'];
						}else{
							echo "Username / Password Salah <a href='javascript:history.back()'>kembali</a>";
						}
					}
				}
				if(isset($_SESSION['username'])&&!empty($_SESSION['username'])){
			?>
				<h3>Menu</h3><hr/>
				<p>Welcome, <?php echo $_SESSION['username'];?>
					<ul class="nav nav-pills nav-stacked">
						<?php
							if($_SESSION['level']=="admin"){
						?>
							<li><a href='buku.php?page=index'>List Book</a></li>
							<li><a href='buku.php?page=add'>Add Book</a></li>
							<li><a href='member.php?page=index'>Member List</a></li>
							<li><a href='#'>Any Page</a></li>
						<?php
					}else{
						?>
							<li><a href='member.php?page=view&id=<?php echo $_SESSION['id'];?>'>Info Account</a></li>
						<?php
						}
						?>
						<li><a href='logout.php' onClick='return confirm("Apa anda yakin ingin keluar")'>Logout</a></li>
					</ul>
			<?php
				}else{
					echo "<h3>Login Form</h3><hr/>
						<form method='post' action='".$_SERVER['PHP_SELF']."'>
							<div class='form-group'>
								<label for='username'>Username</label>
								<input type='text' id='username' class='form-control' placeholder='Type Your Username...' name='username'/>
							</div>
							<div class='form-group'>
								<label for='password'>Password</label>
								<input type='password' id='password' class='form-control' placeholder='Type Your Password' name='password'/>
							</div>
						<input type='submit' value='Login' name='submit' class='btn btn-default'/>
						</form>
						<br/><br/>
						<p>Belum punya akun ? Register <a href='register.php'>disini</a></p>";

				}
			?>
			</div>
