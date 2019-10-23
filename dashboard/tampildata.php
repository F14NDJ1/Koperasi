<?php 
include '../../config/koneksi.php';
$a = mysqli_query($koneksi, "select id from pembelian order by id desc limit 1");
$b = mysqli_fetch_array($a);
?>
<link rel="stylesheet" href="../admin/bower_components/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../admin/bower_components/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="../admin/bower_components/Ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="../admin/dist/css/AdminLTE.min.css">
<link rel="stylesheet" href="../admin/dist/css/skins/_all-skins.min.css">
<link rel="stylesheet" href="../admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h4 align="center">BARANG</h4>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <!-- <th class="success">ID</th> -->
                                    <th class="success">Barang</th>
                                    <th class="success">Jumlah</th>
                                    <th class="success">Harga Satuan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $t = $b['id'];
                                $query = mysqli_query($koneksi, "select * from pembelian_detail where pembelian_id='$t'");
                                while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                <tr>
                                    <!-- <td><?php echo $data['id'] ?></td> -->
                                    <td><?php echo $data['barang'] ?></td>
                                    <td><?php echo $data['jumlah_item'] ?></td>
                                    <td><?php echo $data['harga_beli_satuan'] ?></td>
                                </tr>
                            </tbody>
                            <?php 
                        } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
$t = $b['id'];
$querys = mysqli_query($koneksi, "select SUM(harga_beli_satuan) as total from pembelian_detail where pembelian_id='$t'");
$dt = mysqli_fetch_array($querys);
?>
<hr />
<div class="container">
    <div class="row">
        <form action="" method="POST">
            <div class="col-md-3">
                <button type="submit" class="btn btn-success" title="Selesai"><i class="glyphicon glyphicon-ok-sign"></i></button>
            </div>
        </form>
    </div>
</div>
<script>
    function tukar() {
        var total = document.getElementById('total').value;
        var bayar = document.getElementById('bayar').value;
        var kembali = document.getElementById('kembali');
        if (!isNaN(bayar)) {
            kembali.value = parseFloat(bayar) - parseFloat(total);
        }
    }
</script> 
