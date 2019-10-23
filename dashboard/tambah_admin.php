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
             <small>Halaman Tambah Data Admin</small>
         </h1>
         <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
             <li><a href="#">Layout</a></li>
             <li class="active">Tambah Data Admin</li>
         </ol>
     </section>

     <!-- Main content -->
     <section class="content">

         <?php
          if (isset($_POST['simpan'])) {
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            if (empty($username)) {
              echo "<div class='alert alert-warning alert-dismissable'>
      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
      Nama User Harus diisi!
      </div>";
            } else {
              $a = mysqli_query($koneksi, "select * from admin where username='$username'");
              $b = mysqli_num_rows($a);
              $sql = "insert into admin (nama, username, password) 
      values ('$nama','$username','$password')";
              $query = mysqli_query($koneksi, $sql);
              if ($query) {
                echo "<div class='alert alert-success alert-dismissable'>
       <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
       Data berhasil disimpan, <a href='data_admin.php' class='alert-link'>Lihat Data</a>
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
             <div class="col-md-6">
                 <div class="box">
                     <div class="box-header">
                         <h3 class="box-title">Tambah Data Admin</h3>&nbsp;
                     </div>
                     <div class="box-body">
                         <form role="form" action="" method="POST">
                             <div class="box-body">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Nama</label>
                                     <input type="text" name='nama' class="form-control" id="exampleInputEmail1" placeholder="Input Nama">
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">Username</label>
                                     <input type="text" name="username" class="form-control" id="exampleInputPassword1" placeholder="Input Username">
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">Password</label>
                                     <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Input Password">
                                 </div>
                             </div>
                             <div class="box-footer">
                                 <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                 <a href="data_admin.php" class="btn btn-danger"><i class="fa fa-arrow-left"> Back</i></a>
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

 <script type="text/javascript">
     $('#test').DataTable();
 </script> 