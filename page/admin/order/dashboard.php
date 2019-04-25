<?php
$db   = new Resto();
$auth = $id->AuthPelanggan($_SESSION['username']);
$table = "tb_kategori";
$data  = $db->select($table);
?>
<section class="p-b-55">
    <div class="row align-items-center" style="height: 600px; background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('images/bg3.jpg') no-repeat; background-size: cover;">
        <div class="col text-center">
            <h1 class="text-white" style="font-size: 40px;">JARESTO</h1>
            <p class="text-white" style="font-size: 25px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit</
            </div>
        </div>
    </section>
    <!-- END WELCOME-->
    <!-- PAGE CONTENT-->
    <div class="container">
        <section>
            <div class="row">
                <div class="col-md-4">
                    <h1>Kategori</h1>
                </div>
            </div>
        </section>
    </div>
    <br>
    <div class="container m-t-20">
        <div class="row">
            <?php
            foreach ($data as $data2) {
            ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img class="card-img-top" style="height: 220px;" src="img/<?=$data2['photo']?>" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title"><?=$data2['name_kategori']?></h5>
                        <p class="card-text"><?=$data2['description']?></p>
                    </div>
                    <div class="card-footer">
                        <a href="?page=order_menu&kategori&menu&kd=<?=$data2['kd_kategori']?>" class="btn btn-primary">Lihat Menu</a>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>