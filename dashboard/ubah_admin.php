 <?php 
  include "../../config/koneksi.php";
  include "home.php";
  $id = $_GET['id'];
  $sql = mysqli_query($koneksi, "select * from admin where id='$id' ");
  $data = mysqli_fetch_array($sql);
  ?>
 <div class="content-wrapper">
     <section class="content-header">
         <h1>
             <small>Halaman Ubah Data Admin</small>
         </h1>
         <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
             <li><a href="#">Layout</a></li>
             <li class="active">Ubah Data Admin</li>
         </ol>
     </section>
     <!-- Main content -->
     <section class="content">
         <?php
          if (isset($_POST['ubah'])) {
            $nama = $_POST['nama'];
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            $a = "update admin set nama='$nama', username='$username', password='$password' where id='$id'";
            $b = mysqli_query($koneksi, $a);
            if ($b) {
              echo "<div class='alert alert-success alert-dismissable'>
      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
      Data Berhasil Diubah, <a href='data_admin.php' class='alert-link'>Lihat Data</a>
      </div>";
            }
          }
          ?>
         <div class="row">
             <div class="col-md-8">
                 <div class="box">
                     <div class="box-header">
                         <h3 class="box-title">Ubah Data Admin</h3>&nbsp;
                     </div>
                     <div class="box-body">
                         <form role="form" action="" method="POST" enctype="multipart/form-data">
                             <div class="box-body">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Nama</label>
                                     <input type="text" name="nama" class="form-control" placeholder="Input Nama" value="<?php echo $data['nama']; ?>">
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Username</label>
                                     <input type="text" name="username" class="form-control" placeholder="Input Username" value="<?php echo $data['username']; ?>">
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Password</label>
                                     <input type="password" name="password" class="form-control" placeholder="Input Password" value="<?php echo $data['password']; ?>">
                                 </div>
                             </div>
                             <div class="box-footer">
                                 <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
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
  ?>

 <script type="text/javascript">
     $('#test').DataTable();
 </script> 