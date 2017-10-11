<?php
session_start();
require "../koneksi.php";
include "../head.php";
?>

 <title>Perpustakaan Online | Be Informed Be Think </title>
  <link href='../css/style.css' rel='stylesheet' type='text/css'/>
 <link href='../image/icon.ico' type='image/x-icon' rel='icon'/>
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
				<h2>About Us</h2>
				<p>In Here We Care to you!!</p>
			</article>
		</section>
		<aside class='kanan'>
			<?php
			include "panel.php";
			include "../sidebar.php";
			?>
		</aside>
		</div>
		<div class='clear'></div>
	<?php
		include "../footer.php";
	?>	
	</div>	
</body>
</html>