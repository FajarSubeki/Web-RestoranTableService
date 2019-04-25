<?php
    $db   = new Resto();
    $auth = $id->AuthPelanggan($_SESSION['username']);
    $table = "tb_kategori";
    $data  = $db->select($table);
?>
<section class="p-b-55">
    <div class="row align-items-center" style="height: 600px; background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ), url('images/bg3.jpg') no-repeat; background-size: cover;">
        <div class="col text-center">
            <h1 class="text-white" style="font-size: 60px;">JARESTO</h1>
            <p class="text-white" style="font-size: 25px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit</
            </div>
        </div>
    </section>
    <!-- END WELCOME-->
    <!-- PAGE CONTENT-->
    <div class="container">
        <section>
            <div class="row">
                <div class="col-md-6">
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/8R4fqqCjsz4?rel=0" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h2>Sekilas Info</h2>
                            <hr>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias quidem rem iure placeat fuga non quibusdam distinctio rerum cumque sed ullam vero deleniti voluptatum error tempora a amet, dignissimos, repudiandae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda voluptatum optio nulla iure expedita. Ullam temporibus, dolorum eaque illo vitae ea, cum earum explicabo neque, atque laboriosam eius cupiditate repudiandae. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus nemo porro earum assumenda debitis facere, iste placeat aperiam corrupti ipsum molestiae hic fugiat enim!
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-4">
                    <h1>Kategori</h1>
                </div>
                <!-- <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form class="au-form-icon--sm float-right" action="" method="post">
                        <input class="au-input--w300 au-input--style2" type="text" placeholder="Cari Menu">
                        <button class="au-btn--submit2" type="submit">
                        <i class="zmdi zmdi-search"></i>
                        </button>
                    </form>
                </div> -->
            </div>
            <br>
            <h3 class="float-right"><i>No Meja Anda : <?=$auth['no_meja']?></i></h3>
            <br>
            <br>
        </section>
    </div>
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