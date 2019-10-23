<?php 
include "../../config/koneksi.php";
include "home.php";
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "select * from member where id='$id' ");
$data = mysqli_fetch_array($sql);
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <small>Halaman Ubah Data Member</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Layout</a></li>
            <li class="active">Ubah Data Member</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php
        if (isset($_POST['ubah'])) {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $mobile = $_POST['mobile'];
            $jk = $_POST['jk'];
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $a = "update member set nama='$nama', alamat='$alamat', mobile='$mobile',  jk='$jk', email='$email', password='$password' where id='$id'";
            $b = mysqli_query($koneksi, $a);
            if ($b) {
                echo "<div class='alert alert-success alert-dismissable'>
    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
    Data Berhasil Diubah, <a href='data_member.php' class='alert-link'>Lihat Data</a>
    </div>";
            }
        }
        ?>
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Ubah Data Member</h3>&nbsp;
                    </div>
                    <div class="box-body">
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="" cols="30" rows="10"><?php echo $data['alamat']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mobile</label>
                                    <input type="text" name="mobile" class="form-control" value="<?php echo $data['mobile']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="jk" value="Laki-Laki" <?php
                                                                                            if ($data['jk'] == "Laki-Laki") {
                                                                                                echo "checked";
                                                                                            } ?>>
                                            Laki-Laki &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            <input type="radio" name="jk" value="Perempuan" <?php
                                                                                            if ($data['jk'] == "Perempuan") {
                                                                                                echo "checked";
                                                                                            } ?>>
                                            Perempuan
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" name="password" class="form-control" value="<?php echo $data['password']; ?>">
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
                                <a href="data_member.php" class="btn btn-danger"><i class="fa fa-arrow-left"> Back</i></a>
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