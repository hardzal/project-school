<div class='sidetop'>
	 	<div class='wrapper'>
	 		<div class='sidebar'>
	 			<h3>Top Post</h3>
	 			<div class='side-content'>
		 			<ul>
		 				<li><a href='#'>Indahnya berlajar bersama suhu</a></li>
		 				<li><a href='#'>Indahnya berlajar bersama suhu</a></li>
		 				<li><a href='#'>Indahnya berlajar bersama suhu</a></li>
		 				<li><a href='#'>Indahnya berlajar bersama suhu</a></li>
		 			</ul>
		 		</div>
	 		</div>
	 		<div class='sidebar'>
	 			<h3>Recent Comments</h3>
	 			<div class='side-content com'>
		 			<ul>
		 				<li><a href='#'>Badu Author</a> baru saja berkomentar di <a href='#'>Indahnya belajar bersama anu</a></li>
		 				<li><a href='#'>Badu Author</a> baru saja berkomentar di <a href='#'>Indahnya belajar bersama anu</a></li>
		 				<li><a href='#'>Badu Author</a> baru saja berkomentar di <a href='#'>Indahnya belajar bersama anu</a></li>
		 				<li><a href='#'>Badu Author</a> baru saja berkomentar di <a href='#'>Indahnya belajar bersama anu</a></li>
		 			</ul>
		 		</div>
	 		</div>
	 		<div class='sidebar'>
	 			<h3>Schedule</h3>
	 			<div class='side-content'>
		 			<dl>
		 				<dt>14 Desember 2015</dt>
			 				<dd>Belajar bersama anu</dd>
			 				<dd>Belajar bareng bareng anu</dd>
			 			<dt>15 Desember 2015</dt>
			 				<dd>Planned</dd>
			 				<dd>Planning</dd>
			 		</dl>
			 	</div>
		 	</div>
	 	</div>
	 </div>
	 <div class='sidecenter'>
	 	<div class='wrapper'>		
	 		<div class='sidebar'>User Online : 1 People</div>
	 		<?php
	 			$q = mysqli_query($blog->koneksi(),"INSERT INTO blog_statistik VALUES('','$_SERVER[REMOTE_ADDR]')");
	 			$q = mysqli_query($blog->koneksi(),"SELECT * FROM blog_statistik");
	 			$total = mysqli_num_rows($q);
	 		?>
	 		<div class='sidebar'>Page Hit : <?php echo $total;?> Hits</div>
	 		<div class='sidebar'>Your IP : <?php echo $_SERVER['REMOTE_ADDR'];?></div>
	 	</div>
	 </div>
	 <div class='sidebottom'>
	 	<div class='wrapper'>
	 		<div class='sideleft'>
	 			<h3>Site Link</h3>
	 			<div class='side-content'>
		 			<ul>
		 				<li><a href='login.php'>Login</a></li>
		 				<li><a href='register.php'>Register</a></li>
		 				<li><a href='shuotbox.php'>Buku Tamu</a></li>
		 				<li><a href='category.php'>All Category</a></li>
		 			</ul>
		 		</div>
	 		</div>
	 		<div class='sideright'>
	 			<h3>Subscribs Us</h3>
	 			<div class='side-content'>
	 				<p>Dengan Belangganan kamu bisa mendapat bonus bonus bermanfaat seperti halnya makanan, minuman dan merchandise dari blog ini.</p>
	 				<form method='post' action=''>
	 					<input type='email' name='email' placeholder='ketikkan email kamu...'/>
	 					<input type='submit' name='kirim' value='submit'/>
	 				</form>
	 		</div>
	 	</div>
	 </div>
