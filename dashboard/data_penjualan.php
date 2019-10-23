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
                 <h3 class="box-title">Data Penjualan</h3>&nbsp;
             </div>
             <div class="box-header">
             </div>
             <div class="box-body">
                 <div class="table-responsive">
                     <table id="test" class="table table-bordered table-striped">
                         <thead>
                             <tr>
                                 <th>No</th>
                                 <th>Kode Penjualan</th>
                                 <th>Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             <?php
                                $sql = "select * from penjualan_detail";
                                $query = mysqli_query($koneksi, $sql);
                                $jml = mysqli_num_rows($query);
                                $no = 1;
                                while ($a = mysqli_fetch_array($query)) {
                                    ?>
                             <tr>
                                 <td><?php echo $no; ?></td>
                                 <td><?php echo $a['kode_penjualan']; ?></td>
                                 <td>
                                     <a href="detail_penjualan.php?kode_penjualan=<?php echo $a['kode_penjualan']; ?>" class="btn btn-info"><i class="glyphicon glyphicon-eye-open"></i></a>
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