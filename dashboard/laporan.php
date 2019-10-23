<?php
 error_reporting(0);
 session_start();
  if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    include "../../config/koneksi.php";
    include "home.php";
?>
 <div class="content-wrapper">
	<section class="content">
	<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pilih Laporan
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Service
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" method="POST" action="laporan_service.php" target=blank enctype="multipart/form-data">
                                        <label class="control-label" for="typeahead">Bulan</label>
                                        <div class="form-actions">
                                            <div class="controls">
                                                <select id="selectError3"  name='bulan' class="form-control">
                                                    <?php
                                                    $a = mysqli_query($koneksi, "select distinct(month(tanggal)) as bln from service order by bln asc");
                                                    while ($b = mysqli_fetch_array($a)) {
                                                        echo "<option value='$b[bln]'>$b[bln]</option>7";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="typeahead">Tahun </label>
                                            <div class="controls">
                                                <select id="selectError3" name='tahun' class="form-control">
                                                    <?php
                                                    $a = mysqli_query($koneksi, "select distinct(year(tanggal)) as thn from service order by thn asc");
                                                    while ($b = mysqli_fetch_array($a)) {
                                                        echo "<option value='$b[thn]'>$b[thn]</option>7";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <button type="submit" target=blank class="btn btn-primary sm" name="cetak2">Cetak</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    Penjualan
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" method="POST" action="laporan_penjualan.php" target=blank enctype="multipart/form-data">
                                        <label class="control-label" for="typeahead">Bulan</label>
                                        <div class="form-actions">
                                            <div class="controls">
                                                <select id="selectError3"  name='bulan' class="form-control">
                                                    <?php
                                                    $a = mysqli_query($koneksi, "select distinct(month(tanggal)) as bln from penjualan order by bln asc");
                                                    while ($b = mysqli_fetch_array($a)) {
                                                        echo "<option value='$b[bln]'>$b[bln]</option>7";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="typeahead">Tahun </label>
                                            <div class="controls">
                                                <select id="selectError3" name='tahun' class="form-control">
                                                    <?php
                                                    $a = mysqli_query($koneksi, "select distinct(year(tanggal)) as thn from penjualan order by thn asc");
                                                    while ($b = mysqli_fetch_array($a)) {
                                                        echo "<option value='$b[thn]'>$b[thn]</option>7";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <button type="submit" target=blank class="btn btn-success sm" name="cetak2">Cetak</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    Pembelian
                                </div>
                                <div class="panel-body">
                                    <form class="form-horizontal" method="POST" action="laporan_pembelian.php" target=blank enctype="multipart/form-data">
                                        <label class="control-label" for="typeahead">Bulan</label>
                                        <div class="form-actions">
                                            <div class="controls">
                                                <select id="selectError3"  name='bulan' class="form-control">
                                                    <?php
                                                    $a = mysqli_query($koneksi, "select distinct(month(tanggal)) as bln from pembelian order by bln asc");
                                                    while ($b = mysqli_fetch_array($a)) {
                                                        echo "<option value='$b[bln]'>$b[bln]</option>7";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="typeahead">Tahun </label>
                                            <div class="controls">
                                                <select id="selectError3" name='tahun' class="form-control">
                                                    <?php
                                                    $a = mysqli_query($koneksi, "select distinct(year(tanggal)) as thn from pembelian order by thn asc");
                                                    while ($b = mysqli_fetch_array($a)) {
                                                        echo "<option value='$b[thn]'>$b[thn]</option>7";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
										<br/>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <button type="submit" target=blank class="btn btn-warning sm" name="cetak2">Cetak</button>
                                    </div>
                                </form>
                            </div>
                        </div> -->
                        
                    </div>
                </div>

            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
	</section>
 </div>
 <?php 
  include "footer.php";
} else {
  echo "<script language='javascript'>
  alert('Nah siap looh, login dulu dong!');
  document.location='../index.php';
  </script>";
}
?> 