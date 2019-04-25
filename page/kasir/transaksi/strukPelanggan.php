<?php
$sp          = new Resto();
$kd          = $_GET['kd'];
$dataDetail  = $sp->edit("detail_order", "transaksi_kd", $kd);
$jumlah_menu = $sp->selectSumWhere("detail_order", "total", "transaksi_kd='$kd'");
$total       = $sp->selectSumWhere("detail_order", "sub_total", "transaksi_kd='$kd'");
?>
<style>
	.col-sm-8{
		background: white;
		padding: 20px;
	}
	@media print{
		table{
			align-content: center;
		}
		.ds{
			display: none;
		}
		.card{
			box-shadow: none;
			border: none;
		}
		.hd{
			display: none;
		}
		.header-desktop2{
			display: none;
		}
	}
</style>
<div class="main-content">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="card">
						<div class="card-header">
							<h4>Struk Transaksi</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-sm-6">Kode Transaksi : <?php echo $kd; ?></div>
								<div class="col-sm-6">
									<p class="text-right"><span><?php echo "Tanggal Cetak : " . date("Y-m-d"); ?></p>
								</div>
							</div>
							<br>
							<div class="table-responsive">
								<table class="table table-striped table-bordered" width="80%">
									<tr>
										<td>Kode Antrian</td>
										<td>Nama Menu</td>
										<td>Harga Satuan</td>
										<td>Jumlah</td>
										<td>Sub Total</td>
									</tr>
									<?php foreach ($dataDetail as $dd) {?>
									<tr>
										<td><?=$dd['kd_detail']?></td>
										<td><?=$dd['name_menu']?></td>
										<td><?=$dd['harga']?></td>
										<td><?=$dd['total']?></td>
										<td><?="Rp." . number_format($dd['sub_total']) . ",-"?></td>
									</tr>
									<?php }?>
									<tr>
										<td colspan="2"></td>
										<td>Jumlah Pembelian Barang</td>
										<td><?php echo $jumlah_menu['sum'] ?></td>
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
							<?php
							$tgl = $dd['tanggal'];
							?>
							<p>Tanggal Beli : <?php echo $tgl; ?></p>
							<br>
							<a href="#" class="btn btn-info ds" onclick="window.print()"><i class="fa fa-print"></i> Cetak Struk</a>
							<a href="?page=indexTransaksi" class="btn btn-danger ds">Kembali</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>