<?php
// 20 April 2016
ob_start();
session_start();
//error_reporting(0);

class Booked{

	public function koneksi(){
		$local = "localhost";
		$user = "root";
		$pwd = "";
		$db = "lks_kota_2016";
		$koneksi = mysqli_connect($local,$user,$pwd,$db);
		if($koneksi){
			return $koneksi;
		}else{
			return mysqli_error($koneksi);
		}
	}

	public function login(){

	}

	public function logout(){

	}

	public function register(){

	}

	public function show(){

	}

	public function add(){

	}

	public function view(){

	}

	public function update(){

	}

	public function delete(){

	}

	public function search(){

	}

	public function pagination(){

	}

	public function filter($word){
		$filter = addslashes(strip_tags($word));
		return $filter;
	}
}

$booked = new Booked;
$booked->koneksi();
?>