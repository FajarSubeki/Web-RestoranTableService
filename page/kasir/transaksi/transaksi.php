<?php
$tr         = new Resto();
$autokode   = $tr->autokode("tb_transaksi", "kd_transaksi", "TA");
$dataOrder  = $tr->selectOrderDate("tb_order", "status_order", "belum_bayar", "tanggal");
$kd_order   = @$_GET["kd"];
$dataDetail = $tr->selectWhere("detail_order", "order_kd", $kd_order);
//Sum total
$sql   = "SELECT SUM(sub_total) as sub FROM tb_detail_order WHERE order_kd = '$kd_order'";
$exec  = mysqli_query($con, $sql);
$assoc = mysqli_fetch_assoc($exec);
if (isset($_POST['getSimpan'])) {
$kd_transaksi = $_POST['kode_transaksi'];
$kd_user      = $dataDetail['user_kd'];
$total        = $_POST['total_harga'];
$bayar        = $_POST['bayar'];
$kembalian    = $_POST['kembalian'];
if ($total == "" || $kembalian == "") {
$response = ['response' => 'negative', 'alert' => 'Bayar Dahulu'];
} else {
if ($bayar < $total) {
$response = ['response' => 'negative', 'alert' => 'Uang kurang'];
} else {
$date     = date("Y-m-d");
$value    = "'$kd_transaksi', '$kd_order', '$kd_user', '$total', '$date', null";
$response = $tr->insert("tb_transaksi", $value, "?page=struk_transaksi&kd=$autokode");
$valueUp  = "status_order='selesai_pembayaran'";
$response = $tr->update("tb_order", $valueUp, "kd_order", $kd_order, "?page=struk_transaksi&kd=$autokode");
$valueKd  = "transaksi_kd='$kd_transaksi'";
$response = $tr->update('tb_detail_order', $valueKd, "order_kd", $kd_order, "?page=struk_transaksi&kd=$autokode");
$response = $tr->update('tb_detail_order', $valueKd, "order_kd", $kd_order, "?page=struk_transaksi&kd=$autokode");

$status_meja = "non-active";
$valueMeja   = "user_kd='', status='$status_meja'";
$response    = $tr->update("tb_meja", $valueMeja, "no_meja", $_GET['kd_meja'], "?page=struk_transaksi&kd=$autokode");
}
}
}
?>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            <h3>Pilih Orderan</h3>
                        </div>
                        <form action="" method="post">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered" id="example">
                                        <thead>
                                            <tr>
                                                <td>Kode Order</td>
                                                <td>No Meja</td>
                                                <td>Nama</td>
                                                <td>Tanggal</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($dataOrder as $data) {?>
                                            <tr>
                                                <td><a href="?page=indexTransaksi&getItem&kd=<?=$data['kd_order']?>&kd_meja=<?= $data['no_meja'] ?>"><?=$data['kd_order']?></a></td>
                                                <td><?=$data['no_meja']?></td>
                                                <td><?=$data['nama_user']?></td>
                                                <td><?=$data['tanggal']?></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h3>Transaksi Pembayaran</h3>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Kode Transaksi</label>
                                    <input type="text" style="font-weight: bold; color: red;" class="form-control" name="kode_transaksi" value="<?php echo $autokode; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Kode Order</label>
                                    <input type="text" style="font-weight: bold; color: red;" readonly class="form-control" value="<?=$kd_order;?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Total Harga</label>
                                    <input type="number" id="total" class="form-control form-control-md" name="total_harga" value="<?=$assoc['sub']?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Bayar</label>
                                    <input type="number" class="form-control form-control-md" name="bayar" id="bayar">
                                </div>
                                <div class="form-group">
                                    <label for="">Kembalian</label>
                                    <input type="number" class="form-control form-control-md" name="kembalian" id="kembalian">
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right" style="margin-bottom: 15px;">
                                    <button name="getSimpan" class="btn btn-primary"><i class="fa fa-download"></i> Simpan</button>
                                    <button class="btn btn-danger"><i class="fa fa-eraser"></i> Kembali</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="vendor/jquery-3.2.1.min.js"></script>
<script>
$(document).ready(function(){
$('#bayar').keyup(function(){
var bayar = $(this).val();
var total = $('#total').val();
var kembalian = bayar - total;
$('#kembalian').val(kembalian);
});
})
</script>