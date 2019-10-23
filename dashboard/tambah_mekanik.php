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
            <small>Halaman Tambah Data Mekanik</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Layout</a></li>
            <li class="active">Tambah Data Mekanik</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php
        if (isset($_POST['simpan'])) {
            $kode = $_POST['kode'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $mobile = "62" . $_POST['mobile'];
            $status = $_POST['status'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            if (empty($nama)) {
                echo "<div class='alert alert-warning alert-dismissable'>
      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
      Nama nama Harus diisi!
      </div>";
            } else {
                $a = mysqli_query($koneksi, "select * from mekanik where 
        nama='$nama'");
                $b = mysqli_num_rows($a);
                $sql = "insert into mekanik (id, kode, nama, alamat, mobile, status, email, password)
      values(NULL, '$kode','$nama','$alamat','$mobile','$status','$email', '$password')";
                $query = mysqli_query($koneksi, $sql);
                if ($query) {
                    echo "<div class='alert alert-success alert-dismissable'>
       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
       Data berhasil disimpan, <a href='data_mekanik.php' class='alert-link'>Lihat Data</a>
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
                        <h3 class="box-title">Tambah Data Mekanik</h3>&nbsp;
                    </div>
                    <div class="box-body">
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Kode</label>
                                    <input type="text" name="kode" class="form-control" id="exampleInputPassword1" placeholder="Input Kode">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Input Nama">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="" cols="15" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                     <label>Mobile</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon2">+62</span>
                                    <input type="text" name="mobile" class="form-control" placeholder="81239353129">
                                </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="status" value="Aktif" checked="">
                                            Aktif &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            <input type="radio" name="status" value="Sibuk">
                                            Sibuk &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            <input type="radio" name="status" value="Tidak Aktif">
                                            Tidak Aktif
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="Input Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Input Password">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-s"> Simpan</i></button>
                                <a href="data_mekanik.php" class="btn btn-danger"><i class="fa fa-arrow-left"> Back</i></a>
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