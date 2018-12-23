<?php
//error_reporting(0);
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
		?>
			<div class='col-sm-8'>
				<?php
					$opt = isset($_GET['page']) ? $_GET['page'] : "";
					if($opt == ""){
						$opt = "index";
					}	
					switch($opt){
						case "index":
						if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
							header("Location:index.php");
						}
						?>
						<div class="table-responsive">          
						  <table class="table">
						    <thead>
						      <tr>
						        <th>No</th>
						        <th>Username</th>
						        <th>Jumlah Yang Dipinjam</th>
						        <th>Status</th>
						        <th class='text-center'>Action</th>
						      </tr>
						    </thead>
						    <tbody>
						    <?php
						    $q = mysqli_query($connc,"SELECT * FROM akun WHERE level='member'");
						    $n = 1;
						    while($q_m = mysqli_fetch_array($q)){
						    ?>
						      <tr>
						        <td><?php echo $n;?></td>
						        <td><?php echo $q_m['username'];?></td>
						        <td>-</td>
						        <td><?php 
							         $status = $q_m['status'];
							        if($status!=false){
							        	$status = "Registered";
							        }else{
							        	$status = "Unregistered";
							        }
							        echo $status;
						        ?></td>
						        <td><a href='member.php?page=view&id=<?php echo $q_m['id_akun'];?>'>View</a></td>
					      		<td><a href='member.php?page=del&id=<?php echo $q_m['id_akun'];?>' onClick='return confirm("Apakah Anda Yakin Ingin Menghapus Member ini?")'>Del</a></td>
						      </tr>
						<?php
							$n++;
							};
						?>
						    </tbody>
						  </table>
						 </div>
					<?php
						break;
						case "view":
						if(!isset($_GET['id'])&&empty($_GET['id'])){
							header("Location:index.php");
						}
						$id=$_GET['id'];
						$q= mysqli_query($connc,"SELECT * FROM akun WHERE id_akun='$id'");
						$q_a = mysqli_fetch_array($q);
					?>
						<div class="table-responsive">       
						  <table class="table">
						      <tr>
						        <th>Username</th>
						        <th><?php echo $q_a['username'];?></th>
						      </tr>
						      <tr>
						        <td>Nama Lengkap</td>
						        <td><?php echo $q_a['nama_lengkap'];?></td>						        
						      </tr>
							 <tr>
								<td>Email</td>
								<td><?php echo $q_a['email'];?></td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td><?php echo $q_a['alamat'];?></td>
							</tr>
							<?php
							if($_SESSION['level']=="admin"){
								if(isset($_POST['change'])){
									$opsi = $_POST['opsi'];
									$q = mysqli_query($connc,"UPDATE akun SET status='$opsi' WHERE id_akun='$id'") or die(mysqli_error($connc));
									if($q){
										header("Location:member.php?page=index");
									}else{
										echo "Gagal!";
									}
								}
							?>
							<form method='post' action=''>
							<tr>
								<td>Status</td>
								<td>
								 <select name='opsi'>						          
							     	 <option value='0'>Unregistered</option>
							     	 <option value='1'>Registered</option>
							     </select>
							   	</td>
							 </tr>
							 <tr>
							 	<td><input type='submit' name='change' value='change'/></td>
							 </tr>
							 	</form>
							<?php
								};
								$q_b = mysqli_query($connc,"SELECT b.id_buku,b.judul,p.id_akun,p.tanggal_pinjam,p.tanggal_kembali,p.status FROM buku AS b INNER JOIN peminjaman AS p ON b.id_buku=p.id_buku WHERE p.id_akun='$id' AND status=0 ORDER BY tanggal_pinjam DESC");

							?>
							
						
						  </table>
						 </div>
						 <h3>Daftar Buku yang dipinjam</h3><hr/>
						 <div class="table-responsive"> 
						 <?php
						 if($q_b){
						  $total = mysqli_num_rows($q_b);         
						  	if($total > 0){
						 ?>
						  <table class="table">
						     <thead>
							  <tr>
						        <th>ID</th>
						        <th>Judul</th>
								<th>Tanggal dipinjam</th>
								<th>Jumlah yang dipinjam</th>
								<th>Action</th>
						      </tr>
							 </thead>
							<tbody>
							<?php
								while($qq = mysqli_fetch_array($q_b)){
							?>
						      <tr>
						        <td><?php echo $qq['id_buku'];?></td>
						        <td><?php echo $qq['judul'];?></td>
								<td><?php echo $qq['tanggal_pinjam'];?></td>
						        <td><?php echo $qq['tanggal_kembali'];?></td>
								<td><?php if($_SESSION['level']=="admin"){
										echo "Pinjam";
									}else{
									?>
									<button class='btn btn-default'><a href='member.php?page=back&id=<?php echo $qq['id_buku'];?>'>Kembalikan</a></button>
									<?php
									}
									?>
								</td>
						      </tr>
						    <?php
						    	};
						    ?>
							 </tbody>
						  </table>
						 <?php
						}
					}else{
						echo "<p>Belum ada buku yang kamu pinjam";
					}
						?>
						 </div>
					<?php
						break;
						case "back":
						if(!isset($_SESSION['username'])&&empty($_SESSION['username'])&&!isset($_GET['id'])&&empty($_GET['id'])){
							header("Location:index.php");
						}
						$id_akun = $_SESSION['id'];
						$id = addslashes(strip_tags($_GET['id']));
						$q = mysqli_query($connc,"UPDATE peminjaman SET status=1 WHERE id_buku='$id' AND id_akun='$id_akun'");
						if($q){
							echo "<p>Berhasil Mengembalikan Buku yang sudah dipinjam!</p>";
						}else{
							echo "<p>Belum Berhasil dikembalikan</p>";
						}
						break;
						case "edit":
						if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
							header("Location:index.php");
						}
						break;
						case "del":
						if(!isset($_SESSION['username'])&&empty($_SESSION['username'])&&!isset($_GET['id'])&&empty($_GET['id'])){
							header("Location:index.php");
						}
							$id = $_GET['id'];
							$q = mysqli_query($connc,"DELETE FROM akun WHERE id_akun='$id'");
							header("Location:member.php?page=index");
						break;
						case "pinjam":
						if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
							header("Location:index.php");
						}
					?>
					
	<?php
						break;
					}
	?>
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