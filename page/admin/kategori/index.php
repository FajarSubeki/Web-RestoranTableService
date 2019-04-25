<?php 

    $kg = new resto();
    $data = $kg->select("tb_kategori");

    if(isset($_GET['delete'])){
        $response = $kg->delete("tb_kategori", "kd_kategori", $_GET['kd'], "?page=indexKategori");
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
                                <li class="list-inline-item"><a href="?page=indexKategori">Kategori</a></li>
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
                            <i class="zmdi zmdi-account-calendar"></i>Data Kategori</h3>
                        </div>
                        <div class="card-body">
                            <a href="?page=createKategori" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kategori</a>
                            <br><br>
                            <div class="table-responsive">
                               <table id="example" class="table table-borderless table-striped table-earning">
                                   <thead>
                                       <tr>
                                            <th>No.</th>
                                            <th>Nama Kategori</th>
                                            <th>Gambar Kategori</th>
                                            <th>Aksi</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <?php 
                                            $no = 1;
                                            foreach($data as $dataB){
                                        ?>
                                       <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $dataB['name_kategori'] ?></td>
                                            <td align="text-center"><img width="170" class="rounded" src="img/<?= $dataB['photo'] ?>" alt=""></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a title="Edit" href="?page=editKategori&edit&kd=<?= $dataB['kd_kategori'] ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                    <a title="Delete" href="" id="btdelete<?= $no; ?>" class="btn btn-danger delete-btn"><i class="fa fa-trash"></i></a>
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
                                                        window.location.href="?page=indexKategori&delete&kd=<?php echo $dataB['kd_kategori'] ?>";
                                                    }
                                                  });
                                                });
                                        </script>
                                        <?php $no++; } ?>
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