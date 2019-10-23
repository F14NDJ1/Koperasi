<?php 
include "../../config/koneksi.php";
include "home.php";
$kode_jasa = $_GET['kode_jasa'];
$sql = mysqli_query($koneksi, "select * from jasa where kode_jasa='$kode_jasa' ");
$data = mysqli_fetch_array($sql);
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <small>Halaman Ubah Data Jasa</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Layout</a></li>
            <li class="active">Ubah Data Jasa</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php
        if (isset($_POST['ubah'])) {
            $nama = $_POST['nama_jasa'];
            $tarif = $_POST['tarif'];
            $a = "update jasa set nama_jasa='$nama', tarif='$tarif' where kode_jasa='$kode_jasa'";
            $b = mysqli_query($koneksi, $a);
            if ($b) {
                echo "<div class='alert alert-success alert-dismissable'>
    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
    Data Berhasil Diubah, <a href='data_jasa.php' class='alert-link'>Lihat Data</a>
    </div>";
            }
        }
        ?>
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Ubah Data Jasa</h3>&nbsp;
                    </div>
                    <div class="box-body">
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kode</label>
                                    <input type="text" name="kode_jasa" class="form-control" value="<?php echo $data['kode_jasa']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama</label>
                                    <input type="text" name="nama_jasa" class="form-control" value="<?php echo $data['nama_jasa']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tarif</label>
                                    <input type="number" name="tarif" class="form-control" value="<?php echo $data['tarif']; ?>">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
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
?> 