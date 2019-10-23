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
            <small>Halaman Tambah Data Jasa</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Layout</a></li>
            <li class="active">Tambah Data Jasa</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php
        if (isset($_POST['simpan'])) {
            $kode_jasa = $_POST['kode_jasa'];
            $nama = $_POST['nama_jasa'];
            $tarif = $_POST['tarif'];
            if (empty($nama)) {
                echo "<div class='alert alert-warning alert-dismissable'>
      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
      No Pilisi Harus diisi!
      </div>";
            } else {
                $a = mysqli_query($koneksi, "select * from jasa where 
        nama_jasa='$nama'");
                $b = mysqli_num_rows($a);
                $sql = "insert into jasa (kode_jasa, nama_jasa, tarif)
      values('$kode_jasa','$nama','$tarif')";
                $query = mysqli_query($koneksi, $sql);
                if ($query) {
                    echo "<div class='alert alert-success alert-dismissable'>
       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
       Data berhasil disimpan, <a href='data_jasa.php' class='alert-link'>Lihat Data</a>
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
                        <h3 class="box-title">Tambah Data Jasa</h3>&nbsp;
                    </div>
                    <div class="box-body">
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Kode</label>
                                    <input type="text" name="kode_jasa" class="form-control" id="exampleInputPassword1" placeholder="Input Kode">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama Jasa</label>
                                    <input type="text" name="nama_jasa" class="form-control" id="exampleInputPassword1" placeholder="Input Nama Jasa">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tarif</label>
                                    <input type="number" name="tarif" class="form-control" id="exampleInputPassword1" placeholder="Input Tarif">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"> Simpan</i></button>
                                <a href="data_jasa.php" class="btn btn-danger"><i class="fa fa-arrow-left"> Back</i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php 
include "footer.php";
} else {
    echo "<script language='javascript'>
  alert('Nah siap looh, login dulu dong!');
  document.location='../index.php';
  </script>";
}
?> 