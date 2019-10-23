<?php
error_reporting(0);
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    include "../../config/koneksi.php";
    include "home.php";
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <section class="content">
         <div class="box">
             <div class="box-header">
                 <h3 class="box-title">Data Service</h3>&nbsp;
             </div>
             <div class="box-header">
             </div>
             <div class="box-body">
                 <div class="table-responsive">
                     <table id="test" class="table table-bordered table-striped">
                         <thead>
                             <tr>
                                 <th>No</th>
                                 <th>ID</th>
                                 <th>Kendaraan</th>
                                 <th>No Polisi</th>
                                 <th>Pemilik</th>
                                 <th>Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                                $sql = "select * from service where status='selesai'";
                                $query = mysqli_query($koneksi, $sql);
                                $jml = mysqli_num_rows($query);
                                $no = 1;
                                while ($a = mysqli_fetch_array($query)) {
                                    ?>
                             <tr>
                                 <td><?php echo $no; ?></td>
                                 <td><?php echo $a['id']; ?></td>
                                 <td><?php echo $a['kendaraan']; ?></td>
                                 <td><?php echo $a['nopol']; ?></td>
                                 <td><?php echo $a['pemilik']; ?></td>
                                 <td>
                                     <a href="detail_service.php?id=<?php echo $a['id']; ?>" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>
                                 </td>
                             </tr>
                             <?php $no++;
                            } ?>
                         </tbody>
                     </table>

                 </div>
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