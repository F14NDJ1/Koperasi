<?php
include '../../config/koneksi.php';
$satuan = $_POST['satuan'];
$jumlah_satuan = $_POST['jumlah_satuan'];
$jumlah_item = $_POST['jumlah_item'];
$harga_beli_satuan = $_POST['harga_beli_satuan'];
$barang = $_POST['barang'];
$pembelian_id = $_POST['pembelian_id'];
$suplier = $_POST['suplier_id'];

$sql = "insert into pembelian_detail(id, satuan, jumlah_satuan, jumlah_item, harga_beli_satuan, barang, pembelian_id, suplier_id) 
                                values(NULL, '$satuan','$jumlah_satuan','$jumlah_item','$harga_beli_satuan','$barang','$pembelian_id','$suplier')";
$query = mysqli_query($koneksi, $sql);

$sql1 = mysqli_query($koneksi, "select stok from barang where nama='$barang'");
$d = mysqli_fetch_array($sql1);

$stock = $d['stok'];
$baru = $stock + $jumlah_item;
$sql2 = "update barang set stok='$baru' where nama='$barang'";
$data2 = mysqli_query($koneksi, $sql2);

$querys = mysqli_query($koneksi, "select * from pembelian_detail where pembelian_id='$pembelian_id'");
// $querys = mysqli_query($koneksi, "select SUM(harga_beli_satuan) as total from pembelian_detail where pembelian_id='$pembelian_id'");
while ($dt = mysqli_fetch_array($querys)) {
    $sub = $dt['jumlah_satuan'] * $dt['harga_beli_satuan'];
    $total = $total + $sub;
}

$sql3 = "update pembelian set total='$total' where id='$pembelian_id'";
$data3 = mysqli_query($koneksi, $sql3);
