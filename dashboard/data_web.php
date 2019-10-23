<?php 
include "../../config/koneksi.php";
include "home.php";
$sql = mysqli_query($koneksi, "select * from web limit 1");
$data = mysqli_fetch_array($sql);
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <small>Halaman Data Web</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Layout</a></li>
            <li class="active"> Data Web</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <?php
        if (isset($_POST['ubah'])) {
            $nama = $_POST['nama'];
            $sub_nama = $_POST['sub_nama'];
            $alamat = $_POST['alamat'];
            $email = $_POST['email'];
            $telepon = $_POST['telepon'];
            $mobile = $_POST['mobile'];
            $deskripsi = $_POST['deskripsi'];
            //uploadf_foto
            $gambar = $_FILES['gambar']['name'];
            if (strlen($gambar) > 0) {
                if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
                    move_uploaded_file($_FILES['gambar']['tmp_name'], "logo/" . $gambar);
                }
                mysqli_query($koneksi, "update web set gambar='$gambar' where id='$id' ");
            }
            //uploadf_logo
            $logo = $_FILES['logo']['name'];
            if (strlen($logo) > 0) {
                if (is_uploaded_file($_FILES['logo']['tmp_name'])) {
                    move_uploaded_file($_FILES['logo']['tmp_name'], "logo/" . $logo);
                }
                mysqli_query($koneksi, "update web set logo='$logo' where id='$id' ");
            }
            if ($gambar !="" or $logo != "") {
                $a = "update web set nama='$nama', sub_nama='$sub_nama', alamat='$alamat', email='$email', telepon='$telepon', mobile='$mobile', deskripsi='$deskripsi', gambar='$gambar', logo='$logo' where id='$data[id]'";
            }else{
                $a = "update web set nama='$nama', sub_nama='$sub_nama', alamat='$alamat', email='$email', telepon='$telepon', mobile='$mobile', deskripsi='$deskripsi' where id='$data[id]'";
            }
            $b = mysqli_query($koneksi, $a);
        }
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Web</h3>&nbsp;
                        
                    </div>
                    <div class="box-body">
                        <form role="form" action="" method="POST" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Judul Web</label>
                                    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sub Nama</label>
                                    <input type="text" name="sub_nama" class="form-control" value="<?php echo $data['sub_nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Alamat</label>
                                    <textarea class="form-control" name="alamat" id="" cols="30" rows="10"><?php echo $data['alamat']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Telepon</label>
                                    <input type="text" name="telepon" class="form-control" value="<?php echo $data['telepon']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mobile</label>
                                    <input type="text" name="mobile" class="form-control" value="<?php echo $data['mobile']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Deskripsi</label>
                                    <textarea class="form-control" name="deskripsi" id="" cols="30" rows="10"><?php echo $data['deskripsi']; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <img src="logo/<?php echo $data['gambar']; ?>" width="300" height="280">
                                    <label for="exampleInputFile">Upload Gambar</label>
                                    <input type="file" name="gambar">
                                    <p class="help-block">Upload Gambar Barang.</p>
                                </div>
                                <div class="form-group">
                                    <img src="logo/<?php echo $data['logo']; ?>" width="300" height="280">
                                    <label for="exampleInputFile">Upload Logo</label>
                                    <input type="file" name="logo">
                                    <p class="help-block">Upload Logo Barang.</p>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" name="ubah" class="btn btn-primary">Simpan</button>
                                <INPUT TYPE="button" onClick="history.go(0)" VALUE="Refresh Page" class="btn btn-info">
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