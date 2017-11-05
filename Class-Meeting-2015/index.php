<?php
 require_once "inc/class.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>BaduBlog | Berbagi Ilmu Pengetahuan</title>
<?php
 require_once "meta.php";
?>
</head>
<body>
 <header>
 <?php
  require_once "header.php";
 ?>
 </header>
 <main>
 <?php
  require_once "main.php";
 ?>
 </main>
 <?php
  require_once "menu.php";
 ?>
 <section>
 	<article>
 		<?php
 		  require_once "post.php";
 		?>
 	</article>
 </section>
 <aside>
	 <?php
	 	require_once "sidebar.php";
	 ?>
 </aside>
 <footer>
 <?php
  require_once "footer.php";
 ?>
 </footer>
</body>
</html>
