<?php
$do       = new Resto();
$kd       = $_GET['kd'];
$data     = $do->edit("detail_order", "order_kd", $kd);
$data2    = $do->selectWhere("tb_detail_order_temporary", "kd_detail", @$_GET['kd_detail']);
$data3    = $do->selectWhere("tb_detail_order_temporary", "order_kd", $kd);
$dataKode = $do->selectWhere("tb_detail_order_temporary", "menu_kd", @$_GET['kd_menu']);
$dk       = $dataKode['kd_detail'];
if (isset($_POST['btnUpdate'])) {
$status   = $_POST['status'];
$redirect = "?page=detail_order&order&kd=$kd";
if ($status == "") {
$response = ['response' => 'negative', 'alert' => 'Lengkapi Field'];
} else {
$value    = "status_detail='$status'";
$response = $do->update("tb_detail_order_temporary", $value, "kd_detail", $dk, $redirect);
$response = $do->update("tb_detail_order", $value, "kd_detail", $_GET['kd_detail'], $redirect);
}
}
if (isset($_POST['btnKonfirm'])) {
$redirect = "?page=detail_order&order&kd=$kd";
$value    = "status_keterangan='S'";
$response = $do->update("tb_detail_order_temporary", $value, "order_kd", $kd, $redirect);
$response = $do->update("tb_detail_order", $value, "order_kd", $kd, $redirect);
}
?>
<section class="au-breadcrumb m-t-75">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="au-breadcrumb-content">
                        <div class="au-breadcrumb-left">
                            <ul class="list-unstyled list-inline au-breadcrumb__list">
                                <li class="list-inline-item active">
                                    <a href="?page">Home</a>
                                </li>
                                <li class="list-inline-item seprate">
                                    <span>/</span>
                                </li>
                                <li class="list-inline-item"><a href="?page">Detail Order</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="main-content" style="margin-top: -70px;">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <form method="post">
                            <div class="card-header">Edit Status Detail</div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="status">Status saat ini</label>
                                    <select name="status" class="form-control">
                                        <?php if ($data2['status_detail'] == $data2['status_detail']) {?>
                                        <option value="<?=$data2['status_detail']?>" selected><?=$data2['status_detail']?></option>
                                        <option value="pending">pending</option>
                                        <option value="dimasak">dimasak</option>
                                        <option value="siap">siap</option>
                                        <option value="diambil">diambil</option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-primary btn-md" name="btnUpdate">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <form method="post">
                            <div class="card-header">Catatan Pelanggan</div>
                            <div class="card-body">
                                <?=$data3['keterangan']?>
                            </div>
                            <div class="card-footer">
                                <div class="btn btn-group">
                                    <button title="Konfirmasi" data-toggle="Konfirmasi" data-placement="top" name="btnKonfirm" class="btn btn-sm btn-success"><i class="fa fa-check"></i></button>
                                    <button title="Tidak Konfirmasi" data-toggle="Tidak Confirm" data-placement="top" name="btnNoKonfirm" class="btn btn-sm btn-danger"><i class="fa fa-close"></i></button>
                                </div>
                                <hr>
                                <?php
                                if (isset($_POST['btnNoKonfirm'])) {
                                ?>
                                <label for="">Alasan tidak konfirmasi</label>
                                <input type="text" placeholder="Contoh : Bumbu tidak cukup" class="form-control" name="balasan">
                                <br>
                                <button name="kirim" class="btn btn-success btn-sm">Kirim pesan</button>
                                <?php
                                } else {
                                if (isset($_POST['kirim'])) {
                                $balasan = $_POST['balasan'];
                                if ($balasan == "") {
                                $response = ['response' => 'negative', 'alert' => 'Alasan belum diinput'];
                                } else {
                                $value    = "status_keterangan='T', balasan_keterangan='$balasan'";
                                $response = $do->update("tb_detail_order_temporary", $value, "order_kd", $kd, $redirect);
                                $response = $do->update("tb_detail_order", $value, "order_kd", $kd, $redirect);
                                }
                                }
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form method="post">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="example">
                                        <thead>
                                            <tr>
                                                <th>No Meja</th>
                                                <th>Nama Menu</th>
                                                <th>Status Detail</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($data as $db) {
                                            ?>
                                            <tr>
                                                <td><?=$db['no_meja']?></td>
                                                <td><?=$db['name_menu']?></td>
                                                <td><?=$db['status_detail']?></td>
                                                <td><a class="btn btn-danger btn-sm" href="?page=detail_order&order&kd=<?=$_GET['kd']?>&kd_detail=<?=$db['kd_detail']?>&kd_menu=<?=$db['menu_kd']?>">Edit</a></td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>