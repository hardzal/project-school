<?php
 require_once "inc/class.php";
?>
<!DOCTYPE html>
<html>
<head>
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
<?php
 require_once "menu.php";
?>
<section>
	<article class='post-viewed'>
		<a href='sitemap.php'><img src='assets/image/sitemappng'/></a>
		<h1>Sitemap</h1>
		<p>This Blog is About Science Well, This is started form now you now maybe soon is there are fixed.</p>
		<h3>All The Link Of this Site</h3>
			<ul>	
				<li><a href='index.php'>Homepage</a></li>
				<li><a href='about.php'>About</a></li>
				<li><a href='contact.php'>Contact</a></li>
				<li><a href='sitemap.php'>Sitemap</a></li>
				<li><a href='register.php'>Register</a></li>
				<li><a href='login.php'>Login</a></li>
				<li><a href='category.php'>All Category List</a></li>
				<li><a href='search.php'>Search Page</a></li>
			</ul>
		<h3>All Post in This Blog</h3>
			<ul>
				<?php
					$q = mysqli_query($blog->koneksi(),"SELECT * FROM blog_artikel");
					while($qq = mysqli_fetch_array($q)){
						echo "<li><a href='article.php?id=".$qq['artikel_id']."' title='".$qq['judul_artikel']."'>".$qq['judul_artikel']."</a></li>";
					}
				?>
			</ul>
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