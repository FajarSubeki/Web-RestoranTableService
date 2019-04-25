<?php
$ko   = new Resto();
$data = $ko->selectOrderDate2("tb_order", "waktu");
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
                                <li class="list-inline-item"><a href="?page">Update Status Order</a></li>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h4>Data Orderan</h4></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Order</th>
                                            <th>No Meja</th>
                                            <th>Nama User</th>
                                            <th>Tanggal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data as $db) {
                                        ?>
                                        <tr>
                                            <td><?=$no;?></td>
                                            <td><a href="?page=detail_order&order&kd=<?=$db['kd_order']?>"><?=$db['kd_order']?></a></td>
                                            <td><?=$db['no_meja']?></td>
                                            <td><?=$db['nama_user']?></td>
                                            <td><?=$db['tanggal']?></td>
                                            <td>
                                                <a href="?page=detail_order&order&kd=<?=$db['kd_order']?>" class="btn btn-sm btn-danger">Edit status</a>
                                            </td>
                                        </tr>
                                        <?php $no++;}?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>