<?php
 require_once "inc/class.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>All Category</title>
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
<section>
	<article class='post-view'>
			<h1>Category List</h1>
			<div class='post-content'>
				<ul>
				<?php
					$query = mysqli_query($blog->koneksi(),"SELECT * FROM blog_kategori");
					while($q_k = mysqli_fetch_array($query)){
				?>
					<li><a href='category.php'><?php echo $q_k['judul_kategori'];?></a></li>
				<?php
					};
				?>
				</ul>
			</div>
	</article>
</section>
<?php
 require_once "menu.php";
?>
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