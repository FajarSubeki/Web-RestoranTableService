<?php
      $lp        = new Resto();
      $dataTrans = $lp->selectOrderBy("transaksi", "waktu");
      $grand     = $lp->selectSum("transaksi", "total_harga");
      if (isset($_GET['kd'])) {
            $id         = $_GET['kd'];
            $dataDetail = $lp->edit("detail_order", "transaksi_kd", $id);
            $total      = $lp->selectSumWhere("detail_order", "sub_total", "transaksi_kd='$id'");
            $jumlahMenu = $lp->selectSumWhere("detail_order", "total", "transaksi_kd='$id'");
      }
      if(isset($_POST['btnOrder'])){
            $dataTrans = $lp->select("transaksi");
      }
?>
<div class="main-content">
      <div class="section__content section__content--p30">
            <div class="container-fluid">
                  <div class="row">
                        <div class="col-sm-4">
                              <div class="card cari">
                                    <div class="card-header">
                                          <h4>Cari Transaksi</h4>
                                    </div>
                                    <div class="card-body">
                                          <form method="post">
                                                <div class="form-group">
                                                      <a class="btn btn-primary btn-block" href="#pilihModal" data-toggle="modal">Pilih Transaksi</a>
                                                </div>
                                                <?php if (isset($_GET['id'])): ?>
                                                <a href="?page=kelTransaksi" class="btn btn-danger btn-block"><i class="fa fa-repeat"></i> Reload</a>
                                                <?php endif?>
                                          </form>
                                    </div>
                              </div>
                        </div>
                  </div>
                  <div class="row">
                        <div class="col-sm-12">
                              <!-- <div class="tile"> -->
                              <div class="card">
                                    <div class="card-body">
                                          <?php if (isset($_GET['kd'])): ?>
                                          <h4>Struk</h4>
                                          <hr>
                                          <div class="row">
                                                <div class="col-sm-6">Kode Transaksi : <?php echo $id ?></div>
                                                <div class="col-sm-6">
                                                      <p class="text-right"><span><?php echo "Tanggal Cetak : " . date("Y-m-d"); ?></p>
                                                </div>
                                          </div>
                                          <br>
                                          <div class="table-responsive">
                                                <table class="table table-striped table-bordered" width="80%">
                                                      <tr>
                                                            <td>Kode Antrian</td>
                                                            <td>Nama Barang</td>
                                                            <td>Harga Satuan</td>
                                                            <td>Jumlah</td>
                                                            <td>Sub Total</td>
                                                      </tr>
                                                      <?php foreach ($dataDetail as $dd): ?>
                                                      <tr>
                                                            <td><?=$dd['kd_detail']?></td>
                                                            <td><?=$dd['name_menu']?></td>
                                                            <td><?=$dd['harga']?></td>
                                                            <td><?=$dd['total']?></td>
                                                            <td><?="Rp." . number_format($dd['sub_total']) . ",-"?></td>
                                                      </tr>
                                                      <?php endforeach?>
                                                      <tr>
                                                            <td colspan="2"></td>
                                                            <td>Jumlah Pembelian Barang</td>
                                                            <td><?php echo $jumlahMenu['sum'] ?></td>
                                                            <td></td>
                                                      </tr>
                                                      <tr>
                                                            <td colspan="2"></td>
                                                            <td colspan="2">Total</td>
                                                            <td><?php echo "Rp." . number_format($total['sum']) . ",-" ?></td>
                                                      </tr>
                                                </table>
                                          </div>
                                          <br>
                                          <p>Tanggal Beli : <?php echo substr($dd['tanggal'], 0, 10) ?></p>
                                          <br>
                                          <a href="#" class="btn btn-primary" onclick="window.print();">Print</a>
                                          <?php endif?>
                                          <?php if (!isset($_GET['kd'])): ?>
                                          <h4>Data Semua Transaksi</h4>
                                          <hr>
                                          <p class="text-right"><?php echo "Tanggal Cetak : " . date("Y-m-d"); ?></p>
                                          <br>
                                          <table class="table table-hover table-bordered" width="100%;" align="center">
                                                <thead>
                                                      <tr>
                                                            <td>Kode Transaksi</td>
                                                            <td>Nama Kasir</td>
                                                            <td>Total Harga</td>
                                                            <td>Tanggal Beli</td>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      <?php foreach ($dataTrans as $dts): ?>
                                                      <tr>
                                                            <td><?=$dts['kd_transaksi']?></td>
                                                            <td><?=$dts['name']?></td>
                                                            <td><?="Rp." . number_format($dts['total_harga']) . ",-"?></td>
                                                            <td><?=$dts['tanggal']?></td>
                                                      </tr>
                                                      <?php endforeach?>
                                                      <tr>
                                                            <td></td>
                                                            <td>Grand Total</td>
                                                            <td><?php echo "Rp." . number_format($grand['sum']) . ",-" ?></td>
                                                            <td></td>
                                                      </tr>
                                                </tbody>
                                          </table>
                                          <br>
                                          <form method="post">
                                                <div class="btn-group">
                                                      <a href="#" class="btn btn-primary" onclick="window.print();">Print</a>
                                                      <button name="btnOrder" style="color: white;" class="btn btn-success">Order</button>
                                                      <a href="?page=indexLaporan" style="color: white;" class="btn btn-warning">Reload</a>
                                                </div>
                                                <a href="page/owner/export_excel.php" class="btn btn-success float-right">Excel</a>
                                          </form>
                                          <?php endif?>
                                    </div>
                              </div>
                              <!-- </div> -->
                        </div>
                  </div>
            </div>
      </div>
</div>
<div class="modal fade" id="pilihModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h3>Pilih Transaksi</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <div class="modal-body">
                        <div class="table-responsive">
                              <table class="table table-hover table-bordered" id="example">
                                    <thead>
                                          <tr>
                                                <td>Kode Transaksi</td>
                                                <td>Nama Penjual</td>
                                                <td>Total Harga</td>
                                                <td>Tanggal Beli</td>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          <?php foreach ($dataTrans as $dts): ?>
                                          <tr>
                                                <td><a href="?page=indexLaporanTrans&kd=<?=$dts['kd_transaksi'];?>"><?=$dts['kd_transaksi']?></a></td>
                                                <td><?=$dts['name']?></td>
                                                <td><?=$dts['total_harga']?></td>
                                                <td><?=$dts['tanggal']?></td>
                                          </tr>
                                          <?php endforeach?>
                                    </tbody>
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</div>