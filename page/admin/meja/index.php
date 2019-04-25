<?php
  $mj   = new Resto();
  $data = $mj->select("tb_meja");
  $sql = "SELECT no_meja FROM tb_meja ORDER BY id DESC LIMIT 1;";
  $exe = mysqli_query($con, $sql);
  $num = mysqli_num_rows($exe);
  $dta = mysqli_fetch_assoc($exe);
  $datmeja = $dta['no_meja'];
  if (isset($_POST['getInput'])) {
  $jumlah = $_POST['jumlah'];
  $status = "non-active";
  if (
  !empty($_POST['jumlah'])
  ) {
      if ($num > 0) {
      for ($i = 1; $i <= $jumlah; $i++) {
      $total    = $dta['no_meja'] + $i;
      $name     = $total;
      $value    = "'','$name', '','$status'";
      $response = $mj->insert("tb_meja", $value, "?page=indexMeja");

      ?>
        <audio src="audio/success2.mp3" autoplay="autoplay"></audio>
      <?php 
      }
      } else {
        for ($i = 1; $i <= $jumlah; $i++) {
        $name     = $i;
        $value    = "'','$name', '', '$status'";
        $response = $mj->insert("tb_meja", $value, "?page=indexMeja");
        ?>
          <audio src="audio/success2.mp3" autoplay="autoplay"></audio>
        <?php
        }
      }
    }
  }
  if (isset($_GET['delete'])) {
  $response = $mj->delete("tb_meja", "id", $_GET['kd'], "?page=indexMeja");
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
                <li class="list-inline-item"><a href="?page=indexMeja">Meja</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="main-content" style="margin-top: -60px;">
  <div class="section__content section__content--p30">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-header" >
              <strong class="card-title mb-3">Input Meja</strong>
            </div>
            <div class="card-body">
              <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="">Jumlah Meja</label>
                  <input type="text" class="form-control" name="jumlah">
                </div>
                <button type="submit" name="getInput" class="btn btn-info"><i class="fa fa-check"></i> Input Meja</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-header">
              <strong class="card-title mb-3">Data Meja</strong>
            </div>
            <div class="card-body">
              <div class="container">
                <br>
                <div class="row">
                  <?php
                  $no = 1;
                  foreach ($data as $ds) {
                  ?>
                  <a style="text-align: center; width: 40px; padding: 8px 0px; height: 40px; font-weight: bold"; data-toggle="tooltip" data-placement="top" title="Delete" href="" class="align-middle btn btn-primary delete-btn" id="btdelete<?=$no;?>"><?=$ds['no_meja']?></a>
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
                  window.location.href="?page=indexMeja&delete&kd=<?php echo $ds['id'] ?>";
                  }
                  });
                  });
                  </script>
                  <?php $no++;}?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<style>
.delete-btn{
margin: 7px;
}
</style>