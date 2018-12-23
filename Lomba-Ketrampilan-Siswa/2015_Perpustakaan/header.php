		<header>
			<div class='head-left' style='background-image:url(image/logo-header.png);background-size:100% 100%;height:200px;'>
			</div>
		</header>
		<div class='clear'></div>
		<div id="menu">
			<nav>
				<ul>
					<li><a href='index.php' title='Home Page'>Home</a></li>
					<li><a href='page/sitemap.php'>Site Map</a></li>
					<li><a href='page/about.php'>About Us</a></li>
					<li><a href='#'>Category</a>
							<ul>
								<?php
								$query = mysqli_query($koneksi,"SELECT * FROM kategori");
								while($q_e = mysqli_fetch_array($query)){
									echo "<li><a href='#'>".$q_e['nama_kategori']."</a></li>";
								}
								?>
							</ul>
					</li>
				</ul>
			</nav>
		</div>