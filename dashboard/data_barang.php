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
               <small>Halaman Data Barang</small>
           </h1>
           <ol class="breadcrumb">
               <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
               <li><a href="#">Layout</a></li>
               <li class="active">Data Barang</li>
           </ol>
       </section>
       <!-- Main content -->
       <section class="content">
           <div class="box">
               <div class="box-header">
                   <h3 class="box-title">Data Barang</h3>&nbsp;
               </div>
               <div class="box-header">
                   <a href="tambah_barang.php" title="Tambah Data" class="btn btn-primary"><i class="fa fa-plus"> Tambah </i></a>
               </div>
               <div class="box-body">
                   <div class="table-responsive">
                       <table id="test" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th>No</th>
                                   <th>Kode</th>
                                   <th>Nama</th>
                                   <th>Satuan</th>
                                   <th>Harga B</th>
                                   <th>Harga J</th>
                                   <th>Profit</th>
                                   <th>Stock</th>
                                   <th>Gambar</th>
                                   <th>Aksi</th>
                               </tr>
                           </thead>
                           <tbody>
                               <?php
                               $sql = "select * from Barang";
                               $query = mysqli_query($koneksi, $sql);
                               $jml = mysqli_num_rows($query);
                               $no = 1;
                               while ($a = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                   <td><?php echo $no; ?></td>
                                   <td><?php echo $a['kode_barang']; ?></td>
                                   <td><?php echo $a['nama']; ?></td>
                                   <td><?php echo $a['satuan']; ?></td>
                                   <td>Rp. <?php echo number_format($a['harga_beli']); ?></td>

                                   <td>Rp. <?php echo number_format($a['harga_jual']); ?></td>
                                   <td>Rp. <?php echo number_format($a['profit']); ?></td>
                                   <td><?php echo $a['stok']; ?></td>
                                   <td><?php echo "<img src='images/barang/$a[gambar]' width=100 height=100>" ?></td>
                                   <td>
                                       <a href="ubah_barang.php?kode_barang=<?php echo $a['kode_barang']; ?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                       <a href="javascript:if(confirm('Apa Anda Yakin Ingin Mengahapus Barang Dengan Nama : <?php echo $a['nama']; ?> ?'))
                                        {document.location='hapus_barang.php?kode_barang=<?php echo $a['kode_barang']; ?>';}" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i></a>
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