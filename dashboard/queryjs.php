<?php
header('Content-Type: application/json');

include "../../config/koneksi.php";

$sqlQuery2 = "select distinct(nama_barang) as nama from v_penjualan";
$result2 = mysqli_query($koneksi, $sqlQuery2);

$data2 = array();
foreach ($result2 as $rows) {
    $xc = mysqli_query($koneksi, "select nama_barang, sum(jumlah) as jml from v_penjualan where nama_barang='$rows[nama]'");
    foreach ($xc as $xx) {
        array_push($data2, $xx);
    }
}
mysqli_close($koneksi);

echo json_encode($data2);
