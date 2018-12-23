<?php
// error_reporting(0);
ob_start();
session_start();
$connc = mysqli_connect("localhost","root","","uas_2015");
if(!$connc){
	die(mysqli_error($connc));
}
?>