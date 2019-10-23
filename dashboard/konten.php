<?php
error_reporting(0);
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    include "../../config/koneksi.php";
    include "home.php";
    $tgl = date("Y-m-d");
    $sql = $koneksi->query("select * from penjualan, barang where penjualan.kode_barang=barang.kode_barang and tanggal='$tgl'");

    while ($tampil = $sql->fetch_assoc()) {
        $profit = $tampil['profit'] * $tampil['jumlah'];
        $total_pj = $total_pj + $tampil['total'];
        $total_profit = $total_profit + $profit;
    }
    $sql2 = $koneksi->query("select * from barang");
    while ($tampil2 = $sql2->fetch_assoc()) {
        $jumlah_barang = $sql2->num_rows;
    }
?>
    <script type="text/javascript" src="../assets/chartjs/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/chartjs/Chart.min.js"></script>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <marquee>
            <h4><b>SELAMAT DATANG DISISTEM ADMIN BENGKEL SRIWIJAYA</b></h4>
        </marquee>
        <!-- Main content -->
        <section class="content">
            <div class="box box-info">
                <div class="box-body">
                    <div class="box-header">
                        <h4 style="text-align :center;">Kalkulasi Keuntungan Dari Penjualan</h4>
                    </div>
                    <div class="row">
                        <div class="clearfix visible-sm-block"></div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-blue"><i class="glyphicon glyphicon-tasks"></i></span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Data Barang</span>
                                        <span class="info-box-number"><?php echo $jumlah_barang . "&nbsp" . "Barang"; ?></span>
                                    </div>
                                </div>
                            </div>
                             <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-green"><i class="glyphicon glyphicon-shopping-cart"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Penjualan Hari Ini</span>
                                            <span class="info-box-number"><?php echo "Rp" . "&nbsp" . number_format($total_pj); ?></span>
                                        </div>
                                 </div>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="info-box">
                                    <span class="info-box-icon bg-yellow"><i class="glyphicon glyphicon-usd"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Keuntungan Hari Ini</span>
                                            <span class="info-box-number"><?php echo "Rp" . "&nbsp" . number_format($total_profit); ?></span>
                                        </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="box box-info">
                <div class="box-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel-default">
                                <div class="panel-heading"  style="text-align:center;">
                                    <span><b>Grafik Berdasarkan Barang Yang Terjual</b></span>
                                    <br/>
                                    <br/>
                                        <div id="chart-container">
                                            <canvas id="graphCanvas"></canvas>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
    $(document).ready(function () {
    showGraph();
    });


    function showGraph()
    {
    {
    $.post("queryjs.php",
    function (data)
    {
    console.log(data);
    var nama_barang = [];
    var jml = [];

    for (var i in data) {
    nama_barang.push(data[i].nama_barang);
    jml.push(data[i].jml);
    }
    var bgColor = [
    'rgba(255, 206, 86, 0.7)',
    'rgba(75, 192, 192, 0.7)',
    'rgba(153, 102, 255, 0.7)',
    'rgba(153, 45, 89, 0.7)',
    'rgba(19, 102, 13, 0.7)',
    'rgba(5, 237, 255, 0.7)',
    'rgba(8, 155, 255, 0.7)',
    'rgba(114, 114, 255, 0.7)',
    'rgba(155, 55, 1, 0.7)',
    'rgba(237, 34, 255, 0.7)',
    ]

    var chartdata = {
    labels: nama_barang,
    datasets: [
    {
    label: 'Exp',
    backgroundColor: bgColor,
    borderColor: '#46d5f1',
    hoverBackgroundColor: '#CCCCCC',
    hoverBorderColor: '#666666',
    data: jml
    }
    ]
    };

    var graphTarget = $("#graphCanvas");

    var barGraph = new Chart(graphTarget, {
    type: 'pie',
    data: chartdata
    });
    });
    }
    }   
</script>
<?php
include "footer.php";
} else {
echo "<script language='javascript'>
  alert('Nah siap looh, login dulu dong!');
  document.location='../index.php';
</script>";
}
?>