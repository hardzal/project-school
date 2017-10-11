<?php
require_once "koneksi.php";
session_start();



$page = isset($_GET['page']) ? $_GET['page'] : "";
if($page ==""){
	$page = "list";
}


switch($page){
	case "list":
		if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
			header("Location:index.php");
		}
		echo "<h2>Daftar Pinjaman</h2>";
	echo "<table>
			<tr>
				<th>No</th>
				<th>Judul Buku</th>
				<th>Tanggal Pinjam</th>
				<th>Tanggal Kembalikan</th>
				<th>Keterangan</th>
			</tr>";
			$id_akun = $_SESSION['id_akun'];
		$qu = mysqli_query($koneksi,"SELECT *  FROM pinjam INNER JOIN buku ON pinjam.id_buku=buku.id_buku WHERE id_akun='$id_akun'");
		$n = 1;
		if(mysqli_num_rows($qu)==0){
			echo "Anda Belum Meminjam Buku manapun";
		}else{
		while($q_p = mysqli_fetch_array($qu)){
			echo "<tr>
				<td>".$n."</td>
				  <td>".$q_p['nama_buku']."</td>
				  <td>".$q_p['tanggal_pinjam']."</td>
				  <td> - </td>
				  <td>".$q['ket']."</td>
				 </tr>";
		}
		echo "</table>";
	}

	break;
	case "add":
		if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
			echo "<script type='text/javascript'>
					alert('You Must Regist/Login');
				</script>";
			header("Location:index.php");
		}

		$id = addslashes(strip_tags($_GET['id']));
		if($id==""){
			echo "<script type='text/javascript'>
					alert('Anda Belum Memilih Buku mana yang ingin dipinjam');
					document.location=('".$_SERVER['HTTP_REFERER']."');
				</script>";
			
		}
		$id_akun = $_SESSION['id_akun'];
		$query = mysqli_query($koneksi,"INSERT INTO pinjam VALUES('','$id','$id_akun',now(),'-','Sedang dipinjam')");
		if($query){
			echo "Sukses Meminjam";
		}else{
			echo "Batal Meminjam";
		}
		
	break;
	case "del":
		if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
			header("Location:index.php");
		}
	break;
}

?>