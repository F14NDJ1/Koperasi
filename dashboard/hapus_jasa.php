<?php
include "../../config/koneksi.php";
//mengambil data dari URL
if (isset($_GET['kode_jasa'])) {
    $kode_jasa = $_GET['kode_jasa'];
    $a = mysqli_query($koneksi, "delete from jasa where 
		kode_jasa='$kode_jasa'");
    if ($a) {
        header("location:data_jasa.php");
    } else {
        echo "Data gagal dihapus!";
    }
} else {
    echo "<h2>Anda Tkode_jasaak Berhak mengakses halaman ini, silahkan <a href='../index.php'>login</a> dahulu</h2>";
}
 