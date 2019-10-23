<?php
include "../../config/koneksi.php";
//mengambil data dari URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $a = mysqli_query($koneksi, "delete from member where 
		id='$id'");
    if ($a) {
        header("location:data_member.php");
    } else {
        echo "Data gagal dihapus!";
    }
} else {
    echo "<h2>Anda Tidak Berhak mengakses halaman ini, silahkan <a href='../index.php'>login</a> dahulu</h2>";
}
 