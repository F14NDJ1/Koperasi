<?php
include "../../config/koneksi.php";
$sql = "select * from web";
$query = mysqli_query($koneksi, $sql);
$jml = mysqli_num_rows($query);
$a = mysqli_fetch_array($query);
?>
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../admin/dashboard/images/admin.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Admin</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header" align="center">MAIN NAVIGATION</li>
            <li>
                <a href="konten.php"><i class="glyphicon glyphicon-home"></i> <span>Home</span></a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bank"></i>
                    <span>Data Master</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="data_web.php"><i class="fa fa-book"></i> Data Web </a></li>
                    <li><a href="data_barang.php"><i class="fa fa-book"></i> Data Barang</a></li>
                    <li><a href="data_suplier.php"><i class="fa fa-book"></i> Data Supplier</a></li>
                    <li><a href="data_member.php"><i class="fa fa-book"></i> Data Member</a></li>
                    <li><a href="data_mekanik.php"><i class="fa fa-book"></i> Data Mekanik</a></li>
                    <li><a href="data_jasa.php"><i class="fa fa-book"></i> Data Jasa</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-plus"></i>
                    <span>Pembelian</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="tampil_pembelian.php"><i class="fa fa-book"></i>Tampil Data Pembelian</a></li>
                    <li><a href="tambah_pembelian.php"><i class="fa fa-book"></i>Tambah Data Pembelian</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Transaksi</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                <li><a href="data_service.php"><i class="fa fa-book"></i> Data Service</a></li>
                    <li><a href="data_penjualan.php"><i class="fa fa-book"></i> Data Penjualan</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-file"></i>
                    <span>Laporan</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="laporan.php"><i class="fa fa-book"></i> Laporan</a></li>
                </ul>
            </li>
        </ul>

    </section>
</aside>
<?php 
?> 