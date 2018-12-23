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
					<h2>Buku Terbaru</h2>
					<hr/>
					<?php
						$q = mysqli_query($connc,"SELECT * FROM buku ORDER BY id_buku DESC LIMIT 3");
						while($q_b = mysqli_fetch_array($q)){
					?>
					<div class='col-sm-4 text-center'>
						<h4 class='bg-primary'><?php echo $q_b['judul'];?></h4>
						<a href='buku.php?page=view&id=<?php echo $q_b['id_buku'];?>'><img src='img/<?php echo $q_b['gambar_buku'];?>' title='This just example cover book' alt='This just example cover book' style='width:200px;height:250px;'/></a>
					</div>
					<?php
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