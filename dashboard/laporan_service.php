<BODY onLoad="javascript:window.print()">
    <?php
    include "../../config/koneksi.php";
    $m = mysqli_query($koneksi, "select * from service where month(tanggal)='$_POST[bulan]' and year(tanggal)='$_POST[tahun]' order by id asc;");
    $n = mysqli_fetch_array($m);

    ?>
    <h2 align='center'>BENGKEL SRIWIJAYA, MATARAM, NTB</h2>
    <h2 align='center'>JL Sriwijaya No.80, Mataram </h2>
    Tanggal : <?php echo $n['tanggal'];?>
    <table border='1' cellpadding='1' cellspacing='0' align='center' width='100%' style="font-size: 12px;">
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Barang</th>
            <th>Jasa</th>
            <th>Tanggal</th>
            <th>Kendaraan</th>
            <th>No Polisi</th>
            <th>Pemilik</th>
            <th>Total</th>
            <th>Status</th>

            
        </tr>
        <?php
        $tampil = "select * from v_laporanservice where month(tanggal)='$_POST[bulan]' and year(tanggal)='$_POST[tahun]' and status='selesai' order by id asc;";
        $query = mysqli_query($koneksi, $tampil);
        $no = 1;
        while ($a = mysqli_fetch_array($query)) {
            ?>
            <tr class="odd gradeC">
                <td class="center"><?php echo $no; ?></td>
                <td class="center"><?php echo $a['id']; ?></td>
                <td class="center"><?php echo $a['barang']; ?></td>
                <td class="center"><?php echo $a['jasa']; ?></td>
                <td class="center"><?php echo $a['tanggal']; ?></td>                             
                <td class="center"><?php echo $a['kendaraan']; ?></td>                             
                <td class="center"><?php echo $a['nopol']; ?></td>                              
                <td class="center"><?php echo $a['pemilik']; ?></td>                             
                <td class="center"><?php echo $a['total']; ?></td>                             
                <td class="center"><?php echo $a['status']; ?></td>                             
            </tr>
            <?php $no++;
        } ?>
        
    </table>
    <br/><br/><br/><br/>
    <table border='0' cellpadding='1' cellspacing='0' align='center' width='100%'>
        <tr>
            <td width="30%" align="center">Mataram , <?php echo date("d M Y") ?></td>
            <td width="40%"></td>
            <td width="30%" align="center">Kepala Service Bengkel Sriwijaya</td>
        </tr>
        <tr>
            <td width="30%"><br/></td>
            <td width="40%"></td>
            <td width="30%" align="center">Mataram</td>
        </tr>
        <tr>
            <td><br/></td>
        </tr>
        <tr>
            <td><br/></td>
        </tr>
        <tr>
            <td><br/></td>
        </tr>
        <tr>
            <td width="30%" align="center"> Staf </td>
            <td width="40%"></td>
            <td width="30%" align="center">(Hermianto Agus Saputra)</td>
        </tr>
    </table>

