<?php
    $kg   = new resto();
    $data = $kg->select("tb_menu");
    if (isset($_GET['delete'])) {
    $response = $kg->delete("tb_menu", "kd_menu", $_GET['kd'], "?page=indexMenu");
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
                                <li class="list-inline-item"><a href="?page=indexMenu">Menu Masakan</a></li>
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
                        <div class="au-card-title" style="background-image:url('images/bg.jpg');">
                            <div class="bg-overlay bg-overlay--blue"></div>
                            <h3>
                            <i class="zmdi zmdi-account-calendar"></i>Data Menu</h3>
                        </div>
                        <div class="card-body">
                            <a href="?page=createMenu" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Menu</a>
                            <br><br>
                            <div class="table-responsive">
                                <table id="example" class="table table-borderless table-striped table-earning">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data as $dataB) {
                                        ?>
                                        <tr class="text-justify">
                                            <td><?=$no;?></td>
                                            <td><?=$dataB['name_menu']?></td>
                                            <td>Rp. <?=$dataB['harga']?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a data-toggle="tooltip" data-placement="top" title="Edit" href="?page=editMenu&edit&kd=<?=$dataB['kd_menu']?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                    <a data-toggle="tooltip" id="btdelete<?=$no;?>" data-placement="top" title="Delete" class="btn btn-danger delete-btn"><i class="fa fa-trash" style="color: white;"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <script src="vendor/jquery-3.2.1.min.js"></script>
                                        <script>
                                        $('#btdelete<?php echo $no; ?>').click(function(e){
                                            e.preventDefault();
                                            swal({
                                            title: "Hapus",
                                            text: "Yakin Hapus?",
                                            type: "warning",
                                            showCancelButton: true,
                                            confirmButtonText: "Yes",
                                            cancelButtonText: "Cancel",
                                            closeOnConfirm: false,
                                            closeOnCancel: true
                                            }, function(isConfirm) {
                                            if (isConfirm) {
                                            window.location.href="?page=indexMenu&delete&kd=<?php echo $dataB['kd_menu'] ?>";
                                            }
                                            });
                                            });
                                        </script>
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