<script type="text/javascript">
$(function () {
    $('#info').click(function () {
        toastr.info("Info Message", "Data Berhasil Ditambahkan");
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#tombol-simpan").click(function() {
            var data = $('.form-detail').serialize();
            $.ajax({
                type: 'POST',
                url: "aksi.php",
                data: data,
                success: function() {
                    $('.tampildata').load("tampildata.php");
                    $('#jmls').val("");
                    $('#jml').val("");
                    $('#hg').val("");
                }
            });
        });
    });
</script>
<script type="text/javascript">

    function tambah_barang() {
        document.getElementById('brg').hidden = false;
    }
    function tambah_jasa() {
        document.getElementById('brg').hidden = true;
    }
</script>
<script type="text/javascript">
    $('#test').DataTable({
        "lengthMenu": [
            [1, -1],
            [1, ]
        ]
    });
    $('#test1').DataTable({
        "lengthMenu": [
            [1, -1],
            [1, ]
        ]
    });
</script>
<script>
    function func() {
        var br = $(".use-address").closest("tr").find('td:eq(2)').text();
        var hr = $(".use-address").closest("tr").find('td:eq(3)').text();
        document.getElementById('nama').value = br;
    }
    function func1() {
        var js = $(".use-address1").closest("tr").find('td:eq(2)').text();
        var tr = $(".use-address1").closest("tr").find('td:eq(3)').text();
        document.getElementById('nama1').value = js;
    }
</script> 