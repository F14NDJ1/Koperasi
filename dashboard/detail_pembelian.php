<?php
include "../../config/koneksi.php";
include "home.php";
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "select * from pembelian_detail where service_id='$id' ");
$data = mysqli_fetch_array($sql);
?>

<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
            <?php
                $sql1 = mysqli_query($koneksi, "select * from pembelian where id='$id' ");
                $data1 = mysqli_fetch_array($sql1);
                $sql3 = mysqli_query($koneksi, "select * from pembelian_detail");
                $data2 = mysqli_fetch_array($sql3);
                $sql2 = $koneksi->query("select * from suplier where id='$data2[suplier_id]'");
                $result = $sql2->fetch_assoc();
            ?>
                <h4 style="text-align:center;">Detail Data Pembelian</h4>
                <div class="row">
                    <div class="col-md-6">
                        <th><b>No Faktur &nbsp;:&nbsp;&nbsp; <?php echo $data1['no_faktur']; ?></b></th><br />
                        <th><b>Tanggal &nbsp;:&nbsp;&nbsp; <?php echo $data1['tanggal']; ?></b></th><br />
                        <th><b>Nama Suplier &nbsp;:&nbsp;&nbsp; <?php echo $result['nama']; ?></b></th><br/>
                        <hr/>
                    </div>
                    <div class="info">
                        <div class="col-md-6" align="right">
                            <th><b>Total Bayar &nbsp;:&nbsp;&nbsp; <?php echo "Rp. " . number_format($data1['total']); ?></b></th><br/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="info">No</th>
                            <th class="info">Satuan</th>
                            <th class="info">Jumlah Satuan</th>
                            <th class="info">Harga Beli Satuan</th>
                            <th class="info">Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $sql = $koneksi->query("select * from pembelian, pembelian_detail 
                                            where pembelian.id=pembelian_detail.pembelian_id
                                            AND pembelian_id='$id'");
                    $no = 1;
                    while ($tampil1 = $sql->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $tampil1['satuan']; ?></td>
                            <td><?php echo $tampil1['jumlah_satuan']; ?></td>
                            <td><?php echo number_format($tampil1['harga_beli_satuan']); ?></td>
                            <td><?php echo $tampil1['barang']; ?></td>
                        </tr>
                            
                            <?php 
                            $no++;
                        } ?>
                        </tbody>
                </table>
                <hr/>
                <br/>
                <a href="tampil_pembelian.php" class="pull-right btn btn-info"><i class="glyphicon glyphicon-arrow-left"></i></a>
            </div>
        </div>
    </section>
</div>

<?php
include "footer.php";
?>