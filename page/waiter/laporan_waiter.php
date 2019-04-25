<?php
$op = new Resto();

$awal  = @$_POST['dateAwal'];
$akhir = @$_POST['dateAkhir'];
$data  = $op->selectBetween("detail_order", "tanggal", $awal, $akhir);

if (isset($_POST['btnSearch'])) {
	$awal  = $_POST['dateAwal'];
	$akhir = $_POST['dateAkhir'];
	$data  = $op->selectBetween("detail_order", "tanggal", $awal, $akhir);
}
?>
<div class="main-content" style="margin-top: 20px;">
	<div class="section__content section__content--p30">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<form method="post">
							<div class="card-header">
								<h3>Periode</h3>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-4">
										<label for="#">Dari Tanggal</label>
										<input value="<?= @$_POST['dateAwal']?>" class="form-control" type="date" placeholder="Select Date" name="dateAwal" required>
									</div>
									<div class="col-sm-4">
										<label for="#">Ke Tanggal</label>
										<input value="<?= @$_POST['dateAkhir']?>" class="form-control" type="date" placeholder="Select Date" name="dateAkhir" required>
									</div>
								</div>
								<br>
								<button class="btn btn-primary" name="btnSearch"><i class="fa fa-search"></i> Search</button>
								<a href="?page=order_periode" class="btn btn-danger">Reload</a>
								<br><br>
								<?php if (isset($_POST['dateAwal'])): ?>
								<a target="_blank" href="page/waiter/laporan_print.php?dateAwal=<?php echo $awal ?>&dateAkhir=<?php echo $akhir ?>" style="color: white;" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
								<?php endif?>
								<br><br>
								<div class="table-responsive">
									<table class="table table-striped table-hover table-bordered">
										<thead>
											<tr>
												<th>Kode Order</th>
												<th>Pelanggan</th>
												<th>No Meja</th>
												<th>Nama Menu</th>
												<th>Jumlah</th>
												<th>Sub total</th>
												<th>Harga</th>
												<th>Tanggal</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											foreach (@$data as $ds) {?>
											<tr>
												<td><?=$ds['order_kd']?></td>
												<td><?=$ds['name']?></td>
												<td><?=$ds['no_meja']?></td>
												<td><?=$ds['name_menu']?></td>
												<td><?=$ds['total']?></td>
												<td><?=$ds['sub_total']?></td>
												<td><?=number_format($ds['harga'])?></td>
												<td><?=$ds['tanggal']?></td>
												<?php $no++;}?>
											</tbody>
										</table>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>