<?php
include "../../config/koneksi.php";
//mengambil data dari URL
if (isset($_GET['kode_barang'])) {
	$kode_barang = $_GET['kode_barang'];
	$a = mysqli_query($koneksi, "delete from barang where 
		kode_barang='$kode_barang'");
	if ($a) {
		header("location:data_barang.php");
	} else {
		echo "Data gagal dihapus!";
	}
} else {
	echo "<h2>Anda Tidak Berhak mengakses halaman ini, silahkan <a href='.../index.php'>login</a> dahulu</h2>";
}
 