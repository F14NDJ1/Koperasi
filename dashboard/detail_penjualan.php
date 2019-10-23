<?php
include "../../config/koneksi.php";
include "home.php";
$id = $_GET['kode_penjualan'];
$sql = mysqli_query($koneksi, "select * from penjualan where kode_penjualan='$id' ");
$data = mysqli_fetch_array($sql);
?>

<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
            <?php
                $sql1 = mysqli_query($koneksi, "select * from penjualan where kode_penjualan='$id' ");
                $data1 = mysqli_fetch_array($sql1);
                $sql2 = $koneksi->query("select * from penjualan_detail where kode_penjualan='$data1[kode_penjualan]'");
                $result = $sql2->fetch_assoc();
            ?>
                <h4 style="text-align:center;">Detail Data Penjualan</h4>
                <div class="row">
                    <div class="col-md-6">
                        <th><b>Kode Penjualan &nbsp;:&nbsp;&nbsp; <?php echo $data1['kode_penjualan']; ?></b></th><br />
                        <th><b>Tanggal &nbsp;:&nbsp;&nbsp; <?php echo $data1['tanggal']; ?></b></th><br />
                        <hr/>
                    </div>
                    <div class="info">
                        <div class="col-md-6" style="text-align:right;">
                            <th><b>Total Bayar &nbsp;:&nbsp;&nbsp; <?php echo "Rp. " . number_format($result['total_b']); ?></b></th><br/>
                            <th><b>Jumlah Diskon &nbsp;:&nbsp;&nbsp; <?php echo $result['diskon'] . '%' ; ?></b></th><br/>
                            <th><b>Jumlah Potongan &nbsp;:&nbsp;&nbsp; <?php echo "Rp. " . number_format($result['potongan']); ?></b></th><br/>
                            <th><b>Jumlah Bayar &nbsp;:&nbsp;&nbsp; <?php echo "Rp. " . number_format($result['bayar']); ?></b></th><br/>
                            <th><b>Jumlah Kembali &nbsp;:&nbsp;&nbsp; <?php echo "Rp. " . number_format($result['kembali']); ?></b></th><br/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <br/>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="info">No</th>
                            <th class="info">Barang</th>
                            <th class="info">Jumlah</th>
                            <th class="info">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $sql = $koneksi->query("select * from penjualan, penjualan_detail ,barang where
                                            penjualan.kode_penjualan=penjualan_detail.kode_penjualan
                                            AND penjualan.kode_barang=barang.kode_barang
                                            AND penjualan.kode_penjualan='$id'");
                    $no = 1;
                    while ($tampil1 = $sql->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $tampil1['nama']; ?></td>
                            <td><?php echo number_format($tampil1['harga_jual']) . ',-' . '&nbsp' . '&nbsp' . 'X' . '&nbsp' . '&nbsp' . $tampil1['jumlah'] . '&nbsp;' . '&nbsp;' .
                                '&nbsp;' . '&nbsp;' . '&nbsp;' . '&nbsp;' ?></td>
                            <td><?php echo "Rp. " . number_format($tampil1['total']); ?></td>
                        </tr>
                            
                            <?php 
                            $no++;
                        } ?>
                        </tbody>
                </table>
                <br/>
                <a href="data_penjualan.php" class="pull-right btn btn-info"><i class="glyphicon glyphicon-arrow-left"></i></a>
            </div>
        </div>
    </section>
</div>

<?php
include "footer.php";
?>