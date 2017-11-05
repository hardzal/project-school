		<div class='post'>
 			<div class='post-first'>
 				<h1>Lastest Post</h1><div class='clear'></div>
 				<?php
 					$q = mysqli_query($blog->koneksi(),"SELECT a.artikel_id, a.user_id, a.kategori_id, a.judul_artikel, a.tanggal_artikel, a.img_artikel, a.isi, b.username FROM blog_artikel AS a INNER JOIN blog_user AS b ON a.user_id = b.user_id LIMIT 0 , 1");
 					$qk = mysqli_query($blog->koneksi(),"SELECT a.kategori_id, b.judul_kategori FROM blog_artikel AS a INNER JOIN blog_kategori AS b ON a.kategori_id = b.kategori_id LIMIT 0 , 1");
 					$qq = mysqli_fetch_array($q);
 					$qc = mysqli_fetch_array($qk);
 				?>
 				<div class='post-thumb'>
 					<a href='article.php?id=<?php echo $qq['artikel_id'];?>' title='<?php echo $qq['judul_artikel'];?>'><img src='assets/image/<?php echo $qq['img_artikel'];?>' alt='<?php echo $qq['judul_artikel'];?>'/></a>
 				</div>
 				<div class='post-content'>
 					<h2 class='post-title'><a href='article.php?id=<?php echo $qq['artikel_id'];?>'><?php echo $qq['judul_artikel'];?></a></h2>
 					<span><?php echo $qq['tanggal_artikel'];?> / <a href='#'><?php echo $qq['username'];?></a> / <a href='category.php?id=<?php echo $qc['kategori_id'];?>'><?php echo $qc['judul_kategori'];?></a> </span>
 					<p><?php echo $blog->snippet($qq['isi']);?>
 					</p>
 					<a href='article.php?id=<?php echo $qq['artikel_id'];?>' class='read-more'>Readmore</a>
 				</div>
 			</div>
 			<div class='post-second'>
 				<ul class='column-post'>
 				<?php
 					$q = mysqli_query($blog->koneksi(),"SELECT a.artikel_id, a.user_id, a.kategori_id, a.judul_artikel, a.tanggal_artikel, a.img_artikel, a.isi, b.username FROM blog_artikel AS a INNER JOIN blog_user AS b ON a.user_id = b.user_id LIMIT 1 , 4");
 					$qk = mysqli_query($blog->koneksi(),"SELECT a.kategori_id, b.judul_kategori FROM blog_artikel AS a INNER JOIN blog_kategori AS b ON a.kategori_id = b.kategori_id LIMIT 1 , 4");
 					while($qq = mysqli_fetch_array($q)){
 					 $qc = mysqli_fetch_array($qk);
 				?>
 					<li>
 						<div class='box'>
 							<a href='article.php?id=<?php echo $qq['artikel_id'];?>' title='<?php echo $qq['judul_artikel'];?>'><img src='assets/image/<?php echo $qq['img_artikel'];?>' alt='<?php echo $qq['judul_artikel'];?>'/></a>
 							<div class='post-content'>
	 							<h2 class='post-title'><a href='article.php?id=<?php echo $qq['artikel_id'];?>' title='<?php echo $qq['judul_artikel'];?>'><?php echo $qq['judul_artikel'];?></a></h2>
	 							<span><?php echo $qq['tanggal_artikel'];?> / <a href='#'><?php echo $qq['username'];?></a> / <a href='#'><?php echo $qc['judul_kategori'];?></a> </span>
 							</div>
 						</div>
 					</li>
 				<?php
 					};
 				?>
 				</ul>
 				<div class='paging'>
 					<ul>
 						<li class='selected'>1</li>
 						<li><a href='#'>2</a></li>
 						<li><a href='#'>3</a></li>
 						<li><a href='#'>Next</a></li>
 						<li><a href='#'>Last</a></li>
 					</ul>
 				</div>
 			</div>
 		</div>