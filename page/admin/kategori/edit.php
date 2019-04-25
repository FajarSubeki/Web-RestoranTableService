<?php 

    $kt = new Resto();
    $table = "tb_kategori";
    $data = $kt->selectWhere($table, "kd_kategori", $_GET['kd']);

    $autokode = $kt->autokode($table,"kd_kategori","KT");
    if (isset($_POST['getUbah'])) {
        $kd_kategori = $kt->validateHtml($_POST['kd_kategori']);
        $name = $kt->validateHtml($_POST['name']);
        $description = $kt->validateHtml($_POST['description']);
        $foto = $_FILES['foto'];

        if($kd_kategori == "" || $name == "" || $description == ""){
            $response = ['response'=>'negative','alert'=>'Lengkapi Field'];
        }else{
            if($_FILES['foto']['name'] == ""){
                $value = "kd_kategori='$kd_kategori', name_kategori='$name', description='$description'";
                $response = $kt->update($table, $value, "kd_kategori", $_GET['kd'], "?page=indexKategori");
            }else{
                $response = $kt->validateImage();
                if($response['types'] == "true"){
                    $value = "kd_kategori='$kd_kategori', name_kategori='$name', description='$description', photo='$response[image]'";
                    $response = $kt->update($table, $value, "kd_kategori", $_GET['kd'], "?page=indexKategori");
                }else{
                    $response = ['response'=>'negative', 'alert'=>'Gambar Error'];
                }
            }
        }

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
                                <li class="list-inline-item"><a href="?page=editKategori&edit&kd=<?= $dataB['kd_kategori'] ?>">Edit Kategori</a></li>
                            </ul>
                        </div>
                        <a href="?page=indexKategori" class="btn btn-danger btn-sm float-right">Kembali</a>
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
                            <i class="zmdi zmdi-account-calendar"></i>Edit Kategori</h3>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="form-group">
                                    <label for="">Kode Kategori</label>
                                    <input type="text" style="font-weight: bold; color: red;" class="form-control" name="kd_kategori" value="<?php echo $data['kd_kategori']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Kategori </label>
                                    <input type="text" class="form-control form-control-md" name="name" value="<?= $data['name_kategori'] ?>" >
                                 </div>
                                 <div class="form-group">
                                     <label for="">Deskripsi</label>
                                     <textarea name="description" rows="5" class="form-control"><?= $data['description'] ?></textarea>
                                 </div>
                                 <div class="form-group">
                                    <label for="">Gambar Kategori</label>
                                    <input type="file" name="foto" id="photo" data-allowed-file-extensions="png jpg jpeg" class="dropify" data-default-file="img/<?= $data['photo'] ?>">
                                 </div>
                            </div>
                            <div class="card-footer">
                                <div class="float-right" style="margin-bottom: 15px;">
                                    <button name="getUbah" class="btn btn-primary"><i class="fa fa-edit"></i> Ubah</button>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
