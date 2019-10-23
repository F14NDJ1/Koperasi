<BODY onLoad="javascript:window.print()">
    <?php
    include "../../config/koneksi.php";
    $m = mysqli_query($koneksi, "select * from penjualan where month(tanggal)='$_POST[bulan]' and year(tanggal)='$_POST[tahun]' order by kode_penjualan asc;");
    $n = mysqli_fetch_array($m);

    ?>
    <h2 align='center'>BENGKEL SRIWIJAYA, MATARAM, NTB</h2>
    <h2 align='center'>JL Sriwijaya No.80, Mataram </h2>
    Tanggal : <?php echo $n['tanggal']; ?>
    <table border='1' cellpadding='1' cellspacing='0' align='center' width='100%' style="font-size: 12px;">
        <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Total Bayar</th>
        </tr>
        <?php
        $qr = mysqli_query($koneksi, "select distinct(nama_barang) as nama from v_penjualan where month(tanggal)='$_POST[bulan]' and year(tanggal)='$_POST[tahun]'");
        $no = 1;
        while ($hs = mysqli_fetch_array($qr)) {
            $xc = mysqli_query($koneksi, "select SUM(jumlah) as jumlah, SUM(total) as total from v_penjualan where month(tanggal)='$_POST[bulan]' and year(tanggal)='$_POST[tahun]' and nama_barang='$hs[nama]';");
            $hs2 = mysqli_fetch_array($xc);
            ?>
            <tr class="odd gradeC">
                <td class="center"><?php echo $no; ?></td>
                <td class="center"><?php echo $hs['nama']; ?></td>
                <td class="center"><?php echo $hs2['jumlah']; ?></td>
                <td class="center">Rp.<?php echo number_format($hs2['total']); ?></td>
            </tr>
            <?php $no++;
        } ?>

    </table>
    <br /><br /><br /><br />
    <table border='0' cellpadding='1' cellspacing='0' align='center' width='100%'>
        <tr>
            <td width="30%" align="center">Mataram , <?php echo date("d M Y") ?></td>
            <td width="40%"></td>
            <td width="30%" align="center">Kepala Service Bengkel Sriwijaya</td>
        </tr>
        <tr>
            <td width="30%"><br /></td>
            <td width="40%"></td>
            <td width="30%" align="center">Mataram</td>
        </tr>
        <tr>
            <td><br /></td>
        </tr>
        <tr>
            <td><br /></td>
        </tr>
        <tr>
            <td><br /></td>
        </tr>
        <tr>
            <td width="30%" align="center"> Staf </td>
            <td width="40%"></td>
            <td width="30%" align="center">(Hermianto Agus Saputra)</td>
        </tr>
    </table>