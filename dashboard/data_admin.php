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
             <small>Halaman Data Admin</small>
         </h1>
         <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
             <li><a href="#">Layout</a></li>
             <li class="active">Data Admin</li>
         </ol>
     </section>

     <!-- Main content -->
     <section class="content">
         <div class="box">
             <div class="box-header">
                 <h3 class="box-title">Data Admin</h3>&nbsp;
             </div>
             <div class="box-header">
                 <a href="tambah_admin.php" class="btn btn-primary"><i class="fa fa-plus"> Tambah </i></a>
             </div>
             <div class="box-body">
                 <table id="test" class="table table-bordered table-striped">
                     <thead>
                         <tr>
                             <th>No</th>
                             <th>ID</th>
                             <th>Nama</th>
                             <th>Username</th>
                             <th>Password</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         <?php
                          $sql = "select * from admin";
                          $query = mysqli_query($koneksi, $sql);
                          $jml = mysqli_num_rows($query);
                          $no = 1;
                          while ($a = mysqli_fetch_array($query)) {
                            ?>
                         <tr>
                             <td><?php echo $no; ?></td>
                             <td><?php echo $a['id']; ?></td>
                             <td><?php echo $a['nama']; ?></td>
                             <td><?php echo $a['username']; ?></td>
                             <td><?php echo $a['password']; ?></td>
                             <td>
                                 <a href="ubah_admin.php?id=<?php echo $a['id']; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                 <a href="javascript:if(confirm('Apa Anda Yakin Ingin Mengahapus User dengan Nama : <?php echo $a['nama']; ?> ?'))
                      {document.location='hapus_admin.php?id=<?php echo $a['id']; ?>';}" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i></a>
                             </td>
                         </tr>
                         <?php $no++;
                        } ?>
                     </tbody>
                 </table>
             </div>
         </div>
     </section>
 </div>
 <!-- /.content-wrapper -->
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