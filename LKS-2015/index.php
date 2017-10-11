<?php
session_start();
require "koneksi.php";
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
			include "tengah.php";
		?>
		<div class='clear'></div>
		<div id='main-content'>
			<?php
				include "content.php";
			?>		
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
	<script src='css/jquery-1.11.3.min.js'></script>
	<script type='text/javascript'>
		$(function(){
			$('nav ul li a[href~="' + location.href + '"]').parents('li').addClass('selected');
		})
	</script>
</body>
</html>