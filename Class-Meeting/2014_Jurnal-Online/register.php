<!DOCTYPE html>
<HTML>
<?php
require_once "koneksi.php";
?>
<head>
<title>Register a New One</title>
<link href='style/style.css' type='text/css' rel='stylesheet'/>
<style type='text/css'>

</style>
</head>
<body>
<div id="wrapper">
	<?php
	include "header.php";
	include "navigasi.php";
	?>
	<div class="post">
		<h2>Register a New Member</h2>
		<div class="isi">
			<form method="post" action="">
				<ul>
					<li>First Name</li>
					<li><input type="text" name="name"/></li>
				</ul>
				<ul>	
					<li>Last Name</li>
					<li><input type="text" name="name_l"/></li>
				</ul>
				<ul>
					<li>Country</li>
					<li><input type="text" name="negara"/></li>
				</ul>
					<ul>
						<li>City</li>
						<li><input type="text" name="kota"/></li>
					</ul>
					<ul>
						<li>Phone Number</li>
					<li><input type="number" name="phone-number"/></li>
					</ul>
					<ul>
						<li>Username</li>
						<li><input type="text" name="username"/></li>
					</ul>
					<ul>
						<li>Password</li>
						<li><input type="password" name="password"/></li>
					</ul>
				<ul>	<li><input type="submit"/></li>
				</ul>
			</form>
	</div>

</div>
<?php
	include("sidebar.php");
	?><div style="clear:both;"></div>
	<?php include("footer.php");?>
</div>
</body>
</HTML>