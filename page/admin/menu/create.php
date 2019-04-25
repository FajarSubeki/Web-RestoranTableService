<?php
    $kt    = new Resto();
    $table = "tb_menu";
    $getKategori = $kt->select("tb_kategori");
    $autokode = $kt->autokode($table, "kd_menu", "MN");
    if (isset($_POST['getSimpan'])) {
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
    $response = $kt->validateImage();
    if ($response['types'] == "true") {
    $value    = "'$kd_menu', '$name', '$category_id', '$harga', '$description','tersedia', '$response[image]'";
    $response = $kt->insert($table, $value, "?page=indexMenu");
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
                                <li class="list-inline-item"><a href="?page=createKategori">Tambah Menu</a></li>
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
                                        <input type="text" style="font-weight: bold; color: red;" class="form-control" name="kd_menu" value="<?php echo $autokode; ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama Menu</label>
                                        <input type="text" class="form-control form-control-md" name="name" value="<?=@$_POST['name']?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kategori Menu</label>
                                        <select name="category_id" id="category_select" class="form-control">
                                            <option value="Pilih Kategori">Pilih Kategori</option>
                                            <?php foreach ($getKategori as $gk) {?>
                                            <option value="<?=$gk['kd_kategori']?>"><?=$gk['name_kategori']?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Harga</label>
                                        <input type="number" class="form-control form-control-md" name="harga" value="<?=@$_POST['harga']?>" >
                                    </div>
                                    <div class="form-group">
                                        <label for="">Deskripsi</label>
                                        <textarea name="description" rows="7" class="form-control form-control-md"><?=@$_POST['description']?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gambar Menu</label>
                                        <input type="file" name="foto" id="photo" data-allowed-file-extensions="png jpg jpeg" class="dropify">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="float-right" style="margin-bottom: 15px;">
                                        <button name="getSimpan" class="btn btn-primary"><i class="fa fa-download"></i> Simpan</button>
                                        <button type="reset" class="btn btn-danger"><i class="fa fa-eraser"></i> Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>