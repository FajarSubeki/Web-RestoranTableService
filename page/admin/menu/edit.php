<?php
    $kt    = new Resto();
    $table = "tb_menu";
    $data        = $kt->selectWhere($table, "kd_menu", $_GET['kd']);
    $getKategori = $kt->select("tb_kategori");
    if (isset($_POST['getUbah'])) {
    $kd_menu     = $kt->validateHtml($_POST['kd_menu']);
    $name        = $kt->validateHtml($_POST['name']);
    $category_id = $kt->validateHtml($_POST['category_id']);
    $harga       = $kt->validateHtml($_POST['harga']);
    $description = $kt->validateHtml($_POST['description']);
    $foto        = $_FILES['foto'];
    if ($kd_menu == "" || $name == "" || $harga == "" || $description == "") {
    $response = ['response' => 'negative', 'alert' => 'Lengkapi Field'];
    } else {
    if ($harga < 0) {
    $response = ['response' => 'negative', 'alert' => 'Harga atau stok tidak boleh 0 atau <'];
    } else {
    if ($_FILES['foto']['name'] == "") {
    $value    = "kd_menu='$kd_menu', name_menu='$name', kategori_id='$category_id', harga='$harga', description='$description'";
    $response = $kt->update($table, $value, "kd_menu", $_GET['kd'], "?page=indexMenu");
    } else {
    $response = $kt->validateImage();
    if ($response['types'] == "true") {
    $value    = "kd_menu='$kd_menu', name_menu='$name', kategori_id='$category_id', harga='$harga', description='$description', photo='$response[image]'";
    $response = $kt->update($table, $value, "kd_menu", $_GET['kd'], "?page=indexMenu");
    }
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
                                <li class="list-inline-item"><a href="?page=createKategori">Edit Menu</a></li>
                            </ul>
                        </div>
                        <a href="?page=indexMenu" class="btn btn-danger btn-sm float-right">Kembali</a>
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
                            <i class="zmdi zmdi-account-calendar"></i>Input Menu</h3>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Kode Menu</label>
                                        <input type="text" style="font-weight: bold; color: red;" class="form-control" name="kd_menu" value="<?=$data['kd_menu']?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Menu</label>
                                        <input type="text" class="form-control form-control-md" name="name" value="<?=$data['name_menu']?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kategori Menu</label>
                                        <select name="category_id" id="category_select" class="form-control">
                                            <option value="Pilih Kategori">Pilih Kategori</option>
                                            <?php foreach ($getKategori as $kg) {?>
                                            <?php if ($kg['kd_kategori'] == $data['kategori_id']) {?>
                                            <option value="<?=$kg['kd_kategori']?>" selected><?=$kg['name_kategori']?></option>
                                            <?php } else {?>
                                            <option value="<?=$kg['kd_kategori']?>"><?=$kg['name_kategori']?></option>
                                            <?php }?>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Harga</label>
                                        <input type="number" class="form-control form-control-md" name="harga" value="<?=$data['harga']?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="">Deskripsi</label>
                                        <textarea name="description" rows="7" class="form-control form-control-md"><?=$data['description']?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gambar Menu</label>
                                        <input type="file" name="foto" id="photo" data-allowed-file-extensions="png jpg jpeg" class="dropify" data-default-file="img/<?=$data['photo']?>">
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