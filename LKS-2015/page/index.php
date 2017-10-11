<?php
session_start();
require_once "../koneksi.php";
if(isset($_SESSION['username'])&&!empty($_SESSION['username'])){
	if($_SESSION['level'] == "admin"){
		header("Location:admin.php");
	}else if($_SESSION['level'] == "member"){
		header("Location:user.php");
	}
}else{
		header("Location:../index.php");
}
?>