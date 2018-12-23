<?php
require_once "koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width,initial-scale=1"/>
	<title>Page Index</title>
	<!-- Boostrap Here -->
	 	<link href='css/bootstrap.min.css' rel='stylesheet'/>
	 	<script src='js/bootstrap.min.js' type='text/javascript'></script>
	 <!-- Jquery min -->
	 	<script src='js/jquery-1.11.3.min.js'></script>
</head>
<body>
	<div class="container-fluid">
		<?php
			include("header.php");
		?><hr/>
		<div class='row'>
		<?php
			include("row-1.php");
			if(isset($_POST['register'])){
				if(isset($_POST['username'])&&!empty($_POST['username'])){
					$username = $_POST['username'];
					$password = md5($_POST['password']);
					$nama = $_POST['nama'];
					$email = $_POST['email'];
						$q_r = mysqli_query($connc,"INSERT INTO akun VALUES('','$username','$password','$nama','$email','none','member',0)") or die(mysqli_error($connc));
						if($q_r){
							echo "<p>Pendaftaran Berhasil, Tunggu Persetujuan Administrator Web</p>";
						}
				}
			}
		?>
				<div class='col-sm-8'>
					 <h2>Register Here!</h2><hr/>
					  <form class="form-horizontal" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					    <div class="form-group">
					      <label class="control-label col-sm-2" for="Username">Username</label>
					      <div class="col-sm-4">
					        <input type="text" class="form-control" id="Username" placeholder="Enter Username" name='username'>
					      </div>
					    </div>
					    <div class="form-group">
					      <label class="control-label col-sm-2" for="pwd">Password:</label>
					      <div class="col-sm-4">          
					        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name='password'>
					      </div>
					    </div>
					     <div class="form-group">
					      <label class="control-label col-sm-2" for="nama">Nama Lengkap</label>
					      <div class="col-sm-4">          
					        <input type="text" class="form-control" id="nama" placeholder="ketik nama lengkap..." name='nama'>
					      </div>
					    </div>
					    <div class="form-group">
					      <label class="control-label col-sm-2" for="Email">Email</label>
					      <div class="col-sm-4">          
					        <input type="email" class="form-control" id="Email" placeholder="ketik Email..." name='email'>
					      </div>
					    </div>
					    <div class="form-group">        
					      <div class="col-sm-offset-2 col-sm-10">
					        <button type="submit" class="btn btn-primary" name='register'>Submit</button>
					      </div>
					    </div>
					  </form>
				</div>
		</div>
		<hr/>
		<div class='row'>
			<?php
				include("footer.php");
			?>
		</div><hr/>
		<?php
			include("foot.php");
		?>
	</div>
</body>
</html>