<?php
 require_once "inc/class.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>BookedMe | Booking Transportation Online Now</title>
	<?php
	 require "meta.php";
	?>
</head>
<body>
 <div id='container'>
 	<?php require "header.php"; ?>
 	<section>
 		<main>
 			<div class='title'>
 				<h1>BookedMe</h1>
 				<p>Booking Online Now, With Booked Me You Will Have Chance to Change Yourlife style.</p>
 			  <button style='margin-left: 0;'><a href='page.php?p=about'>Learn More</a></button> 
 			  <button><a href='index.php?p=register'>Join Us</a></button>
 			</div>
 		</main>
 	</section>
 	<div class='clearfix'></div>
 	<aside>
 		<div class='side'>
 			<div class='side-info'>
 				<h2>Cara Menggunakan</h2>
 				<hr class='small'/>
 				<div class='side-how'>
	 				<img src='assets/1.png' alt='Cara Menggunakan 1'/>
	 				<p>You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab.</p>
 				</div>
 				<div class='side-how'>
					<img src='assets/2.png' alt='Cara Menggunakan 2'/>
					<p>You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab</p>
 				</div>
 				<div class='side-how'>
 					<img src='assets/3.png' alt='Cara Menggunakan 3'/>
 					<p>You can easily change the formatting of selected text in the document text by choosing a look for the selected text from the Quick Styles gallery on the Home tab.</p>
 				</div>
 			</div>
 		</div>
 		<!-- <div class='side'>
 			<div class='side-log'>
	 			
		 	</div>
 		</div> -->
 	</aside>
 	<div class='clearfix'></div>
 	<footer>
 	 <div id='footer'>
 		<div class='side-bottom'>
 			<ul>
 				<li><a href='#'>Help</a></li>
 				<li><a href='#'>FAQ</a></li>
 				<li><a href='#'>About</a></li>
 				<li><a href='#'>Sitemap</a></li>
 			</ul>
 		</div>
 		<div class='side-bottom'>
 			
 			<ul>
 				<li><a href="#">Facebook</a></li>
 				<li><a href='#'>Twitter</a></li>
 				<li><a href='#'>Google Plus</a></li>
 				<li><a href='#'>Instagram</a></li>
 			</ul>
 		</div>
	 </div>
	 <div class='clearfix'></div>
	 <?php
	  require "footer.php";
	 ?>
 	</footer>
 </div>
</body>
</html>