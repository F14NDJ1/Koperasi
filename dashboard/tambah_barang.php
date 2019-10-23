<?php 
 error_reporting(0);
 session_start();
  if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    include "../../config/koneksi.php";
    include "home.php";
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <h1>
             <small>Halaman Tambah Data Barang</small>
         </h1>
         <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
             <li><a href="#">Layout</a></li>
             <li class="active">Tambah Data Barang</li>
         </ol>
     </section>
     <!-- Main content -->
     <section class="content">
         <?php
            if (isset($_POST['simpan'])) {
                $kode = $_POST['kode_barang'];
                $nama = $_POST['nama'];
                $satuan = $_POST['satuan'];
                $harga_beli = $_POST['harga_beli'];
                $profit = $_POST['profit'];
                $harga_jual = $_POST['harga_jual'];
                $stok = $_POST['stok'];
                //uploadf_foto
                $gambar = $_FILES['gambar']['name'];
                if (strlen($gambar) > 0) {
                    if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
                        move_uploaded_file($_FILES['gambar']['tmp_name'], "images/barang/" . $gambar);
                    }
                }
                if (empty($kode)) {
                    echo "<div class='alert alert-warning alert-dismissable'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        Nama Kode Harus diisi!
                        </div>";
                } else {
                    $a = mysqli_query($koneksi, "select * from barang where 
                                        kode_barang='$kode'");
                    $b = mysqli_num_rows($a);
                    $sql = "insert into barang (kode_barang, nama, satuan, harga_beli, profit, harga_jual, stok, gambar)
                                                values('$kode','$nama','$satuan','$harga_beli','$profit','$harga_jual','$stok','$gambar')";
                    $query = mysqli_query($koneksi, $sql);
                    if ($query) {
                        echo "<div class='alert alert-success alert-dismissable'>
       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
       Data berhasil disimpan, <a href='data_barang.php' class='alert-link'>Lihat Data</a>
       </div>";
                    } else {
                        echo "<div class='alert alert-warning alert-dismissable'>
       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
       Data gagal disimpan!
       </div>";
                    }
                }
            }
            ?>

         <div class="row">
             <div class="col-md-8">
                 <div class="box">
                     <div class="box-header">
                         <h3 class="box-title">Tambah Data Barang</h3>&nbsp;
                     </div>
                     <div class="box-body">
                         <form role="form" action="" method="POST" enctype="multipart/form-data">
                             <div class="box-body">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Kode</label>
                                     <input type="text" name='kode_barang' class="form-control" id="exampleInputEmail1" placeholder="Input Kode">
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">Nama</label>
                                     <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Input Nama">
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">Satuan</label>
                                     <input type="text" name="satuan" class="form-control" id="exampleInputPassword1" placeholder="Input Satuan">
                                 </div>
                                 <div class="form-group">
                                     <label>Harga Beli</label>
                                     <div class="input-group">
                                         <span class="input-group-addon" id="basic-addon2">Rp.</span>
                                         <input type="text" class="form-control" name="harga_beli" id="harga_beli" onkeyup="sum()" placeholder="Input Harga Beli">
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label>Harga Jual</label>
                                     <div class="input-group">
                                         <span class="input-group-addon" id="basic-addon2">Rp.</span>
                                         <input type="text" class="form-control" name="harga_jual" id="harga_jual" onkeyup="sum()" placeholder="Input Harga Jual">
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label>Profit</label>
                                     <div class="input-group">
                                         <span class="input-group-addon" id="basic-addon2">Rp.</span>
                                         <input type="number" name="profit" class="form-control" style="background-color : #e7e3e9" value="0" id="profit" placeholder="Input Profit" readonly>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">Stock</label>
                                     <input type="number" name="stok" class="form-control" id="exampleInputPassword1" placeholder="Input stock">
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleInputFile">Upload Gambar</label>
                                     <input type="file" name="gambar">
                                     <p class="help-block">Upload Gambar Barang.</p>
                                 </div>
                             </div>
                             <div class="box-footer">
                                 <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-s"> Simpan</i></button>
                                 <a href="data_barang.php" class="btn btn-danger"><i class="fa fa-arrow-left"> Back</i></a>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 </div>
 <script>
     function sum() {
         var harga_beli = document.getElementById('harga_beli').value;
         var harga_jual = document.getElementById('harga_jual').value;
         var result = parseInt(harga_jual) - parseInt(harga_beli);
         if (!isNaN(result)) {
             document.getElementById('profit').value = result;
         }
     }
 </script>
 <?php 
    include "footer.php";
} else {
    echo "<script language='javascript'>
  alert('Nah siap looh, login dulu dong!');
  document.location='../index.php';
  </script>";
}
?> 