<?php 
include "../../config/koneksi.php";
include "home.php";
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "select * from suplier where id='$id' ");
$data = mysqli_fetch_array($sql);
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <small>Halaman Ubah Data Supplier</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Layout</a></li>
            <li class="active">Ubah Data Supplier</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php
        if (isset($_POST['ubah'])) {
            $kode = $_POST['kode'];
            $nama = $_POST['nama'];
            $telepon = $_POST['telepon'];
            $alamat = $_POST['alamat'];
            $email = $_POST['email'];
            $a = "update suplier set kode='$kode', nama='$nama', telepon='$telepon', alamat='$alamat', email='$email' where id='$id'";
            $b = mysqli_query($koneksi, $a);
            if ($b) {
                echo "<div class='alert alert-success alert-dismissable'>
    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
    Data Berhasil Diubah, <a href='data_suplier.php' class='alert-link'>Lihat Data</a>
    </div>";
            }
        }
        ?>
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Ubah Data Supplier</h3>&nbsp;
                    </div>
                    <div class="box-body">
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kode</label>
                                    <input type="text" name="kode" class="form-control" value="<?php echo $data['kode']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Telepon</label>
                                    <input type="text" name="telepon" class="form-control" value="<?php echo $data['telepon']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="" cols="30" rows="10"><?php echo $data['alamat']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
                                <a href="data_suplier.php" class="btn btn-danger"><i class="fa fa-arrow-left"> Back</i></a>
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