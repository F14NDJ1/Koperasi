<?php
include "../../config/koneksi.php";
include "home.php";
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "select * from detail_service where service_id='$id' ");
$data = mysqli_fetch_array($sql);
?>

<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
            <?php
                $sql1 = mysqli_query($koneksi, "select * from service where id='$id' ");
                $data1 = mysqli_fetch_array($sql1);
                $sql2 = $koneksi->query("select * from mekanik where id='$data1[mekanik_id]'");
                $result = $sql2->fetch_assoc();
            ?>
                <h4 style="text-align:center;">Detail Data Service</h4>
                <div class="row">
                    <div class="col-md-6">
                        <th><b>Tanggal &nbsp;:&nbsp;&nbsp; <?php echo $data1['tanggal']; ?></b></th><br />
                        <th><b>Nama Mekanik &nbsp;:&nbsp;&nbsp; <?php echo $result['nama']; ?></b></th><br/>
                        <th><b>Status &nbsp;:&nbsp;&nbsp; <?php echo $data1['status']; ?></b></th><br/>
                        <hr/>
                    </div>
                    <div class="info">
                        <div class="col-md-6" align="right">
                            <th><b>Total Bayar &nbsp;:&nbsp;&nbsp; <?php echo "Rp. " . number_format($data1['total']); ?></b></th><br/>
                            <th><b>Jumlah Bayar &nbsp;:&nbsp;&nbsp; <?php echo "Rp. " . number_format($data1['bayar']); ?></b></th><br/>
                            <th><b>Jumlah Kembali &nbsp;:&nbsp;&nbsp; <?php echo "Rp. " . number_format($data1['kembali']); ?></b></th><br/>
                            <hr/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row" align="center">
                    <div class="col-md-4">
                        <th>No Polisi : <?php echo $data1['nopol']; ?></th><br />
                        <th>Pemilik : <?php echo $data1['pemilik']; ?></th>
                    </div>
                    <div class="col-md-4">
                        <th>No Telp/Hp : <?php echo $data1['no_telp']; ?></th><br />
                        <th>Tipe / Warna / Thn : <?php echo $data1['kendaraan']; ?></th>
                    </div>
                    <div class="col-md-4">
                        <th>KM : <?php echo $data1['km']; ?></th><br />
                        <th>KM.Next : <?php echo $data1['km_next']; ?></th>
                    </div>
                </div>
                <br/>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="info">No</th>
                            <th class="info">Nama Jasa</th>
                            <th class="info">Tarif</th>
                            <th class="info">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    $sql = $koneksi->query("select * from service, service_detail 
                                            where service.id=service_detail.service_id
                                            AND service_id='$id' AND barang=''");
                    $no = 1;
                    while ($tampil1 = $sql->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $tampil1['jasa']; ?></td>
                            <td><?php echo "Rp. " . number_format($tampil1['sub_total']); ?></td>
                            <td><?php echo "Rp. " . number_format($tampil1['sub_total']); ?></td>
                        </tr>
                            
                            <?php 
                            $no++;
                        } ?>
                        </tbody>
                </table>
                <hr/>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="info">No</th>
                            <th class="info">Nama Part</th>
                            <th class="info">Qty</th>
                            <th class="info">Harga</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $sql1 = $koneksi->query("select * from service, service_detail 
                                                where service.id=service_detail.service_id
                                                AND service_id='$id' AND jasa=''");
                        $no = 1;
                        while ($tampil2 = $sql1->fetch_assoc()) {
                            ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $tampil2['barang']; ?></td>
                            <td><?php echo $tampil2['jumlah']; ?></td>
                            <td><?php echo "Rp. " . number_format($tampil2['sub_total']); ?></td>
                        </tr>
                        <?php 
                        $no++;
                    } ?>
                    </tbody>
                </table>
                <br/>
                <a href="data_service.php" class="pull-right btn btn-info"><i class="glyphicon glyphicon-arrow-left"></i></a>
            </div>
        </div>
    </section>
</div>

<?php
include "footer.php";
?>