 <?php
    include "../../config/koneksi.php";
    include "home.php";
    $kode_barang = $_GET['kode_barang'];
    $sql = mysqli_query($koneksi, "select * from barang where kode_barang='$kode_barang' ");
    $data = mysqli_fetch_array($sql);
    ?>
 <div class="content-wrapper">
     <section class="content-header">
         <h1>
             <small>Halaman Ubah Data Barang</small>
         </h1>
         <ol class="breadcrumb">
             <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
             <li><a href="#">Layout</a></li>
             <li class="active">Ubah Data Pegawai</li>
         </ol>
     </section>
     <!-- Main content -->
     <section class="content">
         <?php
            if (isset($_POST['ubah'])) {
                $kode_barang = $_POST['kode_barang'];
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
                    mysqli_query($koneksi, "update barang set gambar='$gambar' where kode_barang='$kode_barang' ");
                }
                $b = "";
                if ($gambar == "") {
                    $a = "update barang set kode_barang='$kode_barang', nama='$nama', satuan='$satuan', harga_beli='$harga_beli', profit='$profit', harga_jual='$harga_jual', stok='$stok' where kode_barang='$kode_barang'";
                    $b = mysqli_query($koneksi, $a);
                } else {
                    $a = "update barang set kode_barang='$kode_barang', nama='$nama', satuan='$satuan', harga_beli='$harga_beli', profit='$profit', harga_jual='$harga_jual', stok='$stok', gambar='$gambar' where kode_barang='$kode_barang'";
                    $b = mysqli_query($koneksi, $a);
                }
                if ($b) {
                    echo "<div class='alert alert-success alert-dismissable'>
    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
    Data Berhasil Diubah, <a href='data_barang.php' class='alert-link'>Lihat Data</a>
    </div>";
                }
            }
            ?>
         <div class="row">
             <div class="col-md-8">
                 <div class="box">
                     <div class="box-header">
                         <h3 class="box-title">Ubah Data Barang</h3>&nbsp;
                     </div>
                     <div class="box-body">
                         <form role="form" action="" method="POST" enctype="multipart/form-data">
                             <div class="box-body">
                                 <div class="form-group">
                                     <label for="exampleInputEmail1">Kode</label>
                                     <input type="text" name="kode_barang" class="form-control" value="<?php echo $data['kode_barang']; ?>" readonly>
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">Nama</label>
                                     <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>">
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">Satuan</label>
                                     <input type="text" name="satuan" class="form-control" value="<?php echo $data['satuan']; ?>">
                                 </div>
                                 <div class="form-group">
                                     <label>Harga Beli</label>
                                     <div class="input-group">
                                         <span class="input-group-addon" id="basic-addon2">Rp.</span>
                                         <input type="text" class="form-control" name="harga_beli" id="harga_beli" onkeyup="sum()" placeholder="Input Harga Beli" value="<?php echo $data['harga_beli']; ?>">
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label>Harga Jual</label>
                                     <div class="input-group">
                                         <span class="input-group-addon" id="basic-addon2">Rp.</span>
                                         <input type="text" class="form-control" name="harga_jual" id="harga_jual" onkeyup="sum()" placeholder="Input Harga Jual" value="<?php echo $data['harga_jual']; ?>">
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label>Profit</label>
                                     <div class="input-group">
                                         <span class="input-group-addon" id="basic-addon2">Rp.</span>
                                         <input type="number" name="profit" class="form-control" style="background-color : #e7e3e9" id="profit" placeholder="Input Profit" value="<?php echo $data['profit']; ?>" readonly>
                                     </div>
                                 </div>
                                 <div class="form-group">
                                     <label for="exampleInputPassword1">Stock</label>
                                     <input type="text" name="stok" class="form-control" value="<?php echo $data['stok']; ?>">
                                 </div>
                                 <div class="form-group">
                                     <img src="images/barang/<?php echo $data['gambar']; ?>" width="100" height="130">
                                     <label for="exampleInputFile">Upload Gambar</label>
                                     <input type="file" name="gambar">
                                     <p class="help-block">Upload Gambar Barang.</p>
                                 </div>
                             </div>
                             <div class="box-footer">
                                 <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
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
    ?>