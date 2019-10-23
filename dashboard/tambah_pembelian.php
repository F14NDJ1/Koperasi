<?php 
 error_reporting(0);
 session_start();
  if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    include "../../config/koneksi.php";
    include "home.php";
?>
<link href="toastr/toastr.min.css" rel="stylesheet" type="text/css" />
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambah Data Pembelian Barang</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php
                    if (isset($_POST['simpan'])) {
                        $date = date("Y-m-d");
                        $no_faktur = $_POST['no_faktur'];
                        if (empty($no_faktur)) {
                            echo "<div class='alert alert-warning alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                Mohon isi semua data !
                </div>";
                        } else {
                            $sql = "insert into pembelian(id, no_faktur, tanggal)
                            values(NULL, '$no_faktur','$date')";
                            $query = mysqli_query($koneksi, $sql);
                            if ($query) {
                                echo "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    Data berhasil disimpan,  <a href='#' class='alert-link' onclick='tampil()'>Tambahkan Detail</a>
                    </div>";
                            } else {
                                echo "<div class='alert alert-warning alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    Data gagal disimpan!
                    </div>";
                            }
                        }
                    }
                    ?>
                    <form method="post" action="">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="no_faktur" class="form-control" placeholder="Input No Faktur">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" name="simpan" class="btn btn-primary" id="sim" title="Simpan Data">
                                <i class="glyphicon glyphicon-save" aria-hidden="true"></i></button>
                            <button type="reset" name="batal" class="btn btn-warning" id="bat" title="Batal Minyimpan Data">
                                <i class="glyphicon glyphicon-ban-circle" aria-hidden="true"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" hidden="true" id="detail">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Tambahkan Detail</h3>
                    </div>
                    <div class="box-body">
                        <form action="" method="post" class="form-detail">
                            <div id="brg">
                            <div class="form-group">
                                <?php 
                                $a = mysqli_query($koneksi, "select id from pembelian order by id desc limit 1");
                                $b = mysqli_fetch_array($a);
                                ?>
                                <div hidden>
                                    <input type="text" name="pembelian_id" readonly class="form-control" value="<?php echo $b['id'] ?>">
                                </div>
                            </div>
                                <div class="form-group">
                                    <input type="text" id="nama" class="form-control" name="barang" placeholder="Pilih Barang" readonly data-toggle="modal" data-target="#exampleModal">
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Cari Barang</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="box">
                                                        <div class="box-header">
                                                            <h3 class="box-title">Data Barang</h3>&nbsp;
                                                        </div>
                                                        <div class="box-body">
                                                            <div class="table-responsive">
                                                                <table id="test" class="table table-bordered table-striped">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>Kode</th>
                                                                            <th>Nama</th>
                                                                            <th>Pilih</th>
                                                                            <!-- <th>Aksi</th> -->
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
                                                                            <td>
                                                                                <button type="button" class="use-address" onclick="func()" data-dismiss="modal">pilih</button>
                                                                            </td>
                                                                        </tr>
                                                                        <?php $no++;
                                                                    } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select name="satuan" id="" class="form-control">
                                        <option name="" value="Dus">Dus</option>
                                        <option name="" value="Box">Box</option>
                                        <option name="" value="Pcs">Pcs</option>
                                        <option name="" value="Set">Set</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <input type="text" id="jmls" name="jumlah_satuan" class="form-control" placeholder="1 Dus, 1 Box, 1 Pcs, 1 Set">
                                </div>
                                <div class="form-group">
                                    <input type="number" id="jml" name="jumlah_item" class="form-control" placeholder="Jumlah Satuan Item">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="number" id="hg" name="harga_beli_satuan" class="form-control" placeholder="Harga Beli Satuan">
                            </div>
                            <div class="form-group">
                            <div class="controls">
                                <select id="selectError3" name='suplier_id' class="form-control">
                                    <?php
                                    $a = mysqli_query($koneksi, "select * from suplier");
                                    while ($b = mysqli_fetch_array($a)) {
                                        echo "<option value='$b[id]'>$b[nama]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                            <br>
                            <div class="box-footer">
                                <div id="info">
                                <a class="btn btn-primary btn-block" id="tombol-simpan" title="Tambah Transkasi"> <i class="fa fa-plus" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tampildata" id="list"></div>
            </div>
        </div>
    </section>
</div>

</div>
<!-- /.content-wrapper -->
<script type="text/javascript">
    function tampil() {
        document.getElementById("detail").hidden = false;
        document.getElementById("sim").disabled = true;
        document.getElementById("bat").disabled = true;
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="toastr/toastr.min.js"></script>
<?php 
include "footer.php";
include "javascript_pembelian.php";
} else {
    echo "<script language='javascript'>
  alert('Nah siap looh, login dulu dong!');
  document.location='../index.php';
  </script>";
}
