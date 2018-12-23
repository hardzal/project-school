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
						<table class="table">
						    <thead>
						      <tr>
						        <th>Judul</th>
								<th>Pengarang</th>
								<th>Penerbit</th>
								<th>Stok</th>
								<th colspan='2' class='text-center'>Action</th>
						      </tr>
						    </thead>
						    <tbody>
								<?php
									$q = mysqli_query($connc,"SELECT * FROM buku ORDER BY id_buku DESC");
									while($q_f = mysqli_fetch_array($q)){
							?>
									<tr>
										<td><?php echo $q_f['judul'];?></td>
										<td><?php echo $q_f['pengarang'];?></td>
										<td><?php echo $q_f['penerbit'];?></td>
										<td><?php echo $q_f['stok'];?></td>
										<td><a href='buku.php?page=del&id=<?php echo $q_f['id_buku'];?>' onClick='return confirm("Apa Anda Yakin Ingin Menghapus Buku ini?")'>Del</a></td>
										<td><a href='buku.php?page=edit&id=<?php echo $q_f['id_buku'];?>'>Edit</a></td>
									</tr>
								<?php
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
						$id = addslashes(strip_tags($_GET['id']));
					?>
						<h2>Book Title</h2><hr/>
						<div class='text-center'>
						<?php
						  	$q = mysqli_query($connc,"SELECT * FROM buku WHERE id_buku='$id'");
						  	$q_b = mysqli_fetch_array($q);
						 ?>
						<a href='buku.php?page=view&id=<?php echo $q_b['id_buku'];?>'><img src='img/<?php echo $q_b['gambar_buku'];?>' title='<?php echo $q_b['judul'];?>' alt='<?php echo $q_b['judul'];?>' style='width:200px;height:250px;'/></a>
						</div>
						<div class="table-responsive">          
						  <table class="table">
						    <thead>
						      <tr>
						        <th>Id Buku</th>
						        <th><?php echo $q_b['id_buku'];?></th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr>
						        <td>Judul Buku</td>
						        <td><?php echo $q_b['judul'];?></td>
						      </tr>
						      <tr>
						        <td>Pengarang</td>
						        <td><?php echo $q_b['pengarang'];?></td>
						      </tr>
						      <tr>
						        <td>Penerbit</td>
						        <td><?php echo $q_b['penerbit'];?></td>
						      </tr>
						      <tr>
						        <td>Stok</td>
						        <td><?php echo $q_b['stok'];?></td>
						      </tr>
						      <tr>
						        <td>Sinopsis</td>
						        <td><?php echo $q_b['sinopsis'];?></td>
						      </tr>
						      <tr>
						        <td><a href='buku/<?php echo $q_b['file_buku'];?>' title='Preview buku'>Preview</a></td>
						        <td><a href='buku.php?page=pinjam&id=<?php echo $q_b['id_buku'];?>'>Pinjam</a></td>
						      </tr>
						    </tbody>
						  </table>
						  </div>
					<?php
						break;
						case "add":
						if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
							header("Location:index.php");
						}
						if(isset($_POST['upload'])){
							$bk_name = $_FILES['buku']['name'];
							$bk_type = $_FILES['buku']['type'];
							$bk_size = $_FILES['buku']['size'];
							$bk_tmp = $_FILES['buku']['tmp_name'];
							$g_name = $_FILES['sampul']['name'];
							$g_type = $_FILES['sampul']['type'];
							$g_size = $_FILES['sampul']['size'];
							$g_tmp = $_FILES['sampul']['tmp_name'];
							$judul = addslashes(strip_tags($_POST['judul']));
							$isi = addslashes(strip_tags($_POST['sinopsis']));
							$pengarang = addslashes(strip_tags($_POST['pengarang']));
							$penerbit = addslashes(strip_tags($_POST['penerbit']));
							$stock = addslashes(strip_tags($_POST['stok']));
							if($judul!="" && $isi!="" && $pengarang!="" && $penerbit!="" && $stock!=""){
								if($g_tmp!=""&&$bk_tmp!=""){
									move_uploaded_file($g_tmp,"img/".$g_name);
									move_uploaded_file($bk_tmp,"buku/".$bk_name);
								}								
									$query = mysqli_query($connc,"INSERT INTO buku VALUES('','$judul','$g_name','$bk_name','$pengarang','$penerbit','$stock','$isi')");
								if($query)
									echo "Berhasil Menambah Buku!";
								else
									echo "Gagal Menambah Buku!<br/>
											<a href='javascript:history.back()'>Kembali</a>";
							}
						}
						?>
						<h2>Tambahkan Buku Baru</h2><hr/>
						<form class="form-horizontal" role="form" enctype='multipart/form-data' method='post' action=''>
					    <div class="form-group">
					      <label class="control-label col-sm-2" for="judul">Title Book</label>
					      <div class="col-sm-6">
					        <input type="text" class="form-control" id="judul" placeholder="Type Your Title Book" name='judul' autocomplete='off'>
					      </div>
					    </div>
						<div class="form-group">
					      <label class="control-label col-sm-2" for="image">Cover Buku</label>
					      <div class="col-sm-6">
					        <input type="file" class="form-control" id="image" placeholder="Type Your Title Book" name='sampul' required>
					      </div>
					    </div>
						<div class="form-group">
					      <label class="control-label col-sm-2" for="buku">Preview Buku</label>
					      <div class="col-sm-6">
					        <input type="file" class="form-control" id="buku" placeholder="Type Your Title Book" name='buku' required>
					      </div>
					    </div>
					    <div class="form-group">
					      <label class="control-label col-sm-2" for="Pengarang">Pengarang</label>
					      <div class="col-sm-6">          
					        <input type="text" class="form-control" id="Pengarang" placeholder="ketik Pengarang Buku..." name='pengarang' autocomplete='off'>
					      </div>
					    </div>
					     <div class="form-group">
					      <label class="control-label col-sm-2" for="penerbit">Penerbit</label>
					      <div class="col-sm-6">          
					        <input type="text" class="form-control" id="penerbit" placeholder="ketik penerbit buku..." name='penerbit' autocomplete='off'>
					      </div>
					    </div>
					    <div class="form-group">
					      <label class="control-label col-sm-2" for="stok">Stok</label>
					      <div class="col-sm-6">          
					        <input type="number" class="form-control" id="stok" name='stok'>
					      </div>
					    </div>
					    <div class="form-group">
					      <label class="control-label col-sm-2" for="sinopsis">Sinopsis</label>
					      <div class="col-sm-6">          
					        <textarea name='sinopsis' class='form-control' id='sinopsis'></textarea>
					      </div>
					    </div>
					    <div class="form-group">        
					      <div class="col-sm-offset-2 col-sm-6">
					        <button type="submit" class="btn btn-default" name='upload'>Submit</button>
					      </div>
					    </div>
					  </form>
						<br/><br/>
						<p><a href='index.php'>Halaman Utama</a></p>
					<?php
						break;
						case "edit":
						if(!isset($_SESSION['username'])&&empty($_SESSION['username'])&&!isset($_GET['id'])&&empty($_GET['id'])){
							header("Location:index.php");
						}
						$id = addslashes(strip_tags($_GET['id']));
						?>
					<h2>Edit Buku Baru</h2><hr/>
					<?php
						$q = mysqli_query($connc,"SELECT * FROM buku WHERE id_buku='$id'");
						$q_b=mysqli_fetch_array($q);

						if(isset($_POST['update'])){
							$judul = $_POST['judul'];
							$pengarang = $_POST['pengarang'];
							$penerbit = $_POST['penerbit'];
							$stok = $_POST['stok'];
							$sinopsis = $_POST['sinopsis'];
								$q = mysqli_query($connc,"UPDATE buku SET judul='$judul',pengarang='$pengarang',penerbit='$penerbit',stok='$stok',sinopsis='$sinopsis' WHERE id_buku='$id'");
								if($q){
									echo "<p>Berhasil Mengupdate Buku!</p>";
								}else{
									echo "<p>Gagal Mengubah Buku</p> <a href='javascript:history.back()'>Kembali?</a>";
								}
						}
					?>					
						<form class="form-horizontal" role="form" method='post' action=''>
					    <div class="form-group">
					      <label class="control-label col-sm-2" for="Username">Title Book</label>
					      <div class="col-sm-10">
					        <input type="text" class="form-control" id="Username" placeholder="Type Your Title Book" name='judul' value='<?php echo $q_b['judul'];?>'>
					      </div>
					    </div>
						<div class="form-group">
					      <label class="control-label col-sm-2" for="image">Cover Buku</label>
					      <div class="col-sm-10">
					        <input type="file" class="form-control" id="image" placeholder="Type Your Title Book" name='image' disabled>
					      </div>
					    </div>
						<div class="form-group">
					      <label class="control-label col-sm-2" for="buku">Preview Buku</label>
					      <div class="col-sm-10">
					        <input type="file" class="form-control" id="image" placeholder="Type Your Title Book" name='image' disabled>
					      </div>
					    </div>
					    <div class="form-group">
					      <label class="control-label col-sm-2" for="Pengarang">Pengarang</label>
					      <div class="col-sm-10">          
					        <input type="text" class="form-control" id="Pengarang" placeholder="ketik Pengarang Buku..." name='pengarang' value='<?php echo $q_b['pengarang'];?>'>
					      </div>
					    </div>
					     <div class="form-group">
					      <label class="control-label col-sm-2" for="penerbit">Penerbit</label>
					      <div class="col-sm-10">          
					        <input type="text" class="form-control" id="penerbit" placeholder="ketik penerbit buku..." name='penerbit' value='<?php echo $q_b['penerbit'];?>'>
					      </div>
					    </div>
					    <div class="form-group">
					      <label class="control-label col-sm-2" for="stok">Stok</label>
					      <div class="col-sm-10">          
					        <input type="number" class="form-control" id="stok" name='stok' value='<?php echo $q_b['stok'];?>'>
					      </div>
					    </div>
					    <div class="form-group">
					      <label class="control-label col-sm-2" for="sinopsis">Sinopsis</label>
					      <div class="col-sm-10">          
					        <textarea name='sinopsis' class='form-control' id='sinopsis'><?php echo $q_b['sinopsis'];?></textarea>
					      </div>
					    </div>
					    <div class="form-group">        
					      <div class="col-sm-offset-2 col-sm-10">
					        <button type="submit" class="btn btn-default" name='update'>Submit</button>
					      </div>
					    </div>
					  </form>
						<br/><br/>
						<p><a href='index.php'>Halaman Utama</a></p>
					<?php
						break;
						case "del":
						if(!isset($_SESSION['username'])&&empty($_SESSION['username'])&&!isset($_GET['id'])&&empty($_GET['id'])){
							header("Location:index.php");
						}
						$id = $_GET['id'];
						$q_b = mysqli_fetch_array(mysqli_query($connc,"SELECT * FROM buku WHERE id_buku='$id'"));
						$q = mysqli_query($connc,"DELETE FROM buku WHERE id_buku='$id'");
						unlink("buku/".$q_b['judul']);
						unlink("img/".$q_b['gambar_buku']);
						header("Location:buku.php?page=index");
						break;
						case "pinjam":
						if(!isset($_SESSION['username'])&&empty($_SESSION['username'])&&!isset($_GET['id'])&&empty($_GET['id'])){
							header("Location:index.php");
						}
						$id = addslashes(strip_tags($_GET['id']));
						$q_b = mysqli_fetch_array(mysqli_query($connc,"SELECT * FROM buku WHERE id_buku='$id'"));

						if(isset($_POST['pinjam'])){
							$id = $q_b['id_buku'];
							$judul = $q_b['judul'];
							$jml_pinjam = $_POST['stok'];
							$tgl_pinjam = date("Y-m-d");
							$tgl_kembali = $_POST['tgl_kembali'];
							$stok = $q_b['stok'];
								$q = mysqli_query($connc,"INSERT INTO peminjaman VALUES('','".$_SESSION['id']."','$id','$tgl_pinjam','$tgl_kembali',0)") or die(mysqli_error($connc));
								$q_b = mysqli_query($connc,"UPDATE buku SET stok='$stok-$jml_pinjam' WHERE id_buku='$id'") or die(mysqli_error($connc));
								if($q&&$q_b){
									echo "<p>Berhasil Meminjam Buku</p>";
								}else{
									echo "<p>Gagal Meminjam Buku</p>";
								}
						}						
					?>
						<h2>Meminjam Buku</h2><hr/>
						<form class="form-horizontal" role="form" method='post' action=''>
						<div class="form-group">
					      <label class="control-label col-sm-2" for="id_buku">ID Buku</label>
					      <div class="col-sm-6">
					        <input type="text" class="form-control" id="id_buku" name='id_buku' value='<?php echo $q_b['id_buku'];?>' disabled>
					      </div>
					     </div>
					    <div class="form-group">
					      <label class="control-label col-sm-2" for="judul">Title Book</label>
					      <div class="col-sm-6">
					        <input type="text" class="form-control" id="judul" name='judul' value='<?php echo $q_b['judul'];?>' disabled>
					      </div>
					    </div>
					    <div class="form-group">
					      <label class="control-label col-sm-2" for="stok">Jumlah Yang dipinjam</label>
					      <div class="col-sm-6">          
					        <input type="number" class="form-control" id="stok" name='stok' required>
					      </div>
					    </div>
					    <div class="form-group">
					      <label class="control-label col-sm-2" for="tgl_pinjam">Tanggal Pinjam</label>
					      <div class="col-sm-6">          
					       <input type='text' class='form-control' id='rgl_pinjam' name='tgl_pinjam' value='<?php echo date("m/d/Y");?>' disabled/>
					      </div>
					    </div>
					    <div class="form-group">
					      <label class="control-label col-sm-2" for="tgl_kembali">Tanggal Kembali</label>
					      <div class="col-sm-6">          
					        <input type="date" class="form-control" id="tgl_kembali" name='tgl_kembali' required>
					      </div>
					    </div>
					    <div class="form-group">        
					      <div class="col-sm-offset-2 col-sm-6">
					        <button type="submit" class="btn btn-default" name='pinjam'>Submit</button>
					      </div>
					    </div>
					  </form>
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